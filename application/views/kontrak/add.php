<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Tambah</small>
        Kontrak
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kontrak</a></li>
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
        <form role="form" method="post" action="<?= base_url("Kontrak/store")?>" enctype="multipart/form-data">
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
                            <label for="nomorkontrak">Nomor Kontrak</label>
                            <input type="text" class="form-control" id="nomorkontrak" placeholder="Nomor Kontrak" name="nokontrak" value="<?= set_value('nokontrak'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="namakontrak">Nama Kontrak</label>
                            <input type="text" class="form-control" id="namakontrak" placeholder="Nama Kontrak" name="namakontrak" value="<?= set_value('namakontrak'); ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tglkontrak">Tanggal Kontrak</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right inputtgl" id="tglkontrak" name="tglkontrak"  placeholder="dd/mm/yyyy" value="<?= set_value('tglkontrak'); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tglmulai">Tanggal Efektif</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right inputtgl" id="tglmulai" name="tglmulai"  placeholder="dd/mm/yyyy" value="<?= set_value('tglmulai'); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="durasikontrak">Durasi Kontrak</label>
                                    <input type="number" class="form-control" id="durasikontrak" name="durasikontrak"  placeholder="Durasi Kontrak" value="<?= set_value('durasikontrak'); ?>" required>
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
                                    <label for="tglselesai">Penyelesaian Pekerjaan</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="tglselesai" name="tglselesai" placeholder="dd/mm/yyyy" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="matauang">Mata Uang</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="matauang" placeholder="Mata Uang" name="matauang" value="<?= set_value('matauang'); ?>" maxlength="3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nilaikontrak">Nilai Kontrak</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control angkauang" id="nilaikontrak" placeholder="Nilai Kontrak" name="nilaikontrak" value="<?= set_value('nilaikontrak'); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="masagaransi">Masa Garansi</label>
                                    <input type="number" class="form-control" id="masagaransi" name="masagaransi"  placeholder="Masa Garansi" value="<?= set_value('masagaransi'); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="satuangaransi">&nbsp;</label>
                                    <select class="form-control select2" id="satuangaransi" name="satuangaransi" required>
                                        <option value='1'>Hari</option>
                                        <option value='2'>Bulan</option>
                                        <option value='3'>Tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomorbank">Nomor Bank Garansi</label>
                            <input type="text" class="form-control" id="nomorbank" placeholder="Nomor Bank Garansi" name="nomorbank" value="<?= set_value('nomorbank'); ?>">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="matauangbg">Mata Uang</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="matauangbg" placeholder="Mata Uang" name="matauangbg" value="<?= set_value('matauangbg'); ?>" maxlength="3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nilaibg">Nilai Bank Garansi</label>
                                    <input type="text" class="form-control angkauang" id="nilaibg" placeholder="Nilai Bank Garansi" name="nilaibg" value="<?= set_value('nilaibg'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tglexpbg">Masa Laku Bank Garansi</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right inputtgl" id="tglexpbg" name="tglexpbg" placeholder="dd/mm/yyyy" value="<?= set_value('tglexpbg'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">BAPP</label>
                            <input type="file" id="bapp" name="bappfile" accept=".pdf" required>

                            <p class="help-block">Format: <b>pdf</b></p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">BAST 1</label>
                                    <input type="file" id="bast1" name="bast1file" accept=".pdf" required>

                                    <p class="help-block">Format: <b>pdf</b></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">BAST 2</label>
                                    <input type="file" id="bast2" name="bast2file" accept=".pdf" required>

                                    <p class="help-block">Format: <b>pdf</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="emailbox">
                            <label for="emailuser">Email User</label>
                            <div class="input-group margin listemail">
                                <input type="email" class="form-control" id="emailuser" placeholder="Masukan email user" name="emailuser[]" required>
                                <span class="input-group-btn">
                                    <button type="button" id="addemail" class="btn btn-info"><i class="fa fa-plus-square"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="text-align:center">
                <a type="button" class="btn btn-default" href="<?= base_url("Kontrak"); ?>">CANCEL</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-info">SAVE</button>
            </div>
            <!-- /.box-footer -->
        </form>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->