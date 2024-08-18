<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Lokasi Baru</title>
</head>
<body>
    <h1>Input Lokasi Baru</h1>
    <form action="<?php echo site_url('main/store_lokasi'); ?>" method="post">
        <label>Nama Lokasi: </label><input type="text" name="nama_lokasi"><br>
        <label>Negara: </label><input type="text" name="negara"><br>
        <label>Provinsi: </label><input type="text" name="provinsi"><br>
        <label>Kota: </label><input type="text" name="kota"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
