<h1>Besaran UKT Mahasiswa</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Golongan UKT</th>
            <th>Besaran UKT</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(isset($_GET['q']) ? $_GET['q'] : '');
    $rows = $db->get_results("SELECT * FROM tb_hasil 
        WHERE kode_mahasiswa LIKE '%$q%' 
        OR nama_mahasiswa LIKE '%$q%'
        ORDER BY kode_mahasiswa");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->kode_mahasiswa ?></td>
            <td><?= $row->nama_mahasiswa ?></td>
            <td><?= $row->golongan ?></td>
            <td><?= $row->biaya ?></td>
        </tr>
    <?php endforeach ?>
</table>