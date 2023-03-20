<?php 
 
    class Home extends CI_Controller{
    
        function __construct(){
            parent::__construct();
        
            if($this->session->userdata('logged_in') == FALSE){
                redirect(base_url("login"));
            }
            $this->load->model("M_sga");
        }
    
        //buat metode untuk menampilkan data sga yang ada di database
        // public function index(){
        //     $this->load->model('M_sga'); //panggil model sga nya
        //     $data['list_sga'] =  $this->M_sga->getSGA(); //buat variabel data dengan array di dalamnya, dipakai ketika foreach di view


        //     $this->load->view('template/header');
        //     $this->load->view('home/v_home', $data);
        //     $this->load->view('template/footer');
        // }

        //==================================================================================================================================
        //BUAT METODE UNTUK TAMPILKAN HALAMAN AKSES ADMIN
        public function Home_Admin(){
            $this->load->model('M_sga'); //panggil model sga nya
            $data['list_sga'] =  $this->M_sga->getSGA(); //buat variabel data dengan array di dalamnya, dipakai ketika foreach di view


            $this->load->view('template/header');
            $this->load->view('home/v_home', $data);
            $this->load->view('template/footer');
        }

        public function viewScore(){
            $this->load->model('M_sga'); //panggil model sga nya
            $data['listGrup'] =  $this->M_sga->getPesertaSGA(); //panggil grup yg ikut serta dalam sga, dari tabel pekerjaan
            $jumlah_baris = $this->M_sga->count_rows(); //untuk mengambil berapa banyak data juri 
            $data['jumlah_baris'] = $jumlah_baris; 

            $dataScore = $this->M_sga->getTscore();
            $data['scoreT'] = $dataScore;

            // var_dump($dataScore);die;

            $this->load->view('template/header');
            $this->load->view('home/v_score', $data);
            $this->load->view('template/footer');
        }

        public function viewDoc()
        {
            $data['doc'] = $this->db->get('document'); //ambil tabel berkas dari db
            $this->load->view('template/header');
            $this->load->view('upload/v_showDoc', $data);
            $this->load->view('template/footer');
        }

        //metode untuk buka form upload dokumen
        function upDoc()
        {
            $this->load->model('M_sga');
            $x['kd_doc'] = $this->M_sga->buatKodeDoc(); //variabel untuk kode dokumen otomatis
            //  var_dump($x['kd_doc']);die; 

            $this->load->view('template/header');
            $this->load->view('upload/v_uploadDoc', $x);
            $this->load->view('template/footer');
        }

        //metode untuk proses upload dokumen ke sistem
        function prosesUploadDoc(){
            // var_dump($_POST);die;
            $config['upload_path']          = './documents/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls|pptx';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('berkas'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_uploadDoc', $error);
            }else{
                $data['tgl_upload'] = $this->input->post('tgl_upload');
                $data['kd_doc'] = $this->input->post('kd_doc');
                $data['nm_grup'] = $this->input->post('nm_grup');
                $data['nm_doc'] = $this->upload->data("file_name");
                $data['keterangan_doc'] = $this->input->post('keterangan_doc');
                $data['tipe_doc'] = $this->upload->data('file_ext');
                $data['ukuran_doc'] = $this->upload->data('file_size');
                $this->db->insert('document', $data);


                redirect('Home/viewDoc');
            }
        }

        //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
        function downloadDoc($id)
        { 
            $data = $this->db->get_where('document',['id_doc'=>$id])->row();

            force_download('documents/'.$data->nm_doc,NULL);
        }

        // function get_siebydept(){
        //     $dept_id = $this->input->post('dept_id',TRUE);
        //     $data = $this->M_sga->get_siebydept($dept_id)->result();
        //     echo json_encode($data);
        // }

        //buat metode untuk tampilkan form input data sga
        public function add_sga(){
            // $this->load->model("M_sga");
            $data['dataDept']=$this->M_sga->getDept()->result(); //<-untuk ambil data dept seluruhan di db

            // $data['dataDept'] = $this->M_sga->getDept();
            // $data['dataSie'] = $this->M_sga->getSie();
            // $data['dataGrup'] = $this->M_sga->getGrup();
            $this->load->view('template/header');
            $this->load->view('home/v_add_sga', $data); //<- diload di form add sga
            $this->load->view('template/footer');

        }

        //metode buat ambil data dari tabel sie berdasarkan id dept yang dipilih
        function get_subDept(){
            $id_dept = $this->input->post('id',TRUE);
            $data = $this->M_sga->get_sie_subDept($id_dept)->result();
            // $this->load->model("M_sga");
            // $id=$this->input->post('id_dept');
            // $data=$this->M_sga->get_sie_subDept($id)->result();
            echo json_encode($data);
        }

        //metode buat ambil data dari tabel grup berdasarkan id sie yang dipilih sebelumnya
        function get_subSie(){
            $id_sie = $this->input->post('id',TRUE);
            $data = $this->M_sga->get_grup_subSie($id_sie)->result();
            // $this->load->model("M_sga");
            // $id=$this->input->post('id_dept');
            // $data=$this->M_sga->get_sie_subDept($id)->result();
            echo json_encode($data);
        }

        //=================================================================================================================================

        //membuat metode untuk proses penyimpanan data sga
        public function proses_simpan(){
            $this->load->model('M_sga');
            $data = array(
                "tanggal" => $this->input->post("tanggal"),
                "dept_id" => $this->input->post("nm_dept"),
                "sie_id" => $this->input->post("nm_sie"),
                "grup_id" => $this->input->post("nm_grup"),
                "status" => $this->input->post("status")
            );

            $prosesSimpan = $this->M_sga->save_sga($data);
            if($prosesSimpan == 1){
                redirect('Home/Home_Admin');
            }else{
                redirect('Home/add_sga');
            }
        }


        //buat metode untuk tampilkan form perbarui data sga
        public function perbaruidataSGA(){
            // echo "Ini tempat perbarui data"; //<- buat ngetes buttonnya berfungsi atau engga
            
            $this->load->model("M_sga");
            $data['id_pekerjaan'] = $this->uri->segment(3);
            $st = $this->M_sga->getSGAById($data['id_pekerjaan']);
            foreach($st as $row){
                $data['id_pekerjaan'] = $row->id_pekerjaan;
            }
            // var_dump($data);die();  //<- CEK APAKAH DATA TERAMBIL ?

            //var_dump($st);die(); //<- CEK KEMBALI APAKAH DATA TERAMBIL ?
            // array(1) { [0]=> object(stdClass)#22 (5) { ["id_pekerjaan"]=> string(1) "1" ["dept_id"]=> string(1) "8" ["sie_id"]=> string(1) "1" ["grup_id"]=> string(1) "1" ["status"]=> string(7) "Tahap 1" } }
            

            $this->load->view('template/header');
            $this->load->view('home/v_edit_sga',$data);
            $this->load->view('template/footer');



            // $this->load->view('template/header');

            // $id_pekerjaan = $this->uri->segment(3);
            // $this->load->model("M_sga");
            // $data['sga'] = $this->M_sga->getSGAById($id_pekerjaan);

            // // var_dump($data['sga']);die(); //<-berguna untuk mengetahui data yang ingin dirubah keambil atau tidak
            // $this->load->view('home/v_edit_sga',$data);
            // $this->load->view('template/footer');
        }

        //membuat metode untuk menjalankan proses ketika memperbaharui data sga
        public function proses_edit(){
            // var_dump($_POST);die(); //<- UNTUK CEK APAKAH DATA UPDATE YANG SUDAH DIKIRIM DAPAT ATAU TIDAK
            // array(2) { ["id_pekerjaan"]=> string(0) "" ["status"]=> string(7) "Tahap 5" }
            $this->load->model("M_sga");
            $data = array(
                //kanan sesuai dengan database kiri sesuai dengan yang muncul di vardump
                'status' =>$this->input->post('status'),
            );

            $id = $this->input->post('id_pekerjaan');

            $this->M_sga->perbaruiSGA($data, $id);
        }

        // membuat metode untuk bisa menghapus data pekerjaan sga berdasarkan id_pekerjaannya
        public function hapusDataByIdSGA(){
            $id = $this->uri->segment(3);
            $this->load->model('M_sga');
            $this->M_sga->hapusDataByIdSGA($id);
        }

        //===================================================================================================================================================================

        //BUAT METOD TAMPILKAN DASHBOARD DATA DEPT
        public function show_dept(){

            $this->load->model('M_sga');
            $data['list_dept'] = $this->M_sga->getDept()->result();
            // var_dump($data);die;


            $this->load->view('template/header');
            $this->load->view('home/v_dept', $data);
            $this->load->view('template/footer');
        }

        //BUAT METOD TAMPILIN FORM TAMBAH DEPT
        public function add_dept(){
            $this->load->view('template/header');
            $this->load->view('home/v_add_dept');
            $this->load->view('template/footer');
        }

        //buat metode untuk proses simpan data dept
        public function proses_simpan_dept(){
            // var_dump($_POST);die();
            // array(2) { ["id_dept"]=> string(0) "" ["nm_dept"]=> string(14) "Tes input dept" }
           
            $data['id_dept'] = $this->input->post('id_dept');
            $data['nm_dept'] = $this->input->post('nm_dept');
    
    
            $this->load->model('M_sga');
            $this->M_sga->simpan_dept($data);
    
        }

        //buat metode untuk tampilin form perbarui data dept
        public function perbaruidataDept(){
            // echo "Ini tempat perbarui data";
            //buat ngetes buttonnya berfungsi atau engga
            $this->load->view('template/header');
            $this->load->model("M_sga");


            $id_dept = $this->uri->segment(3);
            $this->load->model("M_sga");
            $data['dept'] = $this->M_sga->getDeptbyId($id_dept);

            //var_dump($data['dept']);die();  //<- CEK DATA DI DB TERAMBIL TIDAK?
            // array(1) { [0]=> object(stdClass)#22 (2) { ["id_dept"]=> string(2) "13" ["nm_dept"]=> string(19) "TES INPUT DATA DEPT" } }


            $this->load->view('home/v_edit_dept',$data);
            $this->load->view('template/footer');
        }

        //buat metode proses simpan ketika perbarui data dept
        public function proses_edit_dept(){
            //  var_dump($_POST);die();
            //  array(2) { ["nm_dept"]=> string(13) "tes edit dept" ["id_dept"]=> string(2) "13" }
            
            $data['nm_dept'] = $this->input->post('nm_dept');
            $data['id_dept'] = $this->input->post('id_dept');

            $this->load->model('M_sga');
            $this->M_sga->proses_perbaruiddept($data);
        }

        // membuat metode untuk bisa menghapus data dept secara id
        public function hapusDataByIdDept(){
            $id = $this->uri->segment(3);
            $this->load->model('M_sga');
            $this->M_sga->deltByIdDept($id);
        }

        //======================================================================================================================================================================

        //buat metode untuk tampilkan dashboard sie
        public function show_sie(){

            $this->load->model('M_sga');
            $data['list_sie'] = $this->M_sga->getSeksie();
            // var_dump($data);die; //<- untuk cek apakah data sudah terambil?


            $this->load->view('template/header');
            $this->load->view('home/v_sie', $data);
            $this->load->view('template/footer');
        }

        //BUAT METOD TAMPILIN FORM TAMBAH data sie
        public function add_sie(){
            $this->load->model("M_sga");

            $data['dataDept'] = $this->M_sga->getDept()->result();
            $this->load->view('template/header');
            $this->load->view('home/v_add_sie', $data);
            $this->load->view('template/footer');
        }

        //buat metode untuk proses simpan inputan tambah data sie
        public function proses_simpan_sie(){
            $this->load->model('M_sga');
            $data = array(
                "id_sie" => $this->input->post("id_sie"),
                "nm_sie" => $this->input->post("nm_sie"),
                "nm_kasie" => $this->input->post("nm_kasie"),
                "dept_id" => $this->input->post("nm_dept")
            );

            // var_dump($data);die; //<- cek data yg diinput berhasil terkirim ga?
            // array(4) { ["id_sie"]=> string(0) "" ["nm_sie"]=> string(13) "TES INPUT SIE" ["nm_kasie"]=> string(9) "siapa aja" ["dept_id"]=> string(1) "8" }
           
            $prosesSimpanSie = $this->M_sga->save_sie($data);
            if($prosesSimpanSie == 1){
                redirect('Home/show_sie');
            }else{
                redirect('Home/add_sie');
            }
        }

        //buat metode tampilkan form perbarui data sie
        public function perbaruidataSie(){
            $this->load->model('M_sga');

            $data['id_sie'] = $this->uri->segment(3);
            // var_dump($data);die();
            // array(4) { ["id_sie"]=> string(2) "18" ["nm_sie"]=> string(13) "TES INPUT SIE" ["nm_kasie"]=> string(9) "siapa aja" ["dept_id"]=> string(1) "8" }
            $sie = $this->M_sga->getSieById($data['id_sie']);
            // var_dump($sie);die();
            // array(1) { [0]=> object(stdClass)#22 (4) { ["id_sie"]=> string(2) "18" ["nm_sie"]=> string(13) "TES INPUT SIE" ["nm_kasie"]=> string(9) "siapa aja" ["dept_id"]=> string(1) "8" } }
            
            foreach($sie as $row){
                $data['id_sie'] = $row->id_sie;
                $data['nm_sie'] = $row->nm_sie;
                $data['nm_kasie'] = $row->nm_kasie;
                $data['dept_id'] = $row->dept_id;
            }
            
    
            $data['dept'] = $this->M_sga->getDept()->result();

            $this->load->view('template/header');
            $this->load->view('home/v_edit_sie', $data);
            $this->load->view('template/footer');
        }

        //membuat metode untuk menjalankan proses ketika memperbaharui data sie
        public function proses_edit_sie(){
            // var_dump($_POST);die();
            // array(4) { ["id_sie"]=> string(0) "" ["nm_sie"]=> string(18) "TES INPUT SIE EDIT" ["nm_kasie"]=> string(19) "siapa aja mah gatau" ["dept_id"]=> string(1) "3" }

            $data = array(
                //kanan sesuai dengan database kiri sesuai dengan yang muncul di vardump
                'id_sie' =>$this->input->post('id_sie'),
                'nm_sie' =>$this->input->post('nm_sie'),
                'nm_kasie' =>$this->input->post('nm_kasie'),
                'dept_id' =>$this->input->post('namaDept')
            );
    
            $id = $this->input->post('id_sie');
            
            // var_dump($data);die();
            // array(4) { ["id_sie"]=> string(0) "" ["nm_sie"]=> string(19) "TES INPUT SIECSADAS" ["nm_kasie"]=> string(9) "siapa aja" ["dept_id"]=> string(1) "4" }
            $this->load->model("M_sga");

            $this->M_sga->proses_perbaruisie($data);
        }

        //buat metode untuk lakukan hapus datasie by id
        public function hapusDataByIdSie(){
            $id = $this->uri->segment(3);
            $this->load->model('M_sga');
            $this->M_sga->deltByIdSie($id);
        }

        //=====================================================================================================================================================================

        //buat metode untuk tampilkan dashboard grups
        public function show_grup(){

            $this->load->model('M_sga');
            $data['list_grup'] = $this->M_sga->getGroup();
            // var_dump($data);die; //<- untuk cek apakah data sudah terambil?


            $this->load->view('template/header');
            $this->load->view('home/v_grup', $data);
            $this->load->view('template/footer');
        }

        //BUAT METOD TAMPILIN FORM TAMBAH GRUP
        public function add_grup(){
            $this->load->model("M_sga");

            $data['dataSie'] = $this->M_sga->getSie();
            $this->load->view('template/header');
            $this->load->view('home/v_add_grup', $data);
            $this->load->view('template/footer');
        }

        //BUAT METODE UNTUK PROSES SIMPAN INPUTAN BARU DATA GRUP
        public function proses_simpan_grup(){
            $this->load->model('M_sga');
            $data = array(
                "id_grup" => $this->input->post("id_grup"),
                "nm_grup" => $this->input->post("nm_grup"),
                "nm_kagrup" => $this->input->post("nm_kagrup"),
                "no_hp" => $this->input->post("no_hp"),
                "jml" => $this->input->post("jml"),
                "sie_id" => $this->input->post("nm_sie")
            );

            // var_dump($data);die; //<- cek data yg diinput berhasil terkirim ga?
            // array(5) { ["id_grup"]=> string(0) "" ["nm_grup"]=> string(7) "TESGRUP" ["nm_kagrup"]=> string(5) "GATAU" ["no_hp"]=> string(5) "21321" ["sie_id"]=> string(1) "3" }
           
            $prosesSimpanGrup = $this->M_sga->save_grup($data);
            if($prosesSimpanGrup == 1){
                redirect('Home/show_grup');
            }else{
                redirect('Home/add_grup');
            }
        }

        //buat metode untuk tampilin form perbarui data grup
        public function perbaruidataGrup(){
            $this->load->model('M_sga');

            $data['id_grup'] = $this->uri->segment(3);
            //  var_dump($data);die();
            $grup = $this->M_sga->getGrupById($data['id_grup']);
            // var_dump($grup);die();
            // array(1) { [0]=> object(stdClass)#22 (6) { ["id_grup"]=> string(2) "18" ["nm_grup"]=> string(7) "TESGRUP" ["nm_kagrup"]=> string(5) "GATAU" ["no_hp"]=> string(5) "21321" ["jml"]=> string(0) "" ["sie_id"]=> string(1) "3" } }
            
            foreach($grup as $row){
                $data['id_grup'] = $row->id_grup;
                $data['nm_grup'] = $row->nm_grup;
                $data['nm_kagrup'] = $row->nm_kagrup;
                $data['no_hp'] = $row->no_hp;
                $data['jml'] = $row->jml;
                $data['sie_id'] = $row->sie_id;
            }
            
    
            $data['sie'] = $this->M_sga->getSie();

            $this->load->view('template/header');
            $this->load->view('home/v_edit_grup', $data);
            $this->load->view('template/footer');
        }

        //membuat metode untuk menjalankan proses ketika memperbaharui data grup
        public function proses_edit_grup(){
            // var_dump($_POST);die();
            // array(6) { ["id_grup"]=> string(2) "19" ["nm_grup"]=> string(13) "TES LAGI GRUP" ["nm_kagrup"]=> string(7) "awwwwww" ["no_hp"]=> string(8) "08909090" ["jml"]=> string(2) "10" ["namaSie"]=> string(2) "17" }
            $data = array(
                //kanan sesuai dengan database kiri sesuai dengan yang muncul di vardump
                'id_grup' =>$this->input->post('id_grup'),
                'nm_grup' =>$this->input->post('nm_grup'),
                'nm_kagrup' =>$this->input->post('nm_kagrup'),
                'no_hp' =>$this->input->post('no_hp'),
                'jml' =>$this->input->post('jml'),
                'sie_id' =>$this->input->post('namaSie')
            );
    
            $id = $this->input->post('id_grup');
            
            // var_dump($data);die();
           
            $this->load->model("M_sga");

            $this->M_sga->proses_perbaruigrup($data);
        }

        //buat metode untuk menghapus data grup buy id
        public function hapusDataByIdGrup(){
            $id = $this->uri->segment(3);
            $this->load->model('M_sga');
            $this->M_sga->deltByIdGrup($id);
        }

        //======================================================================================================================================================================

        //BUAT METODE UNTUK SHOW HALAMAN AKSES JURI
        public function Home_Juri(){
            $this->load->model('M_sga'); //panggil model sga nya
            $data['listGrup'] =  $this->M_sga->getPesertaSGA(); //panggil grup yg ikut serta dalam sga, dari tabel pekerjaan
            $jumlah_baris = $this->M_sga->count_rows(); //untuk mengambil berapa banyak data juri 
            $data['jumlah_baris'] = $jumlah_baris; 

            $dataScore = $this->M_sga->getTscore();
            $data['scoreT'] = $dataScore;

            // var_dump($dataScore);die;

            $this->load->view('template/header');
            $this->load->view('juri/v_home', $data);
            $this->load->view('template/footer');
        }

        //metode untuk masuk kehalaman penilaian juri form risalah
        public function addScore($id_pekerjaan){
            // echo "ini tempat untuk kasih nilai";
            $this->load->model('M_sga');

            $data['sga'] = $this->M_sga->getNamaSGAById($id_pekerjaan);

            $this->load->view('template/header');
            $this->load->view('juri/v_addScore', $data);
            $this->load->view('template/footer');

        }

        public function savePoint(){
            $this->load->model('M_sga');
            $data = array(
                // "id_nilai" => $this->input->post("id_nilai"),
                "pekerjaan_id" => $this->input->post("pekerjaan_id"),
                "tgl_penilaian" => $this->input->post("tgl_penilaian"),
                "nm_juri" => $this->input->post("nm_juri"),
                "metode_penyusunan_risalah" => $this->input->post("metode_penyusunan_risalah"),
                "data_pendukung_aktivitas_grup" => $this->input->post("data_pendukung_aktivitas_grup"),
                "identifikasi_masalah" => $this->input->post("identifikasi_masalah"),
                "safety_mapping" => $this->input->post("safety_mapping"),
                "analysis" => $this->input->post("analysis"),
                "rencana_perbaikan" => $this->input->post("rencana_perbaikan"),
                "laporan_perbaikan" => $this->input->post("laporan_perbaikan"),
                "rank_down" => $this->input->post("rank_down"),
                "justifikasi_atasan" => $this->input->post("justifikasi_atasan"),
                "pemahaman_materi" => $this->input->post("pemahaman_materi"),
                "sistematika" => $this->input->post("sistematika"),
                "cara_penyampaian" => $this->input->post("cara_penyampaian"),
                "keterangan_sga_step_7" => $this->input->post("keterangan_sga_step_7"),
                "total_score" => $this->input->post("total_score")                                
            );

            // var_dump($data);die; //<- cek data yg diinput berhasil terkirim ga?
            // array(5) { ["id_grup"]=> string(0) "" ["nm_grup"]=> string(7) "TESGRUP" ["nm_kagrup"]=> string(5) "GATAU" ["no_hp"]=> string(5) "21321" ["sie_id"]=> string(1) "3" }
           
            $loadsavePoint = $this->M_sga->pointSave($data);
            if($loadsavePoint == 1){
                redirect('Home/Home_Juri');
            }else{
                redirect('Home/addScore');
            } 
        }
    }

?>