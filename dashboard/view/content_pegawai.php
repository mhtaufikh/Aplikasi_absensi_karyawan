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
                        <h4 class="page-title"> <i class="ti-star"></i> Data Tabel Pegawai</h4>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Dasboard</a></li>
                                <li class="breadcrumb-item active">Pegawai</li>
                            </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
             <div class="row">
    
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                 <a href="index.php?page=add_pegawai">
                                <button type="button" class="btn btn-warning n-btn waves-effect waves-light w-lg m-b-5">
                                <i class="ti-plus"></i> Tambah Data</button></a><br><br>
                                    <table id="datatable" class="table table-bordered jrk">
                                        <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>JK</th>
                                            <th>Tgl Lahir</th>
                                            <th>No Tlp</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql = query("SELECT * FROM tb_pegawai,tb_bagian WHERE tb_pegawai.id_bagian = tb_bagian.id_bagian ");
                                            while($data = fetch($sql)){
                                            echo'<tr>
                                                    <td>'.$data['NIP'].'</td>
                                                    <td>'.$data['Nama_pegawai'].'</td>
                                                    <td>'.$data['Nama_bagian'].'</td>
                                                    <td>'.$data['Jenis_kelamin'].'</td>
                                                    <td>'.$data['Tanggal_lahir'].'</td>
                                                    <td>'.$data['No_tlp'].'</td>
                                                    <td><img class="view-mini" src="data:image/png;base64,' . $data['Foto'] . '"></td>
                                                    <td align="center">
                                                    <a href="index.php?page=update_pegawai&id='.$data['NIP'].'">
                                                   <button type="button" class="btn btn-outline-primary s-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button></a>
                                                   <a href="../action.php?act=del_pegawai&id='.$data['NIP'].'" data-confirm="Apakah anda yakin ingin menghapus data '.$data['NIP'].' ?">
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