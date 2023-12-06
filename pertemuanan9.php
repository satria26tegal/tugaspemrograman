<!DOCTYPE html>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
$nim = $nama = $email = $alamat = $nohp = $prodi ="";
$nimErr = $namaErr = $emailErr = $alamatErr = $nohpErr = $prodiErr = "";
$submitPressed = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitPressed = true; 

    // Validasi NIM
    if (empty($_POST["nim"])) {
        $nimErr = "*NIM wajib diisi";
    } else {
        $nim = test_input($_POST["nim"]);
    }

    // Validasi Nama
    if (empty($_POST["nama"])) {
        $namaErr = "*Nama wajib diisi";
    } else {
        $nama = test_input($_POST["nama"]);
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "*Email wajib diisi";
    } else {
        $email = test_input($_POST["email"]);
        // Validasi format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    // Validasi Alamat
    if (empty($_POST["alamat"])) {
        $alamatErr = "*Alamat wajib diisi";
    } else {
        $alamat = test_input($_POST["alamat"]);
    }
    
    // Validasi No HP
    if (empty($_POST["nohp"])) {
        $nohpErr = "*No HP wajib diisi";
    } else {
        $nohp = test_input($_POST["nohp"]);
    }

    // Validasi Prodi
    if (empty($_POST["prodi"])){
        $prodiErr = "*Prodi wajib diisi";
    } else {
        $prodi = test_input($_POST["prodi"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    NIM: <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $submitPressed ? $nimErr : ''; ?></span>
    <br><br>

    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $submitPressed ? $namaErr : ''; ?></span>
    <br><br>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $submitPressed ? $emailErr : ''; ?></span>
    <br><br>

    Alamat: <textarea name="alamat" rows="5" cols="40"><?php echo $alamat; ?></textarea>
    <span class="error"><?php echo $submitPressed ? $alamatErr : ''; ?></span>
    <br><br>

    No HP: <input type="text" name="nohp" value="<?php echo $nohp; ?>">
    <span class="error"><?php echo $submitPressed ? $nohpErr : ''; ?></span>
    <br><br>

    Prodi: <input type="text" name="prodi" value="<?php echo $prodi; ?>">
    <span class="error"><?php echo $submitPressed ? $prodiErr : ''; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php

if ($submitPressed && $nimErr == "" && $namaErr == "" && $emailErr == "" && $alamatErr == "" && $nohpErr == "" && $prodiErr == "") {
    echo "<h2>Hasil Input:</h2>";
    echo "NIM: " . $nim . "<br>";
    echo "Nama: " . $nama . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Alamat: " . $alamat . "<br>";
    echo "No HP: " . $nohp . "<br>";
    echo "Prodi: " . $prodi . "<br>"; 

}
?>

</body>
</html>
