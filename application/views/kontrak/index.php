<section class="content-header">
    <h1>
        <small>Data</small>
        Kontrak
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kontrak</li>
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
                                <th>No. Kontrak</th>
                                <th>Nama Pekerjaan</th>
                                <th>Tgl Kontrak</th>
                                <th>Nilai Kontrak</th>
                                <th>Penyelesaian Pekerjaan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                            $no = 0;
                            foreach($listkontrak as $data) {
                                $no++;

                                $selisih_hari = $data->selisih_hari;
                                $status = '';

                                if ($selisih_hari > 30){
                                    $status = 'On Progress';
                                }

                                
                                if ($selisih_hari <= 30){
                                    $status = 'Expiring';
                                }

                                
                                if ($selisih_hari <= 0){
                                    $status = 'Expired';
                                }
                        ?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data->no_kontrak; ?></td>
                                <td><?= $data->nama_kontrak; ?></td>
                                <td><?= $data->tgl_kontrak; ?></td>
                                <td><?= number_format($data->nilai_kontrak,2,",","."); ?></td>
                                <td><?= $data->tgl_akhir; ?></td>
                                <td><?= $status; ?></td>
                                <!-- <td><a href="<?= base_url(); ?>files/<?= $data->bapp_file; ?>"><i class="fa fa-file-pdf-o"></i></a></li></td>
                                <td><a href="<?= base_url(); ?>files/<?= $data->bast_file_1; ?>"><i class="fa fa-file-pdf-o"></i></a></li></td>
                                <td><a href="<?= base_url(); ?>files/<?= $data->bast_file_2; ?>"><i class="fa fa-file-pdf-o"></i></a></li></td> -->
                                <td>
                                    <a href="<?= base_url("Kontrak/edit/".$data->id); ?>"><i class="fa fa-pencil-square-o"></i></a></li>
                                    <a href="#" onclick="Warn('<?= $data->no_kontrak; ?>','<?= $data->id; ?>');"><i class="fa fa-trash-o "></i></a></li>
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