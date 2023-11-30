<?php
require 'koneksi.php';
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$phoneNumber = $_POST["phoneNumber"];
$email = $_POST["email"];
$password = $_POST["password"];

// Gunakan prepared statement untuk mencegah SQL injection
$stmtUsername = mysqli_prepare($conn, "SELECT username FROM tbl_users WHERE username = ?");
mysqli_stmt_bind_param($stmtUsername, "s", $username);
mysqli_stmt_execute($stmtUsername);
mysqli_stmt_store_result($stmtUsername);

// Periksa apakah username sudah terdaftar
if (mysqli_stmt_num_rows($stmtUsername) > 0) {
    echo "<script>
            alert('Username Sudah Terdaftar!');
            window.history.go(-1); // Kembali ke halaman sebelumnya
          </script>";
    mysqli_stmt_close($stmtUsername);
    mysqli_close($conn);
    return false;
}

mysqli_stmt_close($stmtUsername);

// Gunakan prepared statement untuk mencegah SQL injection pada fullname
$stmtFullname = mysqli_prepare($conn, "SELECT fullname FROM tbl_users WHERE fullname = ?");
mysqli_stmt_bind_param($stmtFullname, "s", $fullname);
mysqli_stmt_execute($stmtFullname);
mysqli_stmt_store_result($stmtFullname);

// Periksa apakah fullname sudah terdaftar
if (mysqli_stmt_num_rows($stmtFullname) > 0) {
    echo "<script>
            alert('Nama Lengkap Sudah Terdaftar!');
            window.history.go(-1); // Kembali ke halaman sebelumnya
          </script>";
    mysqli_stmt_close($stmtFullname);
    mysqli_close($conn);
    return false;
}

mysqli_stmt_close($stmtFullname);

// Gunakan prepared statement untuk mencegah SQL injection pada phoneNumber
$stmtPhoneNumber = mysqli_prepare($conn, "SELECT phoneNumber FROM tbl_users WHERE phoneNumber = ?");
mysqli_stmt_bind_param($stmtPhoneNumber, "s", $phoneNumber);
mysqli_stmt_execute($stmtPhoneNumber);
mysqli_stmt_store_result($stmtPhoneNumber);

// Periksa apakah phoneNumber sudah terdaftar
if (mysqli_stmt_num_rows($stmtPhoneNumber) > 0) {
    echo "<script>
            alert('No HP Sudah Terdaftar!');
            window.history.go(-1); // Kembali ke halaman sebelumnya
          </script>";
    mysqli_stmt_close($stmtPhoneNumber);
    mysqli_close($conn);
    return false;
}

mysqli_stmt_close($stmtPhoneNumber);

// Gunakan prepared statement untuk mencegah SQL injection pada email
$stmtEmail = mysqli_prepare($conn, "SELECT email FROM tbl_users WHERE email = ?");
mysqli_stmt_bind_param($stmtEmail, "s", $email);
mysqli_stmt_execute($stmtEmail);
mysqli_stmt_store_result($stmtEmail);

// Periksa apakah email sudah terdaftar
if (mysqli_stmt_num_rows($stmtEmail) > 0) {
    echo "<script>
            alert('Email Sudah Terdaftar!');
            window.history.go(-1); // Kembali ke halaman sebelumnya
          </script>";
    mysqli_stmt_close($stmtEmail);
    mysqli_close($conn);
    return false;
}

mysqli_stmt_close($stmtEmail);

// Lakukan operasi INSERT jika semua data belum terdaftar
$query_sql = "INSERT INTO tbl_users (fullname, username, phoneNumber, email, password)
              VALUES ('$fullname', '$username', '$phoneNumber', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: index.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}

mysqli_close($conn);
?>
