<?php
    // Panggil Database
    $koneksi = mysqli_connect("localhost", "root", "", "psk_web");

    // Baca Data Tabel
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_sensor ORDER BY id DESC");

    // Baca Data Paling Atas
    $data = mysqli_fetch_array($sql);
    $kelembaban = $data['kelembaban'];

    // Uji Jika Nilai Suhu = 0
    if( $kelembaban == '' ) $kelembaban = 0;

    // Cetak Nilai Suhu
    echo $kelembaban
?>