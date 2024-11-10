<div class="page-header">
    <h1>Tambah Kelas</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>File Excel <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="excel_file" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] == UPLOAD_ERR_OK) {
        $inputFileName = $_FILES['excel_file']['tmp_name'];
        $fileExtension = pathinfo($_FILES['excel_file']['name'], PATHINFO_EXTENSION);

        // Cek apakah file Excel berhasil diunggah
        if($fileExtension == 'xlsx' || $fileExtension == 'xls'){
            if (file_exists($inputFileName)) {
                require_once 'vendor/autoload.php';

                // Baca file Excel
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
                $worksheet = $spreadsheet->getSheet(0);

                // Proses data dari file Excel
                $rowIterator = $worksheet->getRowIterator(3);
                foreach ($rowIterator as $row) {
                    // Proses setiap baris data
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    $data = [];
                    foreach ($cellIterator as $cell) {
                        $data[] = $cell->getCalculatedValue();
                    }

                    // Simpan data ke database
                    $kode = $data[0];
                    $nama = $data[1];
                    $kriteria_data = array_slice($data, 2);
                    if ($kode && $nama) {
                        $existing_data = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'");
                        if (!$existing_data) {
                            // Data belum ada, simpan data baru
                            $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif) VALUES ('$kode', '$nama')");

                            // Ambil kriteria dan sub-kriteria
                            $kriteria_rows = $db->get_results("SELECT * FROM tb_kriteria ORDER BY LPAD(kode_kriteria, 5, '0')");
                            foreach ($kriteria_rows as $kriteria_row) {
                                $kode_kriteria = $kriteria_row->kode_kriteria;
                                $sub_kriteria_nama = array_shift($kriteria_data);

                                // Cari sub-kriteria berdasarkan nama dan kode kriteria
                                $sub_kriteria_row = $db->get_row("SELECT * FROM tb_sub WHERE nama_sub='$sub_kriteria_nama' AND kode_kriteria='$kode_kriteria'");
                                if ($sub_kriteria_row) {
                                    $kode_sub = $sub_kriteria_row->kode_sub;
                                } else {
                                    $kode_sub = null; // atau '' jika Anda ingin memasukkan string kosong
                                }
                                $db->query("INSERT INTO tb_rel_alternatif (kode_alternatif, kode_kriteria, kode_sub) VALUES ('$kode', '$kode_kriteria', '$kode_sub')");
                            }
                        } else {
                            // Memperbarui data yang ada
                            $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama' WHERE kode_alternatif='$kode'");
                            
                            // Perbarui juga relasi alternatif
                            $kriteria_rows = $db->get_results("SELECT * FROM tb_kriteria ORDER BY LPAD(kode_kriteria, 5, '0')");
                            foreach ($kriteria_rows as $kriteria_row) {
                                $kode_kriteria = $kriteria_row->kode_kriteria;
                                $sub_kriteria_nama = array_shift($kriteria_data);

                                $sub_kriteria_row = $db->get_row("SELECT * FROM tb_sub WHERE nama_sub='$sub_kriteria_nama' AND kode_kriteria='$kode_kriteria'");
                                $kode_sub = $sub_kriteria_row ? $sub_kriteria_row->kode_sub : null;

                                $db->query("UPDATE tb_rel_alternatif SET kode_sub='$kode_sub' WHERE kode_alternatif='$kode' AND kode_kriteria='$kode_kriteria'");
                            }
                        }
                    }
                }

                // Redirect setelah proses selesai
                redirect_js("index.php?m=rel_alternatif");
            } else {
                print_msg("Tidak ada file Excel yang diunggah!");
            }
        }else{
            print_msg("File yang diunggah bukan Excel");
        }
    } else {
        print_msg("Tidak ada file Excel yang diunggah!");
    }
}