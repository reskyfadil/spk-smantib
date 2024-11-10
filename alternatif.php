<div class="page-header">
    <h1>Mahasiswa</h1>
</div>
<?php
            $q = esc_field(isset($_GET['q']) ? $_GET['q'] : '');
            $rows = $db->get_results("SELECT * FROM tb_alternatif 
            WHERE kode_alternatif LIKE '%$q%' 
            OR nama_alternatif LIKE '%$q%'
            ORDER BY kode_alternatif");
            $total_rows = count($rows);
            ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" />
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah_excel"><span class="glyphicon glyphicon-plus"></span> Tambahkan File</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=alternatif&q=<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
            <div class="form-group">
                <span style="margin-left: 10px;">Total Mahasiswa: <?= $total_rows ?></span>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Induk Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php

            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_alternatif ?></td>
                    <td><?= $row->nama_alternatif ?></td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=<?= $row->kode_alternatif ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=<?= $row->kode_alternatif ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>