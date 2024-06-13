<?php
    include "connection.php";
    $stts=$_GET['stts'];
    if ($stts=="tambah") {
    error_reporting(E_ALL^(E_NOTICE|E_WARNING));
    $nm_kategori = $_POST['nm_kategori'];
    $keterangan = $_POST['keterangan'];
    $sql = "INSERT INTO kategori (nm_kategori, keterangan) VALUES ('".$nm_kategori."','".$keterangan."')";
    $query = $koneksi->query($sql);
    if($query === true){
        header('location: home.php');
    }else{
        echo "errooooooooor";
    }
}if ($stts=="hapus") {
    $id=$_GET['id'];
    $query = "DELETE FROM kategori WHERE id_kategori=$id";
    $a = $koneksi->query($query); 
    if ($a===TRUE) {
        echo "<script>alert('Data Terhapus'); document.location.href = 'home.php?page=list_kategori';</script>";
    }   else{
        echo "GAGAL TRELR";
    }
}
?>