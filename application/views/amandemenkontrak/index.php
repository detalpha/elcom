<section class="content-header">
    <h1>
        <small>Data</small>
        Amandemen Kontrak
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Amandemen Kontrak</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Amanademen Kontrak</th>
                                <th>No. Kontrak</th>
                                <th>Tgl Kontrak</th>
                                <th>Garis Besar Amandemen</th>
                                <th>Perubahan Waktu</th>
                                <th>Perubahan Harga</th>
                                <th>Perubahan Klausa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                            $no = 0;
                            foreach($listdata as $data) {
                                $no++;
                        ?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data->no_amandemen; ?></td>
                                <td><?= $data->no_kontrak; ?></td>
                                <td><?= $data->tgl_kontrak; ?></td>
                                <td><?= $data->gb_amandemen; ?></td>
                                <td><?= $data->revisi_durasi." ".$data->name; ?></td>
                                <td><?= number_format($data->revisi_nilai,2,",","."); ?></td>
                                <td><?= $data->revisi_klausa; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>files/<?= $data->filename; ?>"><i class="fa fa-file-pdf-o"></i></a>&nbsp;&nbsp;&nbsp;
                                    <a href="<?= base_url("AmandemenKontrak/edit/".$data->id); ?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;&nbsp;
                                    <a href="#" onclick="Warn('<?= $data->no_amandemen; ?>','<?= $data->id; ?>');"><i class="fa fa-trash-o "></i></a>
                                </td>
                            </tr>

                        <?php
                            }
                        ?>
                            
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->