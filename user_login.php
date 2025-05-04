<?php
// Koneksi ke database
include('connection.php');


// Fungsi untuk membuat ID pemesan otomatis
function generateIdPemesan($conn) {
    $query = "SELECT MAX(id_pelanggan) AS max_id FROM pelanggan";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $maxId = $row['max_id'];
    if ($maxId) {
        $urutan = (int) substr($maxId, 7);
        $urutan++;
    } else {
        $urutan = 1;
    }
    $idBaru = "pelanggan" . str_pad($urutan, 2, "0", STR_PAD_LEFT);
    return $idBaru;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $kode_meja = $_POST['kode_meja'];
    $id_pelanggan = generateIdPemesan($conn);

    // Insert data ke tabel pelanggan
    $insertQuery = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, kode_meja) VALUES ('$id_pelanggan', '$nama_pelanggan', '$kode_meja')";
    if (mysqli_query($conn, $insertQuery)) {
        // Update status meja menjadi Penuh
        $updateMejaQuery = "UPDATE status_meja SET status_meja = 'Penuh' WHERE kode_meja = '$kode_meja'";
        if (mysqli_query($conn, $updateMejaQuery)) {
            // Redirect ke halaman menu setelah data berhasil dimasukkan
            header("Location: user_menu.php");
            exit();
        } else {
            echo "Error updating table status: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesan</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <?php include "head.php"; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body class="main">

    <nav class="navbar">
    <h1>SELAMAT DATANG DI KEDAI KOPI KENANGAN</h1>
    </nav>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan Isi Identitas</p>



        <form action="" method="post">

        <label for="nama_pelanggan">Nama Lengkap</label>
        <input type="text" id="nama_pelanggan"  name="nama_pelanggan" class="form_login" placeholder="Tulis Disini" required="required">

        <label for="kode_meja">Pilih Meja</label>
        <select id="kode_meja" name="kode_meja" class="form_login" required>
            <option value="">-- Pilih Meja --</option>
            <?php
                // Ambil data kode meja yang kosong dari database
                $queryMeja = "SELECT kode_meja, status_meja FROM status_meja WHERE status_meja = 'Kosong'";
                $resultMeja = mysqli_query($conn, $queryMeja);

                while ($row = mysqli_fetch_assoc($resultMeja)) {
                    echo "<option value='" . $row['kode_meja'] . "'>" . $row['kode_meja'] . "</option>";
                }
            ?>
        </select>

        <input type="submit" class="tombol_login" value="Next">
        <br/>
        <br/>
        </form>
    </div>
</body>
</html>
