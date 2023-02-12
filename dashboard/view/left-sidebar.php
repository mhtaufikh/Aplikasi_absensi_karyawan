<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
              <li class="menu-title">Main</li>
                <?php
                    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $sql = query("SELECT * FROM tb_mainmenu");
                    while($data=fetch($sql)){
                        if ($data['Link'] == $actual_link) {
                            echo'<li class="active">
                             <a href="'.$data['Link'].'" class="waves-effect waves-primary">
                             <i class="'.$data['Icon'].'"></i><span>'.$data['Nama_menu'].'</span></a>
                             </li>';
                        }else{
                            echo'<li>
                             <a href="'.$data['Link'].'" class="waves-effect waves-primary">
                             <i class="'.$data['Icon'].'"></i><span>'.$data['Nama_menu'].'</span></a>
                             </li>';
                        }
                    }?>
            </ul>
        <div class="clearfix"></div>
        </div>
     <div class="clearfix"></div>
   </div>
</div>