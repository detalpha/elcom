<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Ubah</small>
        Kontrak
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kontrak</a></li>
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
        <form role="form" method="post" action="<?= base_url("Kontrak/update")?>" enctype="multipart/form-data">
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
                            <label for="nokontrak">Nomor Kontrak</label>
                            <input type="text" class="form-control" id="nokontrak" placeholder="Nomor Kontrak" name="nokontrak" value="<?= $datakontrak[0]->no_kontrak; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namakontrak">Nama Kontrak</label>
                            <input type="text" class="form-control" id="namakontrak" placeholder="Nama Kontrak" name="namakontrak" value="<?= (!empty(set_value('namakontrak')) ? set_value('namakontrak'): $datakontrak[0]->nama_kontrak); ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tglkontrak">Tanggal Kontrak</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right inputtgl" id="tglkontrak" name="tglkontrak"  placeholder="dd/mm/yyyy" value="<?= (!empty(set_value('tglkontrak')) ? set_value('tglkontrak'): date("d/m/Y", strtotime($datakontrak[0]->tgl_kontrak))); ?>" required>
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
                                        <input type="text" class="form-control pull-right inputtgl" id="tglmulai" name="tglmulai"  placeholder="dd/mm/yyyy" value="<?= (!empty(set_value('tglmulai')) ? set_value('tglmulai'): date("d/m/Y", strtotime($datakontrak[0]->tgl_mulai))); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="durasikontrak">Durasi Kontrak</label>
                                    <input type="number" class="form-control" id="durasikontrak" name="durasikontrak"  placeholder="Durasi Kontrak" value="<?= (!empty(set_value('durasikontrak')) ? set_value('durasikontrak'): $datakontrak[0]->duration); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="satuandurasi">&nbsp;</label>
                                    <select class="form-control select2" id="satuandurasi" name="satuandurasi" required>
                                        <option value='1' <?= ($datakontrak[0]->duration_unit == 1 ? "selected" : ""); ?> >Hari</option>
                                        <option value='2'<?= ($datakontrak[0]->duration_unit == 2 ? "selected" : ""); ?> >Bulan</option>
                                        <option value='3'<?= ($datakontrak[0]->duration_unit == 3 ? "selected" : ""); ?> >Tahun</option>
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
                                        <input type="text" class="form-control" id="matauang" placeholder="Mata Uang" name="matauang" value="<?= (!empty(set_value('matauang')) ? set_value('matauang'): $datakontrak[0]->mata_uang); ?>" maxlength="3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nilaikontrak">Nilai Kontrak</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control angkauang" id="nilaikontrak" placeholder="Nilai Kontrak" name="nilaikontrak" value="<?= (!empty(set_value('nilaikontrak')) ? set_value('nilaikontrak'): $datakontrak[0]->nilai_kontrak); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="masagaransi">Masa Garansi</label>
                                    <input type="number" class="form-control" id="masagaransi" name="masagaransi"  placeholder="Masa Garansi" value="<?= (!empty(set_value('masagaransi')) ? set_value('masagaransi'): $datakontrak[0]->masa_garansi); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="satuangaransi">&nbsp;</label>
                                    <select class="form-control select2" id="satuangaransi" name="satuangaransi" required>
                                        <option value='1' <?= ($datakontrak[0]->masa_garansi_unit == 1 ? "selected" : ""); ?>>Hari</option>
                                        <option value='2' <?= ($datakontrak[0]->masa_garansi_unit == 2 ? "selected" : ""); ?>>Bulan</option>
                                        <option value='3' <?= ($datakontrak[0]->masa_garansi_unit == 3 ? "selected" : ""); ?>>Tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomorbank">Nomor Bank Garansi</label>
                            <input type="text" class="form-control" id="nomorbank" placeholder="Nomor Bank Garansi" name="nomorbank" value="<?= (!empty(set_value('nomorbank')) ? set_value('nomorbank'): $datakontrak[0]->no_bg); ?>" >
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="matauangbg">Mata Uang</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="matauangbg" placeholder="Mata Uang" name="matauangbg" value="<?= (!empty(set_value('matauang')) ? set_value('matauang'): $datakontrak[0]->mata_uang); ?>" maxlength="3" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nilaibg">Nilai Bank Garansi</label>
                                    <input type="text" class="form-control angkauang" id="nilaibg" placeholder="Nilai Bank Garansi" name="nilaibg" value="<?= (!empty(set_value('nilaibg')) ? set_value('nilaibg'): $datakontrak[0]->nilai_bg); ?>" >
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
                                        <input type="text" class="form-control pull-right inputtgl" id="tglexpbg" name="tglexpbg" placeholder="dd/mm/yyyy" value="<?= (!empty(set_value('tglexpbg')) ? set_value('tglexpbg'): ($datakontrak[0]->tgl_exp_bg != "0000-00-00" ? date("d/m/Y", strtotime($datakontrak[0]->tgl_exp_bg)) : "")); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">BAPP</label>
                            <input type="file" id="bapp" name="bappfile" accept=".pdf">

                            <p class="help-block">Format: <b>pdf</b></p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">BAST 1</label>
                                    <input type="file" id="bast1" name="bast1file" accept=".pdf">

                                    <p class="help-block">Format: <b>pdf</b></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">BAST 2</label>
                                    <input type="file" id="bast2" name="bast2file" accept=".pdf">

                                    <p class="help-block">Format: <b>pdf</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="emailbox">
                            <label for="emailuser">Email User</label>

                            <?php

                                if(!empty($datakontrak[0]->email_user)){

                                    $arr_emailuser = explode(";", $datakontrak[0]->email_user);
                                    $no = 0;

                                    foreach($arr_emailuser as $email){

                                        
                                        if($no < 1){
                            ?>
                                <div class="input-group margin listemail">
                                    <input type="email" class="form-control" id="emailuser" placeholder="Masukan email user" name="emailuser[]" value="<?= $email; ?>" required>
                                    <span class="input-group-btn">
                                        <button type="button" id="addemail" class="btn btn-info"><i class="fa fa-plus-square"></i></button>
                                    </span>
                                </div>
                            <?php
                                        }else{
                            ?>
                                        <div id="emailke<?= $no; ?>" class="input-group margin listemail">
                                            <input type="email" class="form-control" placeholder="Masukan email user" name="emailuser[]" value="<?= $email; ?>" required>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info" onclick="removeemail(<?= $no; ?>)"><i class="fa fa-minus-circle"></i></button>
                                            </span>
                                        </div>
                            <?php
                                        }

                                        $no++;
                                    }
                                }else{
                            ?>
                                    <div class="input-group margin listemail">
                                        <input type="email" class="form-control" id="emailuser" placeholder="Masukan email user" name="emailuser[]" value="<?= $email; ?>" required>
                                        <span class="input-group-btn">
                                            <button type="button" id="addemail" class="btn btn-info"><i class="fa fa-plus-square"></i></button>
                                        </span>
                                    </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="text-align:center">
                <a type="button" class="btn btn-default" href="<?= base_url("Kontrak"); ?>">BATAL</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-info">SIMPAN</button>
            </div>
            <!-- /.box-footer -->
        </form>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->