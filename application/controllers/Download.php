<?php
    class Download extends CI_Controller{

        //metode untuk download file pdf ke 1
        public function index()
        {
            //load sistemnya
            $this->load->helper('download');

            //load view
            $this->load->view('dashboard/v_dashboard');


            $data = file_get_contents(base_url().'assets/pdf/buku_panduan_sga.pdf');
            $name = "f_buku_panduan_sga.pdf";

            force_download($name, $data);
        }

        //metode untuk download file pdf ke 2
        public function form_daftar()
        {
            //load sistemnya
            $this->load->helper('download');

            //load view
            $this->load->view('dashboard/v_dashboard');


            $data = file_get_contents(base_url().'assets/pdf/form_pendaftaran.pdf');
            $name = "f_pendaftaran.pdf";

            force_download($name, $data);
        }

        //metode untuk download file pdf ke 3
        public function template_sga()
        {
            //load sistemnya
            $this->load->helper('download');

            //load view
            $this->load->view('dashboard/v_dashboard');


            $data = file_get_contents(base_url().'assets/pdf/template_sga.pdf');
            $name = "f_template_sga.pdf";

            force_download($name, $data);
        }


        //metode untuk download file pdf ke 4
        public function s_of_rr()
        {
            //load sistemnya
            $this->load->helper('download');

            //load view
            $this->load->view('dashboard/v_dashboard');


            $data = file_get_contents(base_url().'assets/pdf/standard_of_risk_rank.pdf');
            $name = "f_standard_of_risk_rank.pdf";

            force_download($name, $data);
        } 

        //metode untuk download file pdf ke 5
        public function s_sel_tool()
        {
            //load sistemnya
            $this->load->helper('download');

            //load view
            $this->load->view('dashboard/v_dashboard');


            $data = file_get_contents(base_url().'assets/pdf/sga_selamat_tooling.pdf');
            $name = "f_sga_selamat_tooling.pdf";

            force_download($name, $data);
        } 

        //metode untuk download file pdf ke 6
        public function s_jaksel_rev()
        {
            //load sistemnya
            $this->load->helper('download');

            //load view
            $this->load->view('dashboard/v_dashboard');


            $data = file_get_contents(base_url().'assets/pdf/sga_jaksel_rev1.pdf');
            $name = "f_sga_jaksel_rev1.pdf";

            force_download($name, $data);
        } 
    }

?>