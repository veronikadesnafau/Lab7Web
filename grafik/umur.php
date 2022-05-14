<?php

        $koneksi = new mysqli("localhost", "root", "", "grafik");

?>

<table border="1" style="border-collapse: collapse;">
    <caption>Data Pegawai</caption>
    <thead>
        <tr>
            <th>No</th>
            <th width="200">Nama</th>
            <th>Tanggal Lahir</th>
            <th>Umur</th>
            <th>Pekerjaan</th>
            <th>Gaji</th>
</tr>
    </thead>
    <tbody>

    <?php
        $no = 1;
        $sql = $koneksi->query("select * from tb_usia");
        while ($data=$sql->fetch_assoc()) {

            $tgl_lahir = $data['tgl_lahir'];

            $umur = new DateTime($tgl_lahir);
            $sekarang = new DateTime();

            $usia = $sekarang->diff($umur);
    ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $data['nama']?></td>
            <td><?php echo date('d M Y', strtotime($data['tgl_lahir']))?></td>
            <td><?php echo $usia->y. "&nbsp"."Tahun"."&nbsp".$usia->m."&nbsp"."Bulan"?></td>
            <td><?php echo $data['pekerjaan']?></td>
            <td><?php echo $data['gaji']?></td>
        </tr>

        <?php } ?>
</tbody>
</table>