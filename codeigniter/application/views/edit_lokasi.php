<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
</head>
<body>
    <h1>Edit Lokasi</h1>
    <form action="<?php echo site_url('main/update_lokasi/'.$lokasi['id']); ?>" method="post">
        <label>Nama Lokasi: </label><input type="text" name="nama_lokasi" value="<?php echo $lokasi['nama_lokasi']; ?>"><br>
        <label>Negara: </label><input type="text" name="negara" value="<?php echo $lokasi['negara']; ?>"><br>
        <label>Provinsi: </label><input type="text" name="provinsi" value="<?php echo $lokasi['provinsi']; ?>"><br>
        <label>Kota: </label><input type="text" name="kota" value="<?php echo $lokasi['kota']; ?>"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
