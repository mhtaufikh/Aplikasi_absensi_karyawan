<?php session_start();
include'koneksi.php';
include'func/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Absensi Harian</title>
  <link href='we.jpg' rel='shortcut icon' type='image/x-icon'/>
<link rel='stylesheet prefetch' href='assets/css/icons.css'>
<link rel="stylesheet" href="assets/css/styleindex.css">

  
</head>

<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
  <div class="container">

  <header>
    <h2><a href="#"><i class="fa fa-email"></i> </a></h2>
    <nav>
      <ul>
        <li>
          <a href="#" title="Tours">Profile</a>
        </li>
        <li>
          <a class="btn" href="login.php" title="Log In">Sign In</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="cover">

<?php
$page = isset($_GET['page']) ? $_GET['page'] : null;
  switch($page){
  default:
  echo'
    <h1><marquee>POS INDONESIA</marquee></h1>
    <form  class="flex-form" action="action.php?act=absen" method="POST">
      <label for="from">
        <i class="fa fa-search"></i>
      </label>
      <input type="search" placeholder="Nomor Induk Pegawai" name="nip">
      <input type="submit" value="Cari"></form><br>';
      if(!empty($_SESSION['pesan'])){ 
        echo '<span class="error-nip">'.$_SESSION['pesan'].'</span>';
       }unset($_SESSION['pesan']);
  break;

  case'profile':
  $data  = selectUpdate('tb_pegawai','NIP = "'.$nip.'"');
  $b     = selectUpdate('tb_bagian','Id_bagian = "'.$data['Id_bagian'].'"');
  $absen = selectUpdate('tb_absensi','NIP = "'.$nip.'"');
  echo'
  <img class="foto-pegawai" src="data:image/png;base64,' . $data['Foto'] . '">
  <h2 class="nama-pegawai">Selamat Datang! '.$data['Nama_pegawai'].'  ('.$b['Nama_bagian'].')</h2>
  <div class="box-abses">';

  if ($absen['Jam_masuk'] == "00:00:00") {
    echo'<a class="btn-new" href="action.php?act=add_masuk&nip='.$nip.'" title="Log In">Absen Masuk</a>      
          <a class="disable-btn " href="#">Mengajukan Ijin</a>
          <a class="disable-btn" href="#">Absen Keluar</a>';
  }else{
    echo'
      <a class="disable-btn" href="#">Absen Masuk</a>      
      <a class="btn-new" href="index.php?page=izin&nip='.$nip.'">Mengajukan Ijin</a>
      <a class="btn-new" href="action.php?act=add_keluar&nip='.$nip.'" >Absen Keluar</a>';
  }
     
  echo'</div>';

  break;

  case'izin':
      $data  = selectUpdate('tb_pegawai','NIP = "'.$nip.'"');
      $b     = selectUpdate('tb_bagian','Id_bagian = "'.$data['Id_bagian'].'"');
      $absen = selectUpdate('tb_absensi','NIP = "'.$nip.'"');
      echo'
      <form action="action.php?act=add_izin" method="POST">
      <div align="center">
      <img class="foto-pegawai" src="data:image/png;base64,' . $data['Foto'] . '">
      
      <div class="box-abses">
          <input type="hidden" value="'.$nip.'" name="nip">
          <textarea name="keterangan" class="ket-izin" placeholder="Alasan Izin"></textarea>
          <br>
          <button type="submit" class="btn-s">Simpan</button>
      </div></div>
      </form>';

  break;
  }
 ?> 

    <div id="madeby">
      <div class="jam"> 
        <span class="tanggal">
          <?php  print date('d F Y'); ?>
        </span>  
        <br>
        <span id="clock">
        </span>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript"> 

window.setTimeout(function() {
    $(".alert").slideDown(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
  }, 4000);
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat object date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        // var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm);
    }
</script>
  
</body>
</html>
