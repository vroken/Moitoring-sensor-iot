<?php
    // Panggil Database
    $koneksi = mysqli_connect("localhost", "root", "", "psk_web");

    // Baca data dari tabel database

    // Baca ID Tertinggi
    $sql_id = mysqli_query($koneksi, "SELECT MAX(id) FROM tb_sensor");
    // Menangkap Data
    $data_id = mysqli_fetch_array($sql_id);
    // Mengambil ID Terakhir
    $idAkhir = $data_id['MAX(id)'];
    $idAwal = $idAkhir - 5;

    // Baca Informasi tanggal untuk semua data
    $tanggal = mysqli_query($koneksi, "SELECT tanggal FROM tb_sensor WHERE id>='$idAwal' and id<='$idAkhir' ORDER BY id ASC");

    // Baca Informasi Suhu Untuk Semua Data - Sumbu Y di Grafik
    $suhuGrafik = mysqli_query($koneksi, "SELECT suhu FROM tb_sensor WHERE id>='$idAwal' and id<='$idAkhir' ORDER BY id ASC");
    $tanahGrafik = mysqli_query($koneksi, "SELECT soil FROM tb_sensor WHERE id>='$idAwal' and id<='$idAkhir' ORDER BY id ASC");
    $airGrafik = mysqli_query($koneksi, "SELECT kelembaban FROM tb_sensor WHERE id>='$idAwal' and id<='$idAkhir' ORDER BY id ASC");
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Grafik Sensor
    </div>

    <div class="card-body">
        <!-- Menampilkan Grafik -->
        <canvas id="myChart"></canvas>

        <!-- Gambar Grafik -->
        <script text="text/javascript">
            // baca id canvas
            var canvas = document.getElementById('myChart');

            // Meletakan data tanggal dan data sensor untuk grafik
            var data = {
                labels: [
                    <?php 
                        while($data_tanggal = mysqli_fetch_array($tanggal))
                        {
                            echo '"'.$data_tanggal['tanggal'].'",';
                        }
                    ?>
                ],
                datasets: [
                    {
                        label: "Suhu",
                        fill: true,
                        backgroundColor: "rgba(208, 241, 123, 0.3)",
                        borderColor: "rgba(208, 241, 123, 0.8)",
                        lineTension: 0.5,
                        pointRadius: 5,
                        data: [
                            <?php
                                while($data_suhu = mysqli_fetch_array($suhuGrafik))
                                {
                                    echo $data_suhu['suhu'].',';
                                }
                            ?>
                        ]
                    },
                    {
                        label: "Kelembaban Tanah",
                        fill: true,
                        backgroundColor: "rgba(101, 68, 3, 0.3)",
                        borderColor: "rgba(101, 68, 3, 0.8)",
                        lineTension: 0.5,
                        pointRadius: 5,
                        data: [
                            <?php
                                while($data_tanah = mysqli_fetch_array($tanahGrafik))
                                {
                                    echo $data_tanah['soil'].',';
                                }
                            ?>
                        ]
                    },
                    {
                        label: "Ultrasonik",
                        fill: true,
                        backgroundColor: "rgba(38, 67, 251, 0.3)",
                        borderColor: "rgba(38, 67, 251, 0.8)",
                        lineTension: 0.5,
                        pointRadius: 5,
                        data: [
                            <?php
                                while($data_air = mysqli_fetch_array($airGrafik))
                                {
                                    echo $data_air['kelembaban'].',';
                                }
                            ?>
                        ]
                    },
                ]
            };

            // Option Grafik
            var option = {
                showLines: true,
                animation: {duration: 0}
            };

            // Cetak Grafik
            var myLineChart = Chart.Line(canvas, {
                data: data,
                options: option
            });
        </script>
    </div>
</div>