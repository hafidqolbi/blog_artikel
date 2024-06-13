<?php
include 'connection.php'; // Include file connection.php untuk koneksi ke database

// Query untuk mengambil artikel, kategori, dan penulis
$sql = "SELECT 
            artikel.id_artikel, 
            artikel.judul, 
            artikel.isi, 
            artikel.file, 
            artikel.tanggal, 
            kategori.nm_kategori, 
            penulis.username 
        FROM artikel 
        JOIN kategori ON artikel.id_kategori = kategori.id_kategori 
        JOIN kontributor ON artikel.id_artikel = kontributor.id_artikel 
        JOIN penulis ON kontributor.username = penulis.username";

$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Halaman Depan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .card-custom {
            margin-bottom: 30px; /* Memberikan jarak antar postingan artikel */
        }
        .card-img-top {
            height: 200px; /* Menyesuaikan tinggi gambar */
            object-fit: cover; /* Memastikan gambar terpotong sesuai ukuran */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Artikel</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card card-custom"> <!-- Menambahkan kelas khusus untuk memberikan margin bawah -->
                            <img class="card-img-top" src="pdf/<?php echo $row['file']; ?>" alt="<?php echo $row['judul']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                <p class="card-text"><?php echo substr($row['isi'], 0, 100) . '...'; ?></p> <!-- Potong teks untuk ringkasan -->
                                <p class="card-text"><small class="text-muted">Kategori: <?php echo $row['nm_kategori']; ?></small></p>
                                <p class="card-text"><small class="text-muted">Penulis: <?php echo $row['username']; ?></small></p>
                                <p class="card-text"><small class="text-muted">Tanggal: <?php echo date("d-m-Y H:i", strtotime($row['tanggal'])); ?></small></p>
                                <a href="tampilan_artikel.php?id_artikel=<?php echo $row['id_artikel']; ?>" class="btn btn-primary">Lihat Selengkapnya</a> <!-- Tombol Lihat Selengkapnya -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Tidak ada artikel yang tersedia.</p>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
