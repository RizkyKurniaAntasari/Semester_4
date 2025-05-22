<?php
include "koneksi/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data User</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Data User</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah User</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>profile</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM users");
            while ($row = mysqli_fetch_assoc($result)) {
                $foto = 'uploads/' . $row['profile'];
                echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['username']}</td>
            <td><img src='$foto' width='50' height='50' class='rounded-circle'></td>
            <td>
                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
            </td>
        </tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>