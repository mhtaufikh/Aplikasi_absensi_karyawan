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
                        <h4 class="page-title"> <i class="ti-star"></i> Data Tabel Izin</h4>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Dasboard</a></li>
                                <li class="breadcrumb-item active">Bagian</li>
                            </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
             <div class="row">
    
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                 <a href="index.php?page=add_izin">
                                <button type="button" class="btn btn-warning n-btn waves-effect waves-light w-lg m-b-5">
                                <i class="ti-plus"></i> Tambah Data</button></a><br><br>
                                    <table id="datatable" class="table table-bordered jrk">
                                        <thead>
                                        <tr>
                                            <th>Id izin</th>
                                            <th>Id Absensi</th>
                                            <th>NIP</th>
                                            <th>Keterangan</th>
                                            <th>Jam_izin</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           
                                        <?php
                                            $sql = query("SELECT * FROM tb_izin");
                                            while($data = fetch($sql)){
                                            echo'<tr>
                                                    <td>'.$data['Id_izin'].'</td>
                                                    <td>'.$data['Id_absensi'].'</td>
                                                    <td>'.$data['NIP'].'</td>
                                                    <td>'.$data['Keterangan'].'</td>
                                                    <td>'.$data['Jam_izin'].'</td>
                                                    <td>'.$data['Tanggal'].'</td>
                                                    <td align="center">
                                                    <a href="index.php?page=update_izin&id='.$data['Id_izin'].'">
                                                   <button type="button" class="btn btn-outline-primary s-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button></a>
                                                   <a href="../action.php?act=del_izin&id='.$data['Id_izin'].'" data-confirm="Apakah anda yakin ingin menghapus data '.$data['Id_izin'].' ?">
                                                   <button type="button" data-confirm="Del" class="btn btn-outline-danger s-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i class="fa fa-remove"></i></button>
                                                   </a>
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