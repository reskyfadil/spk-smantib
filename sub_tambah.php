<div class="page-header">
    <h1>Tambah Sub</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kriteria <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_kriteria">
                    <option value=""></option>
                    <?= get_kriteria_option(isset($_POST['kode']) ? $_POST['kode'] : '') ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?= isset($_POST['kode']) ? $_POST['kode'] : '' ?>" />
            </div>
            <div class="form-group">
                <label>Nama sub <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= isset($_POST['nama']) ? $_POST['nama'] : '' ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=kriteria"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>