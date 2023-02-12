<?php 


date_default_timezone_set('Asia/Jakarta');

function anti_injection($data)
{
    $filter = mysqli_real_escape_string(koneksi(), stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    return $filter;
}

function koneksi() {
    return mysqli_connect("localhost", "root", "", "db_pos");
}

function query($query) {
    return mysqli_query(koneksi(), $query);
}

function logout() {
   session_destroy();
   echo'<script languange="javascript">
          document.location="index.php";
          </script>';
}

function select($table){
  return query("SELECT * FROM $table");
}

function selectUpdate($tables,$where)
{
  $sql = query("SELECT * FROM $tables WHERE $where");
  return fetch($sql);
}

function fetch($query)
{
    return mysqli_fetch_assoc($query);
}

function fetchAll($tables)
{
  $sql = query("SELECT * FROM $tables");
  return fetch($sql);
}

function numrows($datanya) {
  return mysqli_num_rows($datanya);
}

function AutoCode($kolom,$tables,$inc){
    $data=fetch(query("SELECT MAX($kolom) AS id_max from $tables"));
    $s=$data['id_max'];
    $no_urut=(int) substr($s, 5, 4);
    $no_urut++;
    return $inc . sprintf("%03s", $no_urut);
}

function insert($table, $data, $on)
{
    $query = "INSERT INTO $table VALUES($data)";
    if (query($query)) {
       $_SESSION['pesan']=
       '<div class="alert alert-success berhasil">
          <strong><i class="ti-check"></i> Berhasil !</strong> data berhasil di simpan !
        </div>';
        header('location:dashboard/index.php?page='.$on.''); 
    } else {
       $_SESSION['pesan']=
       '<div class="alert alert-denger">
          <strong>Gagal!</strong> Data gagal di simpan !
        </div>';
        header('location:dashboard/index.php?page=add_'.$on.''); 
    }
}

function hapus($table, $where = null, $on) {
   $where = (isset($where) && !empty($where)) ? ' WHERE ' . $where : null;
   $query = query("DELETE FROM $table $where");
    if ($query) {
         $_SESSION['pesan']=
         '<div class="alert alert-success berhasil">
            <strong><i class="ti-check"></i> Berhasil !</strong> Data berhasil di dihapus !
          </div>';
          header('location:dashboard/index.php?page='.$on.''); 
      } else {
         $_SESSION['pesan']=
         '<div class="alert alert-success gagal">
            <strong>Gagal!</strong> Data gagal di hapus !
          </div>';
          header('location:dashboard/index.php?page='.$on.''); 
      }
}

function ubah($sql,$on,$where)
{
  $query = $sql;
  if ($query) {
         $_SESSION['pesan']=
         '<div class="alert alert-success berhasil">
            <strong><i class="ti-check"></i> Berhasil !</strong> Data berhasil di ubah !
          </div>';
          header('location:dashboard/index.php?page='.$on.''); 
      } else {
         $_SESSION['pesan']=
         '<div class="alert alert-success gagal">
            <strong>Gagal!</strong> Data gagal di ubah !
          </div>';
          header('location:dashboard/index.php?page='.$on.'&'.$where.''); 
      }
}

function encode($img) {
  $data = base64_encode(file_get_contents($img));
  return $data;
} 

function base64($data) {
  return base64_encode($data);
}

function exten($path) {
  $extensi = pathinfo($path, PATHINFO_EXTENSION);
  return $extensi;
} 

function alertsimpan($simpan) {
  if($simpan){
    echo'<script languange="javascript"> 
       alert("Data Berhasil Disimpan");
       history.go(-2);
    </script>';
   }else{
    echo'<script> 
       alert("Data Gagal Di Simpan");
       history.go(-1);
    </script>';
  }
}

function alertupdate($update) {
  if($update){
    echo'<script languange="javascript"> 
       alert("Data Berhasil Di Ubah");
       history.go(-2);
    </script>';
   }else{
    echo'<script> 
       alert("Data Gagal Di Ubah");
       history.go(-1);
    </script>';
  }
}

foreach ($_POST as $key => $value) { 
  $$key = anti_injection($value); 
}

foreach ($_GET as $key => $value) { 
  $$key = $value; 
}


$nama_bulan   = array('','January','February','Maret','April','Mei','Juni','Juli','Agustus','September',' Oktober','November','Desember');

// Variable Global
 //Alert        

//lainnya  
   

$tglnow = date ("Y-m-d"); 
$tglindo = date("d-m-Y");
$tglsekarang  = date ("Y-m-d");

// $gambar       = $_FILES['gambar']['tmp_name'];

// $extensi      = $_FILES['gambar']['name'];

$notformat    = ' <script languange="javascript"> alert("Format Tidak Didukung!");
                   history.go(-1);
                  </script>';


?>