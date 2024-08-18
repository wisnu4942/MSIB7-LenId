<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek dan Lokasi</title>
</head>
<body>
    <h1>Daftar Lokasi</h1>
    <ul>
        <?php foreach ($lokasi as $lok): ?>
            <li><?php echo $lok['nama_lokasi']; ?> - <?php echo $lok['kota']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Daftar Proyek</h1>
    <ul>
        <?php foreach ($proyek as $pro): ?>
            <li><?php echo $pro['nama_proyek']; ?> - <?php echo $pro['client']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
