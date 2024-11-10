<?php $row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'"); ?>
<div class="page-header">
    <h1>Ubah Data Kelas &raquo; <small><?= $row->nama_alternatif ?></small></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post" action="aksi.php?act=alternatif_ubah">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?= $row->kode_alternatif ?>" />
            </div>
            <div class="form-group">
                <label>Nama Kelas <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= $row->nama_alternatif ?>" />
            </div>
            <?php $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_sub FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria WHERE kode_alternatif='$_GET[ID]' ORDER BY LPAD(k.kode_kriteria, 5, '0')"); ?>
            <?php foreach ($rows as $row) : ?>
            <div class="form-group">
                <label><?= $row->nama_kriteria ?><span class="text-danger">*</span></label>
                <select class="form-control" name="nilai[<?= $row->ID ?>]">
                    <?= get_sub_option($row->kode_kriteria, $row->kode_sub) ?>
                </select>
            </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>