<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Tambah</small>
        Amandemen Bank Garansi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Amandemen Bank Garansi</a></li>
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
        <form role="form" method="post" action="<?= base_url("AmandemenBank/store")?>" enctype="multipart/form-data">
            <div class="box-body">
            <?php 
                if (!empty(validation_errors()) || !empty($error)){
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    <?php echo validation_errors(); ?>
                    <?php echo $error; ?>
                </div>
            <?php
            }
            ?>
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nomoramandemen">Nomor Amandemen Bank Garansi</label>
                            <input type="text" class="form-control" id="nomoramandemen" placeholder="Nomor Amandemen Kontrak" name="nomoramandemen" value="<?= set_value('nomoramandemen'); ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nomorkontrak">Nomor Kontrak</label>
                                    <select class="form-control select2" id="nomorkontrak" name="nomorkontrak" required>
                                        <option value='' disabled>-- Pilih Kontrak --</option>
                                    <?php 
                                        foreach($listkontrak as $data) {
                                    ?>
                                        <option value='<?= $data->id; ?>' data-tgl="<?= $data->tgl_kontrak; ?>" <?= ($data->id == set_value('nomorkontrak') ? "selected" : ""); ?>><?= $data->no_kontrak; ?></option>
                                    
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tglamandemen">Tanggal Amandemen</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right inputtgl" id="tglamandemen" name="tglamandemen" placeholder="dd/mm/yyyy" value="<?= set_value('tglamandemen'); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="revisitgl">Perubahan Durasi</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right inputtgl" id="revisitgl" name="revisitgl" placeholder="dd/mm/yyyy" value="<?= set_value('revisitgl'); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="revisinilai">Perubahan Nilai Bank Garansi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control angkauang" id="revisinilai" placeholder="Perubahan Nilai Bank Garansi" name="revisinilai" value="<?= set_value('revisinilai'); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="text-align:center">
                <a type="button" class="btn btn-default" href="<?= base_url("AmandemenBank"); ?>">CANCEL</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-info">SAVE</button>
            </div>
            <!-- /.box-footer -->
        </form>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->