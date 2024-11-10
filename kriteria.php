<div class="page-header">
    <h1>Kriteria</h1>
    <form class="form-inline">
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <div class="form-group">
                    <a class="btn btn-primary" href="?m=kriteria_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                </div>
            <?php endif ?>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=kriteria&a=<?= isset($_GET['q'])?$_GET['q']:'' ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
</div>
<div class="panel panel-default">

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kriteria</th>
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                        <th>Aksi</th>
                    <?php endif ?>
                </tr>
            </thead>
            <?php
            $q = esc_field(isset($_GET['q'])?$_GET['q']:'');
            $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' ORDER BY LPAD(kode_kriteria, 5, '0')");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_kriteria ?></td>
                    <td><?= $row->nama_kriteria ?></td>
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                        <td>
                            <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=<?= $row->kode_kriteria ?>"><span class="glyphicon glyphicon-edit"></span></a>
                            <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=<?= $row->kode_kriteria ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<!-- Tabel Sub Kriteria -->
<div class="page-header" style="margin-top:50px;">
    <h1>Sub Kriteria</h1>
    <form class="form-inline">

            <?php if ($_SESSION['level'] == 'admin') : ?>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=sub_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <?php endif ?>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=sub&a=<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
</div>

<?php
$q = esc_field(isset($_GET['q']) ? $_GET['q'] : '');

$kriteria_query = "SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' ORDER BY kode_kriteria";
$kriteria_results = $db->get_results($kriteria_query);

foreach ($kriteria_results as $kriteria) {
    $total_records = $db->get_var("SELECT COUNT(*) FROM tb_sub s WHERE s.kode_kriteria = '{$kriteria->kode_kriteria}' AND nama_sub LIKE '%$q%'");
    $sub_rows = $db->get_results("SELECT * FROM tb_sub s WHERE s.kode_kriteria = '{$kriteria->kode_kriteria}' AND nama_sub LIKE '%$q%' ORDER BY CAST(nama_sub AS UNSIGNED) DESC");
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $kriteria->nama_kriteria ?></h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama sub</th>
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                        <th>Aksi</th>
                    <?php endif ?>
                </tr>
            </thead>
            <?php $no = 1; foreach ($sub_rows as $row) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->kode_sub ?></td>
                <td><?= $row->nama_sub ?></td>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=sub_ubah&ID=<?= $row->kode_sub ?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=sub_hapus&ID=<?= $row->kode_sub ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                <?php endif ?>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php } ?>