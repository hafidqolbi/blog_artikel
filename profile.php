<?php
include 'connection.php';

$username = $_GET['username'];

$query = "SELECT * FROM penulis WHERE username = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Penulis</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Profil Penulis: <?php echo $row['username']; ?></h2>
        <p><strong>Email: </strong><?php echo $row['email']; ?></p>
        <p><strong>Level: </strong><?php echo $row['level']; ?></p>
        <!-- Anda bisa menambahkan informasi lain yang diperlukan -->
    </div>
</body>
</html>
