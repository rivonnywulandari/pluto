<?php
//koneksi
session_start();
require 'functions.php';
include ("koneksi.php");

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/profil1.png" alt="#" /></div>
                        <div class="user_info">
                           <h6><?php echo $_SESSION['name']; ?></h6>
                           <p> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Kelompok 3 SPK A</h4>
                  <ul class="list-unstyled components">
                     
                     <li><a href="index.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                     <li><a href="kriteria.php"><i class="fa fa-flag blue2_color"></i> <span>Kriteria</span></a></li>
                     <li><a href="alternatif.php"><i class="fa fa-diamond purple_color"></i> <span>Alternatif</span></a></li>
                     <li><a href="poin.php"><i class="fa fa-paper-plane red_color"></i> <span>Poin</span></a></li>
                     <li><a href="nilmat.php"><i class="fa fa-fax blue1_color"></i> <span>Nilai Matriks</span></a></li>
                     <li><a href="hastop.php"><i class="fa fa-table purple_color2"></i> <span>Hasil TOPSIS</span></a></li>
                     <li><a href="logout.php"><i class="fa fa-sign-out white_color2"></i> <span>Log Out</span></a></li>

                       
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="images/logo/logo2.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           
                           <div class="icon_info">
                              <ul>
                               
                              </ul>                                                             
                             
                              <ul class="user_profile_dd">
                                 
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                 
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Alernatif</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->                     
                     
                     <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="alternatif.php">Tabel Alternatif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="alternatiftambah.php">Tambah Alternatif</a>
                        </li>                       
                        </ul>
                    </div>
                    <div class="card-body">
                       <!-- isi disini tabel atau form -->
                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th>ID Alternatif</th>
                                                   <th>Nama Alternatif</th>                                                   
                                                   <th colspan="2">Aksi</th>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                                 <?php
                                                 $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                                                 while ($row = $sql->fetch_array()) {
                                                 ?>
                                                 <tr>
                                                   <td style="color: black";><?php echo $row[0] ?></td>
                                                   <td style="color: black";><?php echo $row[1] ?></td>                                                   
                                                   <td align="center">
                                                     <a href="editalternatif.php?id_alternatif=<?php echo $row['id_alternatif'] ?>"> <i class="fa fa-edit fa-fw"></i>
                                                     </td>
                                                   <td align="center">
                                                     <a href="hapusalternatif.php?id_alternatif=<?php echo $row['id_alternatif'] ?>"> <i class="fa fa-trash fa-fw"></i>
                                                     </td>
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                    <!-- tutup table atau form -->
                    </div>

                        <!-- end row -->
                     </div>
                     <!-- footer -->
                     <div class="container-fluid">
                        <div class="row">
                           <div class="footer">
                              <p>Copyright ?? 2018 Designed by html.design. All rights reserved.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end dashboard inner -->
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
   </body>
</html>