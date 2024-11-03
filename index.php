<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['telp'];
    $email = $_POST['email'];

    $cols = ['NIM', 'Nama', 'Jenis Kelamin', 'Alamat', 'No. HP', 'Email'];
    $data = [$nim, $nama, $gender, $alamat, $hp, $email];
    
    $file_csv = fopen('data.csv', 'a+');

    if ($file_csv !== false) {
        if (filesize('data.csv') == 0) {
            fputcsv($file_csv, $cols);
        }

        fputcsv($file_csv, $data);
        fclose($file_csv);
        
        $message = "Data berhasil disimpan.";
    } else {
        $message = "Data tidak berhasil disimpan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PHP</title>
</head>
<body>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
        <a href="index.php">Kembali Ke Form</a><br>
        <a href="data.csv">Download CSV</a>
    <?php else: ?>
        <form action="" method="post">
            <table border="0" style="width:400px;">
                <tr>
                    <td><label for="nim">NIM: </label></td>
                    <td><input type="text" inputmode="numeric" name="nim" id="nim"></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama: </label></td>
                    <td><input type="text" name="nama" id="nama"></td>
                </tr>
                <tr>
                    <td><label for="gender">Jenis Kelamin</label></td>
                    <td>
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="male">Laki-Laki</label>
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat: </label></td>
                    <td><textarea name="alamat" id="alamat" cols="25" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td><label for="telp">No. HP: </label></td>
                    <td><input type="tel" name="telp" id="telp"></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><p></p></td>
                </tr>
                <tr>

                    <td colspan="2" align="center"><input type="submit" value="Submit"></td>
                </tr>
                <tr>
                    <td>
                        <a href="data.csv">Unduh CSV</a>
                    </td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</body>
</html>
