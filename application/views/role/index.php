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
                                <th>Nama Role</th>
                                <th>Slug</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                            $no = 0;
                            foreach($listkontrak as $data) {
                                $no++;
                        ?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->slug; ?></td>
                                <td><?= $data->permissions; ?></td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url("Role/edit/".$data->id); ?>"><i class="fa fa-pencil-square-o"></i></a></li>
                                    <a href="#" onclick="Warn('<?= $data->name; ?>','<?= $data->id; ?>');"><i class="fa fa-trash-o "></i></a></li>
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