<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Proyek Baru</title>
</head>
<body>
    <h1>Input Proyek Baru</h1>
    <form action="<?php echo site_url('main/store_proyek'); ?>" method="post">
        <label>Nama Proyek: </label><input type="text" name="nama_proyek"><br>
        <label>Client: </label><input type="text" name="client"><br>
        <label>Tanggal Mulai: </label><input type="datetime-local" name="tgl_mulai"><br>
        <label>Tanggal Selesai: </label><input type="datetime-local" name="tgl_selesai"><br>
        <label>Pimpinan Proyek: </label><input type="text" name="pimpinan_proyek"><br>
        <label>Keterangan: </label><textarea name="keterangan"></textarea><br>
        <label>Lokasi: </label>
        <select name="lokasi_id">
            <?php foreach ($lokasi as $lok): ?>
                <option value="<?php echo $lok['id']; ?>"><?php echo $lok['nama_lokasi']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
