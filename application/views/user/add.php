<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Tambah</small>
        User
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <form role="form" class="form-horizontal" method="post" action="<?= base_url("User/store")?>" enctype="multipart/form-data">
            <div class="box-body">
            <?php 
                if (!empty(validation_errors()) || !empty($error)){
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
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama user" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email user" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="role" class="col-sm-3 control-label">Role</label>
                            <div class="col-sm-6">
                                <select id="role" class="form-control" style="width: 100%;" name="role" required>
                                    <option value='' disabled>-- Pilih Role --</option>
                                    <?php 
                                        foreach($listrole as $data) {
                                    ?>
                                        <option value='<?= $data->id; ?>' <?= ($data->id == set_value('role') ? "selected" : ""); ?>><?= $data->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passconf" class="col-sm-3 control-label">Konfirmasi Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Ketik ulang password" required>
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