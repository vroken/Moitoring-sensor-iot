<?php 
    // Panggil Database
    $koneksi = mysqli_connect("localhost", "root", "", "psk_web");

    // Baca ID Tertinggi
    $sql_id = mysqli_query($koneksi, "SELECT * FROM tb_sensor");
    // Menangkap Data
    $data_id = mysqli_fetch_array($sql_id);

    $tinggi_max_tangki = 300; //tinggi tangki dalam cm
    $jari2 = 1; //jari2 tangki dalam meter
    $phi = 3.14; //volume = phi * r^2 * tinggi (tinggi air)

    // Ukur Tinggi air
    $tinggi_air = $tinggi_max_tangki - $data_id['kelembaban'];
    // Persentase ketinggian air
    $prosentase_tinggi_air = ($tinggi_air/$tinggi_max_tangki)*100; //Hasil Persen

    //Hitung Volume Air
    $volume = $phi * ($jari2*$jari2) * ($tinggi_air/100);  // Satuan m3

    //Hitung jumlah liter air --> 1 m3 = 1000 L
    $liter = $volume * 1000;

?>



<div class="card-body pegangan"></div>
<div class="card-body penutup"></div>
<div class="card-body tangki">
    <div class="air" style="width: 100%; height: <?php echo $prosentase_tinggi_air ?>%;">
        <!-- Menampilkan Informasi Tinggi Air, Volume Air, dan Liter -->
        <?php 
            echo "Tinggi Air : ".($tinggi_air/100)." m";
            echo "<br>";
            echo "Volume Air : ".($volume)." m³";
            echo "<br>";
            echo "Liter Air : ".number_format($liter)." Liter";
        ?>

    </div>
</div>
<div class="card-body ">
    <div></div>
</div>