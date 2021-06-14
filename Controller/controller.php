<?php 
    include_once 'model/modelMobil.php';
    include_once 'model/modelPelanggan.php';
    include_once 'model/modelTransaksi.php';

    class Controller{
        public $modelMobil;
        public $modelPelanggan;
        public $modelTransaksi;

        function __construct(){
			$this->modelMobil = new modelMobil();

        }
    
        function index(){
            include 'view/view_home.php';
        }
        
        function ViewMobil(){
            $data = $this->modelMobil->selectAllMobil();
            include 'view/view_mobil.php';
        }
        function ViewPesan(){
            include_once "view/view_pesan.php";
        }
    
    }
