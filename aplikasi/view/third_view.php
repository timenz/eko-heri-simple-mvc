<html>
<head>
    <title>Simple MVC</title>
</head>
<body>
<h2>Isi Data Mahasiswa</h2>
<form method="POST" action ="<?php echo get_config('base_url'); ?>index.php?c=second&m=simpan">
    <p><input type= "text" name="nim" value="<?php echo $nim;?>" <?php echo ($status=='update') ? 'readonly' : '';?> /> NIM</p>
    <p><input type= "text" name="nama" value="<?php echo $nama;?>" /> Nama</p>
    <p><input type= "text" name="jurusan" value="<?php echo $jurusan;?>" /> Jurusan</p>
    <p><input type= "text" name="status" value="<?php echo $status;?>" readonly /> Status</p>
    <p><input type= "submit" value="Simpan" /></p>
</form>
<p>
    <a href="<?php echo get_config('base_url'); ?>index.php?c=second&m=index">Kembali Ke Index</a>
</p>
</body>
</html>