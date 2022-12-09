<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Ubah Profile</small>
        User
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">Ubah Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <form role="form" class="form-horizontal" method="post" action="<?= base_url("User/updateprofile")?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="box-body">
            <?php 
                if (!empty(validation_errors())){
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            }
            ?>
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama user" value="<?= (!empty(set_value('namakontrak')) ? set_value('namakontrak'): $datakontrak[0]->name); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passconf" class="col-sm-3 control-label">Konfirmasi Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Ketik ulang password">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="text-align:center">
                <a type="button" class="btn btn-default" href="<?= base_url("User"); ?>">CANCEL</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-info">SAVE</button>
            </div>
            <!-- /.box-footer -->
        </form>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->