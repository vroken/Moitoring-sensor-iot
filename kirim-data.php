<?php
    // Panggil Database
    $koneksi = mysqli_connect("localhost", "root", "", "psk_web");

    //Baca data yg dikirim mikon
    $suhu = $_GET['suhu'];
    $kelembaban = $_GET['kelembaban'];
    $soil = $_GET['soil'];

    //simpan ke tabel
    mysqli_query($koneksi, "ALTER TABLE tb_sensor AUTO_INCREMENT=1");

    //simpan data sensor ke tabel
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_sensor(suhu, kelembaban, soil) VALUES('$suhu', '$kelembaban', '$soil')");

    //Uji simpan respon
    if($simpan)
        echo "Berhasil Dikirim";
    else
        echo "Gagal Dikirim!";
?>