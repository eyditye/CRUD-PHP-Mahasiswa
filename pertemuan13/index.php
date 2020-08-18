<?php 
	//koneksi ke database

require 'functions.php';

$mahasiswa= query ("SELECT * FROM mahasiswa ORDER BY id DESC");
	// ambil data mahasiswa

if  (isset($_POST["cari"])){
	$mahasiswa = cari($_POST["keyword"]);
}

//$mhs= mysqli_fetch_row($result);
//var_dump($mhs[3]);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>

<form action="" method="post">
	<input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
</form>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
	<?php $i = 1; ?>
	<?php 	foreach ($mahasiswa as $row) : ?> 

	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"];  ?>">ubah</a> |
			<a href ="hapus.php?id=<?= $row["id"]; ?>">hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
</table>

</body>
</html>