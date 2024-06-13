<?php
include 'connection.php';

$id_artikel = filter_input(INPUT_GET, 'id_artikel', FILTER_VALIDATE_INT);
if ($id_artikel === false) {
    echo "ID Artikel tidak ditemukan.";
    exit;
}

$query = "SELECT 
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
JOIN penulis ON kontributor.username = penulis.username 
WHERE artikel.id_artikel = ?";

$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $id_artikel);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    echo "Gagal mengeksekusi query.";
    exit;
}

if (!$row) {
    echo "Artikel tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['judul']); ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="pdf/<?php echo $row['file']; ?>">
        <h2><?php echo htmlspecialchars($row['judul']); ?></h2>
        <p><strong>Tanggal: </strong><?php echo htmlspecialchars($row['tanggal']); ?></p>
        <p><strong>Penulis: </strong><a href="profile.php?username=<?php echo htmlspecialchars($row['username']); ?>"><?php echo htmlspecialchars($row['username']); ?></a></p>
        <?php echo nl2br(htmlspecialchars($row['isi'])); ?>
        <?php if ($row['file']) { ?>
            <p><strong>Download: </strong><a href="pdf/<?php echo htmlspecialchars($row['file']); ?>" target="_blank">Download File</a></p>
        <?php } ?>
    </div>
</body>
</html>