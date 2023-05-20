<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" type="text/css" href="css/styles.css"> -->

    <!-- Jquery -->
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="jquery/mdb.min.js"></script>
    <script type="text/javascript" src="jquery/jquery-latest.js"></script>

    <!-- Auto Load -->
    <script type="text/javascript">
      $(document).ready(function () {
        setInterval(() => {
          $("#cek-suhu").load("cek-suhu.php");
          $("#cek-kelembaban").load("cek-kelembaban.php");
          $("#cek-soil").load("cek-soil.php");
        }, 1000);
      });
    </script>

    <!-- Memanggil data Grafik -->
    <script type="text/javascript">
        var refreshid = setInterval(()=> {
            $('#responsecontainer').load('grafik.php');
        }, 3000);
    </script>

    <!-- Memanggil Data Air -->
    <script type="text/javascript">
        $(document).ready(()=> {
            setInterval(()=> {
                $('#data-air').load('air.php');
            }, 3000);
        });
    </script>


    <style>
      h1, h4, h3, h5, p {
        text-align: center;
        margin: 10px;
      }

      .judul {
        margin-top: 100px;
        margin-bottom: 30px;
      }

      h3 {
        margin-top: 60px;
        margin-bottom: 30px;
      }
      .container{
        text-align: center;
      }
      .card-header{
        font-weight: bold;
        background-color: #0b3033;
        color: white;
      }
      .navbar-collapse {
        position: relative;
      }

      .tangki {
        border-style: solid;
        width: 300px;
        height: 300px;
        left: 60%;
        transform: translate(-50%);
        position: sticky;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }

      .air {
        left: 50%;
        bottom: 0px;
        transform: translate(-50%);
        position: absolute;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        background-color: blue;
      }

      .penutup {
        border-style: solid;
        width: 300px;
        height: 40px;
        left: 60%;
        transform: translate(-50%);
        position: sticky;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
      }

      .pegangan {
        border-style: solid;
        width: 40px;
        height: 20px;
        left: 60%;
        transform: translate(-50%);
        position: sticky;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
      }
    </style>
  </head>
  <body>

  <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
     <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="">Web IoT</a>
                <!-- <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo" srcset=""></a> -->
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
                    <label class="form-check-label" ></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path></svg>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item  ">
                <a href="index.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li
                class="sidebar-item ">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill "></i>
                    <span>Data Sensor</span>
                </a>
            </li>

            <li
                class="sidebar-item ">
                <a href="project.html" class='sidebar-link'>
                    <i class="bi bi-kanban"></i>
                    <span>Project</span>
                </a>
            </li>

            <li
                class="sidebar-item ">
                <a href="about.html" class='sidebar-link'>
                    <i class="bi bi-file-earmark-person "></i>
                    <span>About Us</span>
                </a>
            </li>

            <li
                class="sidebar-item ">
                <a href="contact.html" class='sidebar-link'>
                    <i class="bi bi-person-workspace"></i>
                    <span>Contact</span>
                </a>
            </li>
        </ul>
    </div>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h4>Penyiraman Tanaman Otomatis Berbasis IoT</h4>
                    <p class="text-subtitle text-muted text-left">Berikut merupakan User Interface pada data sensor</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <br></br>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Data Sensor</h1>
                            <p class="text-subtitle text-muted text-left">Data Sensor Saat Ini</p>
                            <br/>
                            <h2 class="bi bi-thermometer-sun text-center">
                                <h4 class="text-center" style="margin-top: -15px;">Sensor Suhu</h4>
                            </h2>
                            <div class="card-body">
                                <h1 id="cek-suhu">0</h1>
                            </div>

                            <h2 class="bi bi-droplet-half text-center">
                                <h4 class="text-center" style="margin-top: -15px;">Sensor Kelembaban</h4>
                            </h2>
                            <div class="card-body">
                                <h1 id="cek-kelembaban">0</h1>
                            </div>

                            <h2 class="bi bi-moisture text-center">
                                <h4 class="text-center" style="margin-top: -15px;">Sensor Soil Moisture</h4>
                            </h2>
                            <div class="card-body">
                                <h1 id="cek-soil">0</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Seluruh Data Sensor</h1>
                            <br></br>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Sensor Suhu</th>
                                    <th scope="col">Sensor Kelembaban</th>
                                    <th scope="col">Sensor Soil Moisture</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                        // Panggil Database
                                        $koneksi = mysqli_connect("localhost", "root", "", "psk_web");

                                        // Baca Data Tabel
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_sensor ORDER BY id DESC");

                                        $no = 1;
                                        while($tampil = mysqli_fetch_array($sql)) {
                                            echo "
                                                <tr>
                                                    <td>$no</td>
                                                    <td>$tampil[suhu]</td>
                                                    <td>$tampil[kelembaban]</td>
                                                    <td>$tampil[soil]</td>
                                                </tr>
                                            ";
                                            $no++;
                                        }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="bar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Grafik Sensor Real Time</h1>
                            <p>Menampilkan 5 Data Terakhir</p>
                        </div>
                        <div class="card-body container">
                            <div id="responsecontainer"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card container">
                        <div class="card-header">
                            <h1>Ketinggian Volume Air</h1>
                        </div>
                        <p>Tangki Air (Tinggi Max : 3 Meter)</p>
                        <div id="data-air"></div>
                    </div>
                </div>
            </div>
        </section>
        <br></br>
        <br></br>
        <footer>
            <div class="footer clearfix mb-0 text-muted d-flex justify-content-center">
                <div class="float-start ">
                    <p>2023 &copy; Tugas Akhir Skripsi - Irwan Prasetyo</p>
                </div>
            </div>
        </footer>
    </div>    


    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/extensions/dayjs/dayjs.min.js"></script>
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="ui-apexchartt.js"></script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>