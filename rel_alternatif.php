<div class="page-header">
    <h1>Data Kelas</h1>
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
            <input type="hidden" name="m" value="rel_alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" placeholder="Pencarian..." />
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah_excel"><span class="glyphicon glyphicon-plus"></span> Tambahkan File</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=rel_alternatif&q=<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
            <div class="form-group">
                <span style="margin-left: 10px;">Total Kelas: <?= $total_rows ?></span>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>Kode</th>
                    <th>Nama Kelas</th>
                    <?php if (!empty($KRITERIA)): ?>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th><?= $val ?></th>
                        <?php endforeach ?>
                    <?php else: ?>
                        <th>No Data</th>
                    <?php endif ?>
                    
                </tr>
            </thead>
            <?php
            $data = get_rel_alternatif();
            $noDataRows = array();
            $sortedData = array();

            // Pisahkan data "No Data" dari data lainnya
            foreach ($data as $key => $val) {
                $hasNoData = false;
                foreach ($val as $v) {
                    if (!isset($SUB[$v]['nama'])) {
                        $hasNoData = true;
                        break;
                    }
                }
                if ($hasNoData) {
                    $noDataRows[$key] = $val;
                } else {
                    $sortedData[$key] = $val;
                }
            }

            // Urutkan data dengan NIM
            ksort($sortedData);

            // Tampilkan data "No Data" terlebih dahulu
            foreach ($noDataRows as $key => $val) {
            ?>
                
                <tr>
                    <td>
                        <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?= $key ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=<?= $key ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                    </td>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td>
                            <?php if (isset($SUB[$v]['nama'])) { ?>
                                <?= $SUB[$v]['nama'] ?>
                            <?php } else { ?>
                                No Data
                            <?php } ?>
                        </td>
                    <?php endforeach ?>
                </tr>
            <?php
            }

            // Tampilkan data lainnya
            foreach ($sortedData as $key => $val) {
            ?>
                <tr>
                    <td>
                        <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?= $key ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=<?= $key ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span>Hapus</a>

                    </td>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td>
                            <?php if (isset($SUB[$v]['nama'])) { ?>
                                <?= $SUB[$v]['nama'] ?>
                            <?php } else { ?>
                                No Data
                            <?php } ?>
                        </td>
                    <?php endforeach ?>
                    
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>