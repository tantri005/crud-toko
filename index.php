<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko_Tantri</title>
</head>
<body>
    <header>
        <h3>data Barang</h3>
        <h1>Toko Skincare</h1>
    </header>
    <h4>Skincare</h4>
    <nav>
        <ul>
            <li><a href="form-data.php">Tambah Data</a></li>
        </ul>
        <ul>
            <li><a href="list-data.php">Daftar Data Barang</a></li>
        </ul>
    </nav>
    <?php if(isset($_GET['status'])):?>
        <p>
            <?php
            if($_GET ['status'] == 'sukses'){
                echo "Data Berhasil Ditambahkan!";
            } else{
                echo "Data Gagal Ditambahkan!";
            }
            ?>
        </p>
        <?php endif ; ?>
</body>
</html>