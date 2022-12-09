<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Tambah</small>
        Role
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Role</a></li>
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
        <form role="form" class="form-horizontal" method="post" action="<?= base_url("Role/store")?>" enctype="multipart/form-data">
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
                            <label for="namarole" class="col-sm-3 control-label">Nama Role</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="namarole" id="namarole" placeholder="Masukan nama role" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slug" class="col-sm-3 control-label">Slug</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Masukan nama role" required>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Izinkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Manage Kontrak</td>
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="minimal" value="manage-kontrak" name="menu[]">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Manage Kontrak</td>
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="minimal" value="manage-kontrak" name="menu[]">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Amandemen Kontrak</td>
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="minimal" value="amandemen-kontrak" name="menu[]">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Amandemen Bank</td>
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="minimal" value="amandemen-bank" name="menu[]">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Manage Role</td>
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="minimal" value="manage-role" name="menu[]">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Manage User</td>
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="minimal" value="manage-user" name="menu[]">
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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