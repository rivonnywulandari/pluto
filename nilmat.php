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
                                 <h2>Nilai Matriks</h2>
                              </div>
                           </div>
                        </div>
                           <!-- row -->          
                         
                  
                           <div class="col-md-14">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                 <h3><span>Pengisian Nilai Matriks</span></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <div class="panel-body">
                                       <div class="row">
                                          <div class="col-lg-12">
                                          <form class="form" action="" method="post">
                                             <div class="form-group">
                                                <select class="form-control" name="id_alternatif">
                                                <option>Nama Alternatif</option>
                                                <?php
                                                //ambil data dari database
                                                $nama = $koneksi->query('SELECT * FROM tab_alternatif ORDER BY id_alternatif');
                                                while ($datalter = $nama->fetch_array())
                                                {
                                                   echo "<option value=\"$datalter[id_alternatif]\">$datalter[nama_alternatif]</option>\n";
                                                }
                                                ?>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <select class="form-control" name="id_kriteria">
                                                <option>Nama Kriteria</option>
                                                <?php
                                                //ambil data dari database
                                                $krit = $koneksi->query('SELECT * FROM tab_kriteria ORDER BY id_kriteria');
                                                while ($datakrit = $krit->fetch_array())
                                                {
                                                   echo "<option value=\"$datakrit[id_kriteria]\">$datakrit[nama_kriteria]</option>\n";
                                                }
                                                ?>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <select class="form-control" name="poin">
                                                <option>Nilai</option>
                                                <?php
                                                //ambil data dari database
                                                $poin = $koneksi->query('SELECT * FROM tab_poin ORDER BY poin');
                                                while ($datapoin = $poin->fetch_array())
                                                {
                                                   echo "<option value=\"$datapoin[poin]\">$datapoin[nama_poin]</option>\n";
                                                }
                                                ?>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <button type="submit" name="simpan" class="btn btn-success">Proses</button>
                                             </div>
                                          </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="task_list_main">
                                    <ul class="task_list">
                                       <!-- tabel pemberian nilai -->
                    <div class="col-md-14">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Tabel Nilai</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <?php
                  //pemanggilan data, matra dan pangkat
                  $sql = $koneksi->query("SELECT * FROM tab_topsis
                  JOIN tab_alternatif ON tab_topsis.id_alternatif=tab_alternatif.id_alternatif
                  JOIN tab_kriteria ON tab_topsis.id_kriteria=tab_kriteria.id_kriteria ORDER BY tab_alternatif.nama_alternatif") or die (mysql_error());
                   ?>
                 <table style="color: black"; class="table">
                                       <thead class="thead-dark">
                      <tr>
                        <th>NO</th>
                        <th>ALTERNATIF</th>
                        <th>KRITERIA</th>
                        <th>NILAI</th>
                        <th colspan="2">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                   
                      <?php
                      $no=1;
                      //menampilkan data
                      while ($row = $sql->fetch_array())
                      {
                        $nmkriteria   =$row['nama_kriteria'];
                        echo ("<tr><td align=\"center\">".$no."</td>");
                        echo ("<td align=\"left\">".$row[4]."</td>");
                        echo ("<td align=\"left\">".$nmkriteria."</td>");
                        echo ("<td align=\"left\">".$row[2]."</td>");     
                        echo "<td align=\"center\">
                        <a href=\"hapusnilmat.php?id_alternatif=".$row[0]."&"."id_kriteria=".$row[1]."\"> <i class=\"fa fa-trash fa-fw\"></i>
                        </td>";                  
                        echo "</tr>";
                        $no++;
                      }
                       ?>
                    </tbody>
                  </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- tutup tabel pemberian nilai -->
                                    </ul>
                                 </div>
                                
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                                 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Tabel Alternatif</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <?php
                           $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                           ?>
                                    <table style="color: black"; class="table table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Alternatif</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">".$row[0]."</td>");
                                echo ("<td align=\"left\">".$row[1]."</td>");
                                echo "</tr>";
                              }
                               ?>
                            </tbody>
                          </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Tabel Kriteria</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <?php
                          $sql = $koneksi->query('SELECT * FROM tab_kriteria');
                           ?>
                                    <table style="color: black"; class="table table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Jenis</th>
                                <th>Bobot</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">".$row[0]."</td>");
                                echo ("<td align=\"left\">".$row[1]."</td>");
                                echo ("<td align=\"left\">".$row[2]."</td>");
                                echo ("<td align=\"left\">".$row[3]."</td>");
                                echo "</tr>";
                              }
                               ?>
                            </tbody>
                          </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Tabel Poin</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <?php
                          $sql = $koneksi->query('SELECT * FROM tab_poin');
                          ?>
                                    <table style="color: black"; class="table table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Poin</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">".$row[0]."</td>");
                                echo ("<td align=\"center\">".$row[1]."</td>");
                                echo "</tr>";
                              }
                               ?>
                            </tbody>
                          </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Indikator Penilaian</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th align="center">Sub Kriteria</th>
                                          <th>Nilai</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>Sangat Buruk</td>
                                          <td>1</td>
                                       </tr>
                                       <tr>
                                          <td>Buruk</td>
                                          <td>2</td>
                                       </tr>
                                       <tr>
                                          <td>Cukup Baik</td>
                                          <td>3</td>
                                       </tr>
                                       <tr>
                                          <td>Baik</td>
                                          <td>4</td>
                                       </tr>
                                       <tr>
                                          <td>Sangat Baik</td>
                                          <td>5</td>
                                       </tr>
                                    </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Indikator Harga</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th align="center">Sub Kriteria</th>
                                          <th>Nilai</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>< Rp25.000 </td>
                                          <td>3</td>
                                       </tr>
                                       <tr>
                                          <td>Rp26.000 - Rp30.000 </td>
                                          <td>2</td>
                                       </tr>
                                       <tr>
                                          <td>> Rp30.000 </td>
                                          <td>1</td>
                                       </tr>
                                    </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
                   
                        <?php

                        if( isset($_POST["simpan"])){

                        if( tambah_nilmat($_POST) > 0){
                           echo "
                                 <script>
                                    alert('data berhasil ditambahkan!');
                                    document.location.href = 'nilmat.php';
                                    </script>";
                        }
                        else{
                           echo "
                                 <script>
                                    alert('data gagal ditambahkan!');
                                    document.location.href = 'nilmat.php';
                                    </script>";
                        }
                        }
                        
                        ?>

                     <!-- footer -->
                     <!-- <div class="container-fluid">
                        <div class="row">
                           <div class="footer">
                              <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                           </div>
                        </div>
                     </div> -->
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