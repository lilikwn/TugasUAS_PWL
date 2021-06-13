<?php 
    include 'controller/controller.php';
    $main = new Controller();
    
    if(isset($_GET['i'])){ //kondisi untuk mengakses halaman edit
		$main->ViewMobil();

    }else{
        $main->index();

    }


?>