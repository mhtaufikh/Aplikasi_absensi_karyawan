  <?php
    if(!empty($_SESSION['pesan'])){ 
      echo $_SESSION['pesan'] ;
     }unset($_SESSION['pesan']);
    ?>
<?php $data = selectUpdate('tb_pegawai','NIP = "'.$id.'"');?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Update Data Pegawai <?php echo"$id";?></h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="index.php?page=pegawai">Pegawai</a></li>
                                        <li class="breadcrumb-item active">Update Data</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Form Update</b></h4>
                                    <form class="form-horizontal" enctype="multipart/form-data" action="../action.php?act=update_pegawai" method="POST">
                                    <div class="row">
                                  
                                        <div class="col-8">
                                            <div class="p-20">
                                                        
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">NIP</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="nip" value="<?php echo $id;?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Nama Pegawai</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $data['Nama_pegawai'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Bagian</label>
                                                        <div class="col-9">
                                                            <select class="form-control" name="bagian" required>
                                                             <option selected disabled>--Pilih Bagian--</option>
                                                                 <?php
                                                             $sql = query("SELECT * FROM tb_bagian");
                                                             while($d = fetch($sql)){
                                                                if($data['Id_bagian'] == $d['Id_bagian']){
                                                                    echo' <option value="'.$d['Id_bagian'].'" selected>
                                                                    '.$d['Nama_bagian'].'</option>';
                                                                }else{   
                                                                    echo' <option value="'.$d['Id_bagian'].'">
                                                                    '.$d['Nama_bagian'].'</option>';
                                                                }
                                                               }?>   
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Gender</label>
                                                        <div class="col-9">
                                                           <select class="form-control" name="jk" required>
                                                                <?php
                                                                    if ($data['Jenis_kelamin'] == "L") {
                                                                       echo'<option value="L" selected>Laki - Laki</option>
                                                                             <option value="P">Perempuan</option>';
                                                                    }else{
                                                                        echo'<option value="L">Laki - Laki</option>
                                                                             <option value="P" selected>Perempuan</option>';
                                                                    }
                                                                ?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-9">
                                                            <input type="date" value="<?php echo $data['Tanggal_lahir']?>" class="form-control" name="tgl_lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Tanggal Bergabung</label>
                                                        <div class="col-9">
                                                            <input type="date" value="<?php echo $data['Tanggal_bergabung']?>" class="form-control" name="tgl_gabung" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Agama</label>
                                                        <div class="col-9">
                                                           <select class="form-control" name="agama" required>
                                                           <?php
                                                            if ($data['Agama'] == "Islam") {
                                                                echo'
                                                                <option value="Islam" selected>Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Yang Lainnya">Yang lainnya</option>';
                                                            }elseif ($data['Agama'] == "Kristen") {
                                                                echo'
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen" selected>Kristen</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Yang Lainnya">Yang lainnya</option>';
                                                            }elseif ($data['Agama'] == "Hindu") {
                                                                echo'
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Hindu" selected>Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Yang Lainnya">Yang lainnya</option>';
                                                            }elseif ($data['Agama'] == "Budha") {
                                                                echo'
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha" selected>Budha</option>
                                                                <option value="Yang Lainnya">Yang lainnya</option>';
                                                            }else {
                                                                echo'
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Yang Lainnya" selected>Yang lainnya</option>';
                                                            }


                                                           ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">No Telepon</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="no_tlp" 
                                                            value="<?php echo $data['No_tlp'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Status</label>
                                                        <div class="col-9">
                                                            <select class="form-control" name="status" required>
                                                            <?php
                                                               if ($data['Status'] == "Menikah") {
                                                                echo'<option value="Menikah" selected>Menikah</option>
                                                                <option value="Lajang">Lajang</option>';
                                                                }else{
                                                                echo'<option value="Menikah">Menikah</option>
                                                                <option value="Lajang" selected>Lajang</option>';
                                                                }
                                                            ?>  
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Alamat</label>
                                                        <div class="col-9">
                                                            <textarea class="form-control" name="alamat" placeholder="Alamat Pegawai" required><?php echo $data['Alamat'];?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label"></label>
                                                        <div class="col-9">
                                                           <button type="submit" class="btn btn-success btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-pencil"></i> Update</button>
                                                           <button type="reset" class="btn btn-danger btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-close"></i> Batal</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- END COL  -->
                                          <div class="col-4">
                                            <div align="center" class="col-12">
                                                 <img id="output"/ src="<?php echo'data:image/png;base64,'.$data['Foto'].'';?>" class="preview-img">
                                                 <h5 class="prev-foto">*Priview Foto Pegawai</h4>
                                                 <input type="file" accept="image/*" class="form-control" name="foto" onchange="loadFile(event)">
                                            </div>
                                               
                                        </div>
                                        
                                    </div>
                                    </form>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
            </div>

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>