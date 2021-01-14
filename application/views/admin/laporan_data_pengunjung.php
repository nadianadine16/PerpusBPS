<?php 

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Data Pengunjung Perpustakaan BPS Kota Malang.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>Telepon</th>
 <th>Email</th>
 <th>Pekerjaan</th>
 <th>Jam Masuk</th>
 <th>Jam Keluar</th>
 <th>Judul Buku</th>
 </tr>
</thead>

<tbody>             
        <?php $no=1; foreach($pengunjung as $p):?>
          <tr>
            <td><?=$no++?></td>
            <td><?=$p["nama_pengunjung"];?></td>
            <td><?=$p["jenis_kelamin"];?></td>
            <td><?=$p["alamat"]?></td>
            <td><?=$p["telepon"];?></td>
            <td><?=$p["pekerjaan"];?></td>
            <td><?=$p["jam_masuk"];?></td>
            <td><?=$p["jam_keluar"];?></td>
            <td><?=$p["judul_buku"];?></td>
          </tr>
          <?php endforeach;?>          
        </tbody>

</table>