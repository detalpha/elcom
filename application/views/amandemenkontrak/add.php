<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Tambah</small>
        Amandemen Kontrak
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Amandemen Kontrak</a></li>
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
        <form role="form" method="post" action="<?= base_url("AmandemenKontrak/store")?>" enctype="multipart/form-data">
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
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nomoramandemen">Nomor Amandemen Kontrak</label>
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
                                    <label for="tglkontrak">Tanggal Kontrak</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="tglkontrak" name="tglkontrak" placeholder="dd/mm/yyyy" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gbamandemen">Garis Besar Amandemen</label>
                            <textarea class="form-control" rows="3" placeholder="Garis Besar Amandemen"  id="gbamandemen" name="gbamandemen"><?= set_value('gbamandemen'); ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="durasikontrak">Perubahan Durasi</label>
                                    <input type="number" class="form-control" id="durasikontrak" name="durasikontrak"  placeholder="Durasi Kontrak" value="<?= set_value('durasikontrak'); ?>" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="satuandurasi">&nbsp;</label>
                                    <select class="form-control select2" id="satuandurasi" name="satuandurasi" required>
                                        <option value='1'>Hari</option>
                                        <option value='2'>Bulan</option>
                                        <option value='3'>Tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nilaikontrak">Perubahan Nilai Kontrak</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control angkauang" id="nilaikontrak" placeholder="Nilai Kontrak" name="nilaikontrak" value="<?= set_value('nilaikontrak'); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="klausakontrak">Perubahan Klausa Kontrak</label>
                            <textarea class="form-control" rows="3" placeholder="Perubahan Klausa Kontrak"  id="klausakontrak" name="klausakontrak"><?= set_value('klausakontrak'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dokumen">Dokumen Pendukung</label>
                            <input type="file" id="dokumen" name="dokumen" accept=".pdf" required>
                            <p class="help-block">Format: <b>.pdf</b></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="text-align:center">
                <a type="button" class="btn btn-default" href="<?= base_url("AmandemenKontrak"); ?>">CANCEL</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-info">SAVE</button>
            </div>
            <!-- /.box-footer -->
        </form>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->