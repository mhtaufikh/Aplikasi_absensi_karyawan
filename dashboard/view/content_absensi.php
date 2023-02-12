
<div class="content-page">
    <!-- Start content -->

    <div class="content">
        <div class="container-fluid">

                        <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title"> <i class="ti-star"></i> Data Tabel Absensi</h4>
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
                                <a href="../action.php?act=add_absensi">
                                <?php
                                $status = "";
                                    $sql = query("SELECT *FROM tb_absensi");
                                    while($d = fetch($sql)) {
                                        if ($d['Tanggal'] == $tglnow) {
                                            $status = "disabled";
                                            break;
                                        }else{
                                            $status = " ";
                                        }
                                    }
                                ?>
                                <button type="button" class="btn btn-warning n-btn waves-effect waves-light w-lg m-b-5" <?php echo $status;?>>
                                <i class="ti-plus"></i> Buat Absen Tanggal <?php echo"$tglindo";?></button>
                                </a><br><br>
                                    <table id="datatable" class="table table-bordered jrk">
                                        <thead>
                                        <tr>
                                            <th>Id Absensi</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>NIP</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql = query("SELECT * FROM tb_absensi WHERE Tanggal = '$tglnow' AND NIP !='01'");
                                            while($data = fetch($sql)){
                                            echo'<tr>
                                                    <td>'.$data['Id_absensi'].'</td>
                                                    <td>'.$data['Hari'].'</td>
                                                    <td>'.$data['Tanggal'].'</td>
                                                    <td>'.$data['NIP'].'</td>
                                                    <td>'.$data['Jam_masuk'].'</td>
                                                    <td>'.$data['Jam_Pulang'].'</td>
                                                    <td>'.$data['Status'].'</td>
                                                    <td align="center">
                                                    <a href="../action.php?act=update_absensi&id='.$data['Id_absensi'].'">
                                                   <button type="button" class="btn btn-outline-danger s-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update"> <i class="fa fa-remove"></i> </button></a>
                                                    </td>
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