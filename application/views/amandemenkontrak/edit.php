<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Ubah</small>
        Amandemen Kontrak
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Amandemen Kontrak</a></li>
        <li class="active">Ubah</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <form role="form" method="post" action="<?= base_url("AmandemenKontrak/update")?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $datakontrak[0]->id ?>">
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
                            <label for="nomoramandemen">Nomor Amandemen Kontrak</label>
                            <input type="text" class="form-control" id="nomoramandemen" placeholder="Nomor Amandemen Kontrak" name="nomoramandemen" value="<?= $datakontrak[0]->no_kontrak; ?>" required>
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
                                        <option value='<?= $data->id; ?>' data-tgl="<?= $data->tgl_kontrak; ?>" <?= ($data->id == $datakontrak[0]->no_kontrak ? "selected" : ""); ?>><?= $data->no_kontrak; ?></option>
                                    
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
                            <textarea class="form-control" rows="3" placeholder="Garis Besar Amandemen"  id="gbamandemen" name="gbamandemen"><?= $datakontrak[0]->gb_amandemen; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="durasikontrak">Perubahan Durasi</label>
                                    <input type="number" class="form-control" id="durasikontrak" name="durasikontrak"  placeholder="Durasi Kontrak" value="<?= $datakontrak[0]->revisi_durasi; ?>" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="satuandurasi">&nbsp;</label>
                                    <select class="form-control select2" id="satuandurasi" name="satuandurasi" required>
                                        <option value='1' <?= ($datakontrak[0]->satuan_durasi == 1 ? "selected" : ""); ?>>Hari</option>
                                        <option value='2' <?= ($datakontrak[0]->satuan_durasi == 2 ? "selected" : ""); ?>>Bulan</option>
                                        <option value='3' <?= ($datakontrak[0]->satuan_durasi == 3 ? "selected" : ""); ?>>Tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nilaikontrak">Perubahan Nilai Kontrak</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control angkauang" id="nilaikontrak" placeholder="Nilai Kontrak" name="nilaikontrak" value="<?= $datakontrak[0]->revisi_nilai; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="klausakontrak">Perubahan Klausa Kontrak</label>
                            <textarea class="form-control" rows="3" placeholder="Perubahan Klausa Kontrak"  id="klausakontrak" name="klausakontrak"><?= $datakontrak[0]->revisi_klausa; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dokumen">Dokumen Pendukung</label>
                            <input type="file" id="dokumen" name="dokumen" accept=".pdf">
                            <p class="help-block">Format: <b>.pdf</b></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="text-align:center">
                <a type="button" class="btn btn-default" href="<?= base_url("AmandemenKontrak"); ?>">BATAL</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-info">SIMPAN</button>
            </div>
            <!-- /.box-footer -->
        </form>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->