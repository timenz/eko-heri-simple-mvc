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
        <th colspan="2"> * </th>
    </tr>
    <?php
    foreach($mahasiswa as $mhs)
    {
        ?>
        <tr>
            <td><?php echo $mhs['nim'];?></td>
            <td><?php echo $mhs['nama'];?></td>
            <td><?php echo $mhs['jurusan'];?></td>
            <td><a href="<?php echo get_config('base_url'); ?>index.php?c=second&m=view_entry&nim=<?php echo $mhs['nim'];?>">Edit</a></td>
            <td><a href="<?php echo get_config('base_url'); ?>index.php?c=second&m=hapus&nim=<?php echo $mhs['nim'];?>" onclick="return confirm('Anda yakin akan menghapus data ini?');">Hapus</a></td>
        </tr>
        <?php
    } //akhir loooping foreach
    ?>
</table>
<p>
    <a href="<?php echo get_config('base_url'); ?>index.php?c=second&m=view_entry"><input type="button" value ="Tambah Data"/></a>
</p>
</body>
</html>