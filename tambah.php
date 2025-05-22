<?php include "koneksi/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Tambah Data</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>profile</label>
            <input type="file" name="profile" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
    <?php
    if (isset($_POST['simpan'])) {
        $uname = $_POST['username'];
        $passw = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $file = $_FILES['profile'];
        $tujuan = "uploads/" . $file['name'];

        if (move_uploaded_file($file['tmp_name'], $tujuan)) {
            mysqli_query($conn, "INSERT INTO users (username, password, profile) VALUES ('$uname','$passw','{$file['name']}')");
            echo "<script>alert('Data Berhasil Ditambah'); window.location='index.php';</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Upload file gagal.</div>";
        }
    }
    ?>

</body>

</html>