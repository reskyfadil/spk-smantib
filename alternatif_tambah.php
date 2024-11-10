<div class="page-header">
    <h1>Tambah Kelas</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?= isset($_POST['kode'])?$_POST['kode']:'' ?>" />
            </div>
            <div class="form-group">
                <label>Nama Kelas <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= isset($_POST['nama'])?$_POST['nama']:'' ?>" />
            </div>
            <?php
            $kriteria_rows = $db->get_results("SELECT * FROM tb_kriteria ORDER BY LPAD(kode_kriteria, 5, '0')");
            foreach ($kriteria_rows as $kriteria_row) :
            ?>
            <div class="form-group">
                <label><?= $kriteria_row->nama_kriteria ?></label>
                <select class="form-control" name="kriteria[<?= $kriteria_row->kode_kriteria ?>]">
                    <?= get_sub_option($kriteria_row->kode_kriteria, isset($_POST['kriteria'][$kriteria_row->kode_kriteria]) ? $_POST['kriteria'][$kriteria_row->kode_kriteria] : 0) ?>
                </select>
            </div>
            <?php endforeach; ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>