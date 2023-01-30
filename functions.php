<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "topsispluto");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah_kriteria($data){
    global $conn;

    $nama_kriteria = $data['nama_kriteria'];
    $jenis_kriteria = $data['jenis_kriteria'];
    $bobot    = $data['bobot'];
    $select = mysqli_query($conn, "SELECT * FROM tab_kriteria WHERE nama_kriteria = '".$data['nama_kriteria']."'");
    if(mysqli_num_rows($select)) {
        echo "
                                 <script>
                                    alert('data gagal ditambahkan!');
                                    document.location.href = 'kriteria.php';
                                    </script>";
    }
    else{
    $query = "INSERT INTO tab_kriteria
    VALUES 
    ('', '$nama_kriteria', '$jenis_kriteria', '$bobot')";
    mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);

}

function ubah_kriteria($data){
    global $conn;

    $id_kriteria  = $data['id_kriteria'];
    $nama_kriteria = $data['nama_kriteria'];
    $jenis_kriteria = $data['jenis_kriteria'];
    $bobot    = $data['bobot'];

    $query = "UPDATE tab_kriteria SET nama_kriteria ='".$nama_kriteria."', jenis_kriteria ='".$jenis_kriteria."',bobot ='".$bobot."' WHERE id_kriteria='".$id_kriteria."' ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_alternatif($data){
    global $conn;

    $nama_alternatif = $data['nama_alternatif'];
    $select = mysqli_query($conn, "SELECT * FROM tab_alternatif WHERE nama_alternatif = '".$data['nama_alternatif']."'");
    if(mysqli_num_rows($select)) {
        echo "
                                 <script>
                                    alert('data gagal ditambahkan!');
                                    document.location.href = 'alternatif.php';
                                    </script>";
    }
    else{
    $query = "INSERT INTO tab_alternatif
    VALUES 
    ('', '$nama_alternatif')";
    mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
    
}

function ubah_alternatif($data){
    global $conn;
    $id_alternatif   = $data['id_alternatif'];
    $nama_alternatif = $data['nama_alternatif'];

    $query = "UPDATE tab_alternatif SET nama_alternatif ='".$nama_alternatif."' WHERE id_alternatif ='".$id_alternatif."' ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_poin($data){
    global $conn;

    $poin = $data['poin'];
    $poin = $data['nama_poin'];

    $select = mysqli_query($conn, "SELECT * FROM tab_poin WHERE poin = '".$data['poin']."'");
    if(mysqli_num_rows($select)) {
        echo "
                                 <script>
                                    alert('data gagal ditambahkan!');
                                    document.location.href = 'poin.php';
                                    </script>";
    }
    else{
    $query = "INSERT INTO tab_poin
    VALUES 
    ('', '$poin', '$nama_poin')";
    mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}

function ubah_poin($data){
    global $conn;
    $id_poin   = $data['id_poin'];
    $poin = $data['poin'];

    $query = "UPDATE tab_poin SET poin ='".$poin."' WHERE id_poin ='".$id_poin."' ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_nilmat($data){
    global $conn;

    $id_alternatif = $data['id_alternatif'];
    $id_kriteria   = $data['id_kriteria'];
    $poin       = $data['poin'];
    $query = "INSERT INTO tab_topsis 
    VALUES 
    ('$id_alternatif','$id_kriteria','$poin')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>