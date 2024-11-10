<h1>Nilai Bobot Mahasiswa</h1>
<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <?php foreach ($KRITERIA as $key => $val) : ?>
                <th><?= $val ?></th>
            <?php endforeach ?>
                        
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