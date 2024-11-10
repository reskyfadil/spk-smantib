<style>
    .yellow {
        background-color: #3fad46;
        font-weight: 600;
        color: white;
    }
    .red {
        background-color: #d9534f;
        color: white; /* Agar teks dapat terbaca dengan baik di latar belakang merah */
        font-weight: 600;

    }
</style>
<div class="page-header">
    <center>
        <h1>Perhitungan & Perangkingan</h1>
    </center>
</div>

<?php
$data = get_rel_alternatif();
function get_hasil_bobot($data)
{
    global $SUB;
    $arr = [];
    foreach ($data as $key => $val) {
        foreach ($val as $k => $v) {
            if (isset($SUB[$v]['nilai_sub'])) {
                $arr[$key][$k] = $SUB[$v]['nilai_sub'];
            } else {
                $arr[$key][$k] = 0; // Atau nilai default lainnya
            }
        }
    }
    return $arr;
}
$hasil_bobot = get_hasil_bobot($data);
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <center>
            <h3 class="panel-title">Hasil Pembobotan</h3>
        </center>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <?php
                    $matriks = get_relkriteria();
                    $total = get_baris_total($matriks);
                    $normal = normalize($matriks, $total);
                    $rata = get_rata($normal);
                    foreach ($matriks as $key => $val) : ?>
                    <?php endforeach ?>
                    <th rowspan="2">Kode</th>
                    <th rowspan="2">Nama Kelas</th>
                    <?php if (!empty($KRITERIA)): ?>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th><?= $val ?></th>
                        <?php endforeach ?>
                    <?php else: ?>
                        <th>No Data</th>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php foreach ($rata as $key => $val) : ?>
                        <th><?= round($val, 4) ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php
            foreach ($hasil_bobot as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v ?? 0, 3) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <center>
            <h3 class="panel-title">Perangkingan</h3>
        </center>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Kode</th>
                    <th>Nama Kelas</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            function get_total($hasil_bobot, $rata)
            {
                global $SUB;
                $arr = [];

                foreach ($hasil_bobot as $key => $val) {
                    $arr[$key] = 0; // Initialize $arr[$key] to 0 for each key
                    foreach ($val as $k => $v) {
                        $arr[$key] += $v * $rata[$k];
                    }
                }
                return $arr;
            }
            $total = get_total($hasil_bobot, $rata);
            FAHP_save($total);
            $rows = $db->get_results("SELECT * FROM tb_alternatif ORDER BY urutan");
            
            if (empty($rows)) {
                echo "<tr><td colspan='4'><center>Belum ada Data</center></td></tr>";
            } else {
                foreach ($rows as $row) :
                    // Tentukan kelas berdasarkan urutan
                    $class = '';
                    if ($row->urutan == 1 || $row->urutan == 2 || $row->urutan == 3) {
                        $class = 'yellow'; // Kelas untuk peringkat 1, 2, dan 3
                    } elseif ($row->urutan == count($rows)) {
                        $class = 'red'; // Kelas untuk peringkat terakhir
                    }
            ?>
                    <tr class="<?= $class ?>">
                        <td><?= $row->urutan ?></td>
                        <td><?= $row->kode_alternatif ?></td>
                        <td><?= $row->nama_alternatif ?></td>
                        <td><?= round($row->total, 5) ?></td>
                    </tr>
            <?php 
                endforeach;
            }
            ?>
        </table>
    </div>
    <div class="panel-body">
        <?php
        $best = isset($rows[0]) ? $rows[0]->kode_alternatif : '';
        ?>
        <center>
            <p><a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a></p>
        </center>
    </div>
</div>

