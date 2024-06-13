<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Baca</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <table class="table table-bordered table-striped" style="margin: 20px; width: 100%; font-size: 14px;">
                <thead>
                <tr>
                    <th style="width: 5%">Id</th>
                    <th style="width: 15%">Tanggal</th>
                    <th style="width: 20%">Judul</th>
                    <th style="width: 30%">Isi</th>
                    <th style="width: 10%">Gambar</th>
                    <th style="width: 10%">Download</th>
                    <?php
                    session_start();
                    if ($_SESSION['level']=='Admin') {
                   ?>
                    <th style="width: 10%">Delete</th>
                    <?php
                    }
                   ?>
                </tr>
                </thead>
                <tbody>
                <?php
                include 'connection.php';

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

                $stmt = $koneksi->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $nmfile = $row['file'];
                    $tanggal = $row['tanggal'];
                    $judul = $row['judul'];
                    $isi = $row['isi'];
                   ?>
                    <tr>
                        <td><?php echo $row['id_artikel'];?></td>
                        <td><?php echo $row['tanggal'];?></td>
                        <td><?php echo $row['judul'];?></td>
                        <td><?php echo $row['isi'];?></td>
                        <td><?php echo $row['file'];?></td>
                        <td><a href="tampilan_artikel.php?id_artikel=<?php echo $row['id_artikel'];?>" class='btn btn-primary'>Baca Di Sini</a></td>
                        <?php
                        session_start();
                        if ($_SESSION['level'] == 'Admin') {
                           ?>
                            <td><a href="aksi_artikel.php?stts=hapus&id=<?php echo $row['id_artikel'];?>">Hapus</a></td>
                            <?php
                        }
                       ?>
                    </tr>
                    <?php
                }
               ?>
                </tbody>
            </table>

        </div>
    </div>
</div>