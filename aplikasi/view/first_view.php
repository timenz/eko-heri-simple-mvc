<html>
<head>
    <title>Simple MVC</title>
</head>
<body>
<h1>Website Kampus <?php echo $nama_kampus;?></h1>
<h2>Daftar Mahasiswa</h2>
<table border="1">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
    </tr>
    <?php
    foreach($mahasiswa as $mhs)
    {
        ?>
        <tr>
            <td><?php echo $mhs['nim'];?></td>
            <td><?php echo $mhs['nama'];?></td>
            <td><?php echo $mhs['jurusan'];?></td>
        </tr>
        <?php
    } //akhir loooping foreach
    ?>
</table>
<p>
    <a href="<?php echo get_config('base_url'); ?>index.php?c=first&m=index">Kembali Ke Index</a>
</p>
</body>
</html>