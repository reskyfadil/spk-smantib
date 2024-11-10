<h1>Kriteria</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kriteria</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(isset($_GET['q']) ? $_GET['q'] : '');
    $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' ORDER BY LPAD(kode_kriteria, 5, '0')");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->kode_kriteria ?></td>
            <td><?= $row->nama_kriteria ?></td>
        </tr>
    <?php endforeach ?>
</table>