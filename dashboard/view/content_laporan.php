 <?php
    if(!empty($_SESSION['pesan'])){ 
      echo $_SESSION['pesan'] ;
     }unset($_SESSION['pesan']);
    ?>
<div class="content-page">
    <!-- Start content -->

    <div class="content">
        <div class="container-fluid">
                        <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title"> <i class="ti-files"></i> Laporan Database Absensi</h4>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Dasboard</a></li>
                                <li class="breadcrumb-item active">Absensi</li>
                            </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
             <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Id Absensi</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>NIP</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql = query("SELECT * FROM tb_absensi");
                                            while($data = fetch($sql)){
                                            echo'<tr>
                                                    <td>'.$data['Id_absensi'].'</td>
                                                    <td>'.$data['Hari'].'</td>
                                                    <td>'.$data['Tanggal'].'</td>
                                                    <td>'.$data['NIP'].'</td>
                                                    <td>'.$data['Jam_masuk'].'</td>
                                                    <td>'.$data['Jam_Pulang'].'</td>
                                                    <td>'.$data['Status'].'</td>
                                                </tr>';
                                                }
                                                ?>
                                
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                            
                        </div> <!-- end row -->
            
        </div>
                    <!-- end container -->
    </div>
                <!-- end content -->
</div>