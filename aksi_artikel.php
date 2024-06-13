<?php
    session_start();
	include 'connection.php';
    $stts=$_GET['stts'];
    if ($stts=="tambah") {
    error_reporting(E_ALL^(E_NOTICE|E_WARNING));
        $tanggal = $_POST['tanggal'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['id_kategori'];
        $nama_file = $_FILES['uproposal']['name'];
        $ukuran_file = $_FILES['uproposal']['size'];
        $tipe_file = $_FILES['uproposal']['type'];
        $tmp_file = $_FILES['uproposal']['tmp_name'];
        $path = "pdf/".$nama_file;
        if ($tipe_file=="image/jpeg" || $tipe_file=="image/png") {
        if ($ukuran_file <= 1000000) {
        if (move_uploaded_file($tmp_file, $path)) {
        echo $query = "INSERT INTO artikel (tanggal, judul, isi, id_kategori, file, type, size) VALUES ('".$tanggal."', '".$judul."', '".$isi."','".$kategori."','".$nama_file."','".$tipe_file."','".$ukuran_file."')";
        $a = $koneksi -> query($query);
        if ($a === true) {
            $query = "SELECT id_artikel FROM artikel ORDER BY id_artikel DESC LIMIT 1";
            $a = $koneksi->query($query);
            $result = $a->fetch_assoc();
            $id_artikel = $result['id_artikel'];
            $query = "INSERT INTO kontributor (`id_kategori`, `id_artikel`, `username`) VALUES ('$kategori', '$id_artikel', '".$_SESSION['username']."')";
            $a = $koneksi->query($query);
        echo "<script>alert('File Berhasil di Upload');history.go(-1);</script>";
        }else {
        echo "<script>alert('File Gagal Masuk Database');history.go(-1);</script>";
        }
        }else {
        echo "<script>alert('File Gagal TerUpload');history.go(-1);</script>";
        }
        }else {
        echo "<script>alert('Ukiuran File Lebih Dari 1 MB');history.go(-1);</script>";
        }
        }else {
        echo "<script>alert('File Bukan Bereksistensi JPG/PNG');history.go(-1);</script>";
        }

    }if ($stts=="hapus") {
        $id=$_GET['id'];
        $query = "DELETE FROM artikel WHERE id_artikel=$id";
        $a = $koneksi->query($query); 
        if ($a===TRUE) {
            echo "<script>alert('Data Terhapus'); document.location.href = 'home.php?page=list_artikel';</script>";
        }   else{
            echo "GAGAL TRELR";
        }
    }
	?>
