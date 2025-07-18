<?php
include 'config.php';


if (isset($_POST['tambah'])) {
    $kd_brg = $_POST['kode_brg'];
    $nama = $_POST['nama_brg'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    mysqli_query ($koneksi, "INSERT INTO barang VALUES('$kd_brg','$nama','$merk','$harga','$jumlah')");
    header("Location: index.php");
}


if (isset($_GET['hapus'])) {
    $kd_brg = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM barang WHERE kode_brg='$kd_brg'");
    header("Location: index.php");
}


$editMode = false;
$barangEdit = null;
if (isset($_GET['edit'])) {
    $editMode = true;
    $kd_brg_edit = $_GET['edit'];
    $result = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_brg='$kd_brg_edit'");
    $barangEdit = mysqli_fetch_assoc($result);
}


if (isset($_POST['update'])) {
    $kd_brg = $_POST['kode_brg'];
    $nama = $_POST['nama_brg'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($koneksi, "UPDATE barang SET kode_brg='$kd_brg', nama_brg='$nama', merk='$merk', harga='$harga', jumlah='$jumlah' WHERE kode_brg='$kd_brg'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Data Barang</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 8px 12px; }
        form { margin-bottom: 20px; }
        .form-box { background: #f4f4f4; padding: 15px; width: 300px; }
    </style>
</head>
<body>
    <h2><?= $editMode ? "Edit Data Barang" : "Form Tambah Data Barang" ?></h2>

    <div class="form-box">
        <form method="POST">
            <label>Kode Barang:</label><br>
            <input type="text" name="kode_brg" required value="<?= $editMode ? $barangEdit['kode_brg'] : '' ?>" <?= $editMode ? 'readonly' : '' ?>><br>

            <label>Nama:</label><br>
            <input type="text" name="nama_brg" required value="<?= $editMode ? $barangEdit['nama_brg'] : '' ?>"><br>

            <label>Merk:</label><br>
            <input type="text" name="merk" required value="<?= $editMode ? $barangEdit['merk'] : '' ?>"><br>

            <label>Harga:</label><br>
            <input type="number" name="harga" required value="<?= $editMode ? $barangEdit['harga'] : '' ?>"><br>

            <label>Jumlah:</label><br>
            <input type="number" name="jumlah" required value="<?= $editMode ? $barangEdit['jumlah'] : '' ?>"><br><br>

            <?php if ($editMode): ?>
                <button type="submit" name="update">Update</button>
                <a href="index.php">Batal</a>
            <?php else: ?>
                <button type="submit" name="tambah">Tambah</button>
            <?php endif; ?>
        </form>
    </div>

    <h2>Data Barang</h2>
    <table>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['kode_brg']}</td>
                    <td>{$row['nama_brg']}</td>
                    <td>{$row['merk']}</td>
                    <td>{$row['harga']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>
                        <a href='?edit={$row['kode_brg']}'>Edit</a> |
                        <a href='?hapus={$row['kode_brg']}' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                    </td>
                  </tr>";
        }
     $total = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM barang"));
        echo "<tr>
            <td colspan='5' style='text-align: right;'><strong>Total Data:</strong></td>
            <td><strong>{$total}</strong></td>
        </tr>";
        ?>
    </table>
</body>
</html>

