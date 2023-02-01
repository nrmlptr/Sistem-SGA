<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {
        public function __construct() {
            parent::__construct();

            $this->load->helper('download');
            $this->load->model('M_sga');
        }

        //metode untuk menampilkan Dashboard Umum Utama Ketika User mengakses website dan tidak perlu login 
        //ketika masuk dashboard utama, user bisa mendownload berkas sga yang tertera di dalam sidebar
        public function index() {
            $data['list_sga'] = $this->M_sga->getSGA();

            
            $this->load->view('dashboard/v_dashboard');
            $this->load->view('dashboard/v_grafik',$data);
            $this->load->view('template/footer');

        }
        
    }
   
?>