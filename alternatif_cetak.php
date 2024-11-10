<h1>Alternatif</h1>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama Mahasiswa</th>
		</tr>
	</thead>
	<?php
	$q = esc_field(isset($_GET['q']) ? $_GET['q'] : '');
	$rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY kode_alternatif");
	$no = 0;
	foreach ($rows as $row) : ?>
		<tr>
			<td><?= ++$no ?></td>
			<td><?= $row->kode_alternatif ?></td>
			<td><?= $row->nama_alternatif ?></td>
		</tr>
	<?php endforeach ?>
</table>