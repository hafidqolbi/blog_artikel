<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Artikel</h5>
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

            <table class="table table-bordered table-striped" style="width: 100%; font-size: 14px;">
                <thead>
                <tr>
                    <th style="width: 5%">Id</th>
                    <th style="width: 15%">Tanggal</th>
                    <th style="width: 20%">Judul</th>
                    <th style="width: 30%">Isi</th>
                    <th style="width: 10%">Gambar</th>
                    <th style="width: 10%">Download</th>
                    <?php
                    // session_start();
                    // if ($_SESSION['level']=='Admin') {
                  ?>
                    <th style="width: 10%">Delete</th>
                    <?php
                    // }
                  ?>
                </tr>
                </thead>
                <tbody>
                <?php
                include 'connection.php';
                $no = 1;
                $a = "SELECT * FROM artikel";
                $aq = $koneksi->query($a);
                while ($aa = $aq->fetch_array()) {
                    $nmfile = $aa['file'];
                    $tanggal = $aa['tanggal'];
                    $judul = $aa['judul'];
                    $isi = $aa['isi'];
                  ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $aa['tanggal'];?></td>
                        <td><?php echo $aa['judul'];?></td>
                        <td><?php echo $aa['isi'];?></td>
                        <td><?php echo $aa['file'];?></td>
                        <td><a href="pdf/<?php echo $nmfile;?>" target="_blank">Download</a></td>
                        <?php
                        session_start();
                        if ($_SESSION['level'] == 'Admin') {
                          ?>
                            <td><a href="aksi_artikel.php?stts=hapus&id=<?php echo $aa['id_artikel']?>" >Hapus</a></td>
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