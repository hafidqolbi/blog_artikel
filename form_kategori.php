<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>KATEGORI<small></small></h5>
            </div>
            <div class="ibox-content">
                <form method="POST" class="form-horizontal" action="aksi_kategoristts=hapus.php">
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Kategori</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="nm_kategori"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Keterangan Kategori</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="keterangan"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <a href="home.php" class="btn btn-white">Cancel</a>
                            <button class="btn btn-primary" type="submit" name="save" value="Save">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
