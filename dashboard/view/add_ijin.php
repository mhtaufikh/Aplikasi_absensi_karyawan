

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah Data Pengajuan Izin</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="index.php?page=bagian">Pengajuan Izin</a></li>
                                        <li class="breadcrumb-item active">Tambah Data</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Form Input</b></h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                            <form class="form-horizontal" action="../action.php?act=add_pengajuan_izin" method="POST">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">NIP</label>
                                                        <div class="col-10">
                                                             <select class="form-control select2" name="id_absensi">
                                                             <!-- <option value="" selected disabled>-- Pilih NIP --</option> -->
                                                             
                                                                 <?php
                                                             $sql = query("SELECT * FROM tb_absensi,tb_pegawai where tb_absensi.NIP = tb_pegawai.NIP AND Tanggal = curdate() AND tb_pegawai.NIP != '01' AND tb_absensi.Status='' ");
                                                             while($data = fetch($sql)){
                                                                echo' <option value="'.$data['Id_absensi'].'"">
                                                                '.$data['NIP'].' - '.$data['Nama_pegawai'].'</option>';
                                                               }?>   
                                                                

                                                             </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Keterangan</label>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="keterangan" placeholder="Keterangan" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label"></label>
                                                        <div class="col-10">
                                                           <button type="submit" class="btn btn-success btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-plus"></i> Simpan</button>
                                                           <button type="reset" class="btn btn-danger btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-close"></i> Batal</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
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