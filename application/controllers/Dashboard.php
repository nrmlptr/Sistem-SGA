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

            $data['progressGrup'] = $this->M_sga->getGroupProgress();

            
            // var_dump($data['progress_grup']);die;

            // // Inisialisasi array kosong untuk data nm_grup dan status_pekerjaan
            // $nm_grup = array();
            // $status_pekerjaan = array();

            // // // Looping data sga untuk mengambil nilai nm_grup dan status_pekerjaan
            // foreach($data['progress_grup'] as $sga){
            //     $nm_grup[] = $sga['nm_grup'];
            //     $status_pekerjaan[] = $sga['status_pekerjaan'];
            // }

            // // // Konversi data nm_grup menjadi unik
            // $nm_grup = array_unique($nm_grup);

            // // // Inisialisasi array kosong untuk menyimpan data status_pekerjaan untuk setiap nm_grup
            // $data_status_pekerjaan = array();

            // // Looping nm_grup untuk mengambil data status_pekerjaan
            // foreach($nm_grup as $grup){
            //     // Inisialisasi array kosong untuk data status_pekerjaan pada setiap nm_grup
            //     $data_status_pekerjaan_grup = array();

            //     // Looping data sga untuk mencari status_pekerjaan yang terkait dengan nm_grup saat ini
            //     foreach($data['progress_grup'] as $sga){
            //         if($sga['nm_grup'] == $grup){
            //             $data_status_pekerjaan_grup[] = $sga['status_pekerjaan'];
            //         }
            //     }

            //     // Memasukkan data status_pekerjaan ke dalam array data_status_pekerjaan
            //     // $data_status_pekerjaan[] = array(
            //     //     'name' => $grup,
            //     //     'data' => $data_status_pekerjaan_grup
            //     // );
            //     $data_status_pekerjaan[$grup] = $data_status_pekerjaan_grup;
            // }
            

            // // Mengirim data ke view untuk ditampilkan di dalam grafik
            // // $data['nm_grup'] = json_encode($nm_grup);
            // // $data['data_status_pekerjaan'] = json_encode($data_status_pekerjaan);
            // $data['nm_grup'] = json_encode(array_values($nm_grup));
            // $data['data_status_pekerjaan'] = json_encode($data_status_pekerjaan);

            // var_dump($data_status_pekerjaan);die;
        
            // Memanggil view untuk menampilkan grafik
            $this->load->view('dashboard/v_dashboard');
            $this->load->view('dashboard/v_grafik',$data);
            $this->load->view('template/footer');

        }


        
    }
   
?>