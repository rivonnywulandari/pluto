<?php
//koneksi
session_start();
include ("koneksi.php");

$tampil = $koneksi->query("SELECT b.nama_alternatif,c.nama_kriteria,c.jenis_kriteria,a.nilai,c.bobot
      FROM
        tab_topsis a
        JOIN
          tab_alternatif b USING(id_alternatif)
        JOIN
          tab_kriteria c USING(id_kriteria)");

$data      =array();
$kriterias =array();
$jenis_kriteria =array();
$bobot     =array();
$nilai_kuadrat =array();

if ($tampil) {
  while($row=$tampil->fetch_object()){
    if(!isset($data[$row->nama_alternatif])){
      $data[$row->nama_alternatif]=array();
    }
    if(!isset($data[$row->nama_alternatif][$row->nama_kriteria])){
      $data[$row->nama_alternatif][$row->nama_kriteria]=array();
    }
    if(!isset($nilai_kuadrat[$row->nama_kriteria])){
      $nilai_kuadrat[$row->nama_kriteria]=0;
    }
    $bobot[$row->nama_kriteria]=$row->bobot;
    $jenis_kriteria[$row->nama_kriteria]=$row->jenis_kriteria;
    $data[$row->nama_alternatif][$row->nama_kriteria]=$row->nilai;
    $nilai_kuadrat[$row->nama_kriteria]+=pow($row->nilai,2);
    $kriterias[]=$row->nama_kriteria;
  }
}

$kriteria     =array_unique($kriterias);
$jml_kriteria =count($kriteria);

// $jeniskriteria = $koneksi->query("SELECT jenis_kriteria FROM tab_kriteria");

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
                              <h2>Hasil TOPSIS</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span>1. Evaluation Matrix (x<sub>ij</sub>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                                    <tr>
                                    <th rowspan='3'>No</th>
                                    <th rowspan='3'>Alternatif</th>
                                    <th rowspan='3'>Nama</th>
                                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
                                    </tr>
                                    <tr>
                                    <?php
                                    foreach($kriteria as $k)
                                       echo "<th>$k</th>\n";
                                    ?>
                                    </tr>
                                    <tr>
                                    <?php
                                    for($n=1;$n<=$jml_kriteria;$n++)
                                       echo "<th>K$n</th>";
                                    ?>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i=0;
                                    foreach($data as $nama=>$krit){
                                    echo "<tr>
                                       <td>".(++$i)."</td>
                                       <th>A$i</th>
                                       <td>$nama</td>";
                                    foreach($kriteria as $k){
                                       echo "<td align='center'>$krit[$k]</td>";
                                    }
                                    echo "</tr>\n";
                                    }
                                    ?>
                                 </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span>2. Matriks Ternormalisasi (r<sub>ij</sub>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                                    <tr>
                                    <th rowspan='3'>No</th>
                                    <th rowspan='3'>Alternatif</th>
                                    <th rowspan='3'>Nama</th>
                                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
                                    </tr>
                                    <tr>
                                    <?php
                                    foreach($kriteria as $k)
                                       echo "<th>$k</th>\n";
                                    ?>
                                    </tr>
                                    <tr>
                                    <?php
                                    for($n=1;$n<=$jml_kriteria;$n++)
                                       echo "<th>K$n</th>";
                                    ?>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i=0;
                                    foreach($data as $nama=>$krit){
                                    echo "<tr>
                                       <td>".(++$i)."</td>
                                       <th>A{$i}</th>
                                       <td>{$nama}</td>";
                                    foreach($kriteria as $k){
                                       echo "<td align='center'>".round(($krit[$k]/sqrt($nilai_kuadrat[$k])),3)."</td>";
                                    }
                                    echo
                                       "</tr>\n";
                                    }
                                    ?>
                                 </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->                        
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span> 3. Matriks Bobot Ternormalisasi(y<sub>ij</sub>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                  <tr>
                    <th rowspan='3'>No</th>
                    <th rowspan='3'>Alternatif</th>
                    <th rowspan='3'>Nama</th>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach($kriteria as $k)
                      echo "<th>$k</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for($n=1;$n<=$jml_kriteria;$n++)
                      echo "<th>K$n</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  $y=array();
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      $y[$k][$i-1]=round(($krit[$k]/sqrt($nilai_kuadrat[$k])),3)*$bobot[$k];
                      echo "<td align='center'>".$y[$k][$i-1]."</td>";
                    }
                    echo
                     "</tr>\n";
                  }
                  ?>
                </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span> 4. Solusi Ideal Positif (A<sup>+</sup>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                  <tr>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach($kriteria as $k)
                      echo "<th>$k</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for($n=1;$n<=$jml_kriteria;$n++)
                      echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                    ?>
                  </tr>
                </thead>
                <tbody align='center'>
                  <tr>
                    <?php
                    
                    $yplus=array();
                    foreach($kriteria as $k){
                      if($jenis_kriteria[$k]=="Benefit"){
                      $yplus[$k]=([$k]?max($y[$k]):min($y[$k]));
                      echo "<th>$yplus[$k]</th>";}
                      else{
                        $yplus[$k]=([$k]?min($y[$k]):max($y[$k]));
                      echo "<th>$yplus[$k]</th>";
                      }
                    }
                    ?>
                  </tr>
                </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->                        
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span>  5. Solusi Ideal Negatif (A<sup>-</sup>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                  <tr>
                    <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
                  </tr>
                  <tr>
                    <?php
                    foreach($kriteria as $k)
                      echo "<th>{$k}</th>\n";
                    ?>
                  </tr>
                  <tr>
                    <?php
                    for($n=1;$n<=$jml_kriteria;$n++)
                      echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                    ?>
                  </tr>
                </thead>
                <tbody align='center'>
                  <tr>
                    <?php
                     $ymin=array();
                     foreach($kriteria as $k){
                       if($jenis_kriteria[$k]=="Cost"){
                       $ymin[$k]=([$k]?max($y[$k]):min($y[$k]));
                       echo "<th>$ymin[$k]</th>";}
                       else{
                         $ymin[$k]=([$k]?min($y[$k]):max($y[$k]));
                       echo "<th>$ymin[$k]</th>";
                       }
                     }

                    ?>
                  </tr>
                </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                         <!-- table section -->
                         <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span> 6. Jarak Positif (D<sub>i</sub><sup>+</sup>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                  <tr>
                    <th>No</th>
                    <th>Jarak Positif</th>
                    <th>Nama</th>
                    <th>D<suo>+</sup></th>
                  </tr>
                </thead>
                <tbody align='center'>
                  <?php
                  $i=0;
                  $dplus=array();
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>D<sub>{$i}</sub><sup>+</sup></th>
                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      if(!isset($dplus[$i-1])) $dplus[$i-1]=0;
                      $dplus[$i-1]+=pow($yplus[$k]-$y[$k][$i-1],2);
                    }
                    echo "<td>".round(sqrt($dplus[$i-1]),3)."</td>
                     </tr>\n";
                  }
                  ?>
                </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->                        
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span> 7. Jarak Negatif (D<sub>i</sub><sup>-</sup>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                  <tr>
                    <th>No</th>
                    <th>Jarak Negatif</th>
                    <th>Nama</th>
                    <th>D<suo>-</sup></th>
                  </tr>
                </thead>
                <tbody align='center'>
                  <?php
                  $i=0;
                  $dmin=array();
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                      <td>".(++$i)."</td>
                      <th>D<sub>{$i}</sub><sup>-</sup></th>

                      <td>{$nama}</td>";
                    foreach($kriteria as $k){
                      if(!isset($dmin[$i-1]))$dmin[$i-1]=0;
                      $dmin[$i-1]+=pow($ymin[$k]-$y[$k][$i-1],2);
                    }
                    echo "<td>".round(sqrt($dmin[$i-1]),3)."</td>
                     </tr>\n";
                  }
                  ?>
                </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                         <!-- table section -->                        
                         <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <div class="dash_head">
                                 <h3><span> 8.  Nilai Preferensi(V<sub>i</sub>)</span></span></h3>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <table style="color: black"; class="table table-bordered">
                                 <thead align='center'>
                  <tr>
                    <th>No</th>
                    <th>Nilai Preferensi</th>
                    <th>Nama</th>
                    <th>V<sub>i</sub></th>
                  </tr>
                </thead>
                <tbody align='center'>
                  <?php
                 
                          $i=0;
                          $V=array();
                          $Y=array();
                          $Z=array();                        
                          $hasilakhir=array();
                          

                          foreach ($data as $nama => $krit) {
                            echo "<tr>
                            <td>".(++$i)."</td>
                            <th>V{$i}</th>
                            <td>{$nama}</td>";             
                     foreach($kriteria as $k){
                      $V[$i-1]=round(sqrt($dmin[$i-1]),3)/(round(sqrt($dmin[$i-1]),3)+round(sqrt($dplus[$i-1]),3));
                    }
                    echo "<td>{$V[$i-1]}</td></tr>\n";
                  }
                  ?>
                </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- testimonial -->
                        <div class="col-md-12">
                           <div class="dark_bg full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Kesimpulan</h2>
                                 </div>
                              </div>
                              <div class="full graph_revenue">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="content testimonial">
                                          <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                             <!-- Wrapper for carousel items -->
                                             <div class="carousel-inner">
                                                <div class="item carousel-item active">                                                
                                                   <p class="testimonial">Berdasarkan Perhitungan TOPSIS Website Ini, Alternatif Terbaik Adalah</p>
                                                   <?php
                                                      $testmax = max($V);
                                                      for ($i=0; $i < count($V); $i++) { 
                                                         if ($V[$i] == $testmax) {
                                                            $queryy = $koneksi->query("SELECT * FROM tab_alternatif where id_alternatif = $i+1");
                                                            ?>
                                                            <p class="overview"><b><?php
                                                            $user = $queryy->fetch_array();
                                                            echo $user['nama_alternatif']; ?></b></p>
                                                            <p class="overview">Dengan Nilai V = <?php echo $V[$i]; ?></p>
                                                            
                                                            <?php
                                                         }
                                                      }
                                                    ?>
                                                </div>                                                
                                             </div>                                           
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end testimonial -->

                        
                     </div>
                  </div>
                  <!-- footer -->
                  
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Modal Heading</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     Modal body..
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end model popup -->
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>