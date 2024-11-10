<?php
$q = esc_field(isset($_GET['q']) ? $_GET['q'] : '');
$total_records = $db->get_var("SELECT COUNT(*) FROM tb_sub s INNER JOIN tb_kriteria k ON s.kode_kriteria=k.kode_kriteria WHERE nama_sub LIKE '%$q%'");
$rows = $db->get_results("SELECT * FROM tb_sub s INNER JOIN tb_kriteria k ON s.kode_kriteria=k.kode_kriteria WHERE nama_sub LIKE '%$q%' ORDER BY k.kode_kriteria, s.kode_sub");
?>

<div class="page-header"><h1>Sub Kriteria</h1></div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="sub" />
            <div class="form-group"><input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" /></div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
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
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Kode</th>
                    <th>Nama sub</th>
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                    <th>Aksi</th>
                    <?php endif ?>
                </tr>
            </thead>
            <?php $no = 1; foreach ($rows as $row) { // Display the table rows ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->nama_kriteria ?></td>
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