<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['telp'];
    $email = $_POST['email'];

    $cols = ['NIM', 'Nama', 'Jenis Kelamin','Alamat', 'No. HP', 'Email'];
    $data = [$nim, $nama, $gender, $alamat, $hp, $email];
    $file_csv = fopen('data.csv', 'a+');

    if ($file_csv !== false){
        if (filesize('data.csv') == 0){
            fputcsv($file_csv,$cols);
        }

        fputcsv($file_csv, $data);
        fclose($file_csv);

    }

    echo '<a href="index.html">Kembali Ke Form</a><br>';
    echo '<a href="data.csv">Download CSV</a>';

        }
?>