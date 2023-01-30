<?php
//untuk koneksi ke database
session_start();
include ("koneksi.php");

//proses delete
$id_alternatif = $_GET['id_alternatif'];
$id_kriteria = $_GET['id_kriteria'];
$sql     = "DELETE FROM tab_topsis WHERE id_alternatif = '$id_alternatif' AND id_kriteria = '$id_kriteria' ";
$hapus   = $koneksi->query($sql);

if ($hapus) {
  echo "<script>alert('Hapus Nilai Matriks Berhasil') </script>";
  echo "<script>window.location.href = \"nilmat.php\" </script>";
} else {
  echo "Maaf Tidak Dapat Menghapus !";
}
?>
