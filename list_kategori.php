<div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Kategori</h5>
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

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <?php
session_start();
if ($_SESSION['level']=='Admin') {
?>
                                <th>Delete</th>
<?php
}
?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
	include 'connection.php';
	$no = 1;
	$a = "SELECT * FROM kategori";
	$aq = $koneksi->query($a);
	while ($aa = $aq->fetch_array()) {
	$nmfile = $aa['nm_kategori'];
	$tanggal = $aa['keterangan'];
	?>
	<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $aa['nm_kategori']; ?></td>
	<td><?php echo $aa['keterangan']; ?></td>
<?php
session_start();
if ($_SESSION['level']=='Admin') {
?>
	<td><a href="aksi_kategori.php?stts=hapus&id=<?php echo $aa['id_kategori']?>" >Hapus</a></td>
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