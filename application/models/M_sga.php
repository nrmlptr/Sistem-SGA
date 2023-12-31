<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_sga extends CI_Model{

        //buat metode untuk mengambil data monitoring tahap pekerjaan tiap dept dari db
        //jangan lupa join karena diambil dari beberpa tabel
        public function getSGA(){
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml');
            $this->db->from('pekerjaan');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            return $this->db->get()->result_array();
        }


        // metode untuk cek progress sga
        public function getGroupProgress() {
            $this->db->select('pekerjaan.status as status_pekerjaan, tb_grup.nm_grup');
            $this->db->from('pekerjaan');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            $this->db->group_by('tb_grup.nm_grup, pekerjaan.status');
            return $this->db->get()->result_array();
        }      

        //buat metode by id data sga yg nantinya berfungsi untuk mengambil data berdasarkan id ketika mau di edit atau di hapus
        public function getSGAById($id_pekerjaan){
            $query = $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id_pekerjaan));
            return $query->result();
        }

        //=====================================================================================================================================================================

        //buat metode query untuk ambil data dept seluruhan
        function getDept(){
            $query = $this->db->get('tb_dept');
            return $query;
            // return $query->result();
            // $hasil=$this->db->query("SELECT * FROM tb_dept");
            // return $hasil;
        }

        //berfungsi untuk select semua data sie berdasarkan id dept yg dipilih sebelumnya
        function get_sie_subDept($id_dept){
            // $hasil=$this->db->query("SELECT * FROM tb_sie WHERE dept_id='$id'");
            // return $hasil->result();
            $query = $this->db->get_where('tb_sie', array('dept_id' => $id_dept));
            return $query;
        }

        //berfungsi untuk select semua data grup berdasarkan id sie yg dipilih sebelumnya
        function get_grup_subSie($id_sie){
            // $hasil=$this->db->query("SELECT * FROM tb_sie WHERE dept_id='$id'");
            // return $hasil->result();
            $query = $this->db->get_where('tb_grup', array('sie_id' => $id_sie));
            return $query;
        }


        //buat metode untuk get data dept by id
        public function getDeptById($id_dept){
            $query = $this->db->get_where('tb_dept', array('id_dept' => $id_dept));
            return $query->result();
        }
     
       
        //=====================================================================================================================================================================

        //buat metode untuk query get data sie seluruhan
        function getSie(){
            $query = $this->db->get('tb_sie');
            return $query->result();
        }

        //buat metode untuk query get data sie dengan join tabel dept
        public function getSeksie(){
            $this->db->select('tb_sie.*, tb_sie.nm_sie as nama_seksie, tb_dept.nm_dept');
            $this->db->from('tb_sie');
            $this->db->join('tb_dept','tb_dept.id_dept = tb_sie.dept_id');
            return $this->db->get()->result_array();
        }
        
        //buat metode untuk query get data sie by id
        public function getSieById($id_sie){
            $query = $this->db->get_where('tb_sie', array('id_sie' => $id_sie));
            return $query->result();
        }

        //=====================================================================================================================================================================

        //buat metode query untuk get data grup menyeluruh
        function getGrup(){
            $query = $this->db->get('tb_grup');
            return $query->result();
        }

        //buat metode untuk get grup join dengan tabel sie
        public function getGroup(){
            $this->db->select('tb_grup.*, tb_grup.nm_grup as nama_grup, tb_sie.nm_sie');
            $this->db->from('tb_grup');
            $this->db->join('tb_sie','tb_sie.id_sie = tb_grup.sie_id');
            return $this->db->get()->result_array();
        }
        
        //buat metode query untuk get data grup by id
        public function getGrupById($id_grup){
            $query = $this->db->get_where('tb_grup', array('id_grup' => $id_grup));
            return $query->result();
        }

        //============================================================ CRUD DATA SGA =========================================================================================================

        //membuat metode model untuk menyimpan data sga 
        function save_sga($data){
            $proses = $this->db->insert('pekerjaan', $data);
            if($proses){
                return 1;
            }else{
                return 0;
            }
        }

        //buat metode query untuk simpan ubah data sga
        public function perbaruiSGA($data,$id){
            $this->db->where('id_pekerjaan', $id);
            $query = $this->db->update('pekerjaan', $data);
            if($query){
                redirect('home/Home_Admin');
                // echo 'Data berhasil Diperbarui';
            }else{
                // echo 'Data gagal diperbarui';
                redirect('home/perbaruidataSGA');
            }
        }

        //buat metode query untuk apus data sga by id
        public function hapusDataByIdSGA($id){
            $this->db->delete('pekerjaan', array('id_pekerjaan' => $id));
            redirect('home/Home_Admin');
        }

        //======================================================================== dept =============================================================================================
        //buat model untuk simpan data dept
        public function simpan_dept($data){
            $data = array(
                'id_dept' => $data['id_dept'],
                'nm_dept' => $data['nm_dept']
            );
    
            $run = $this->db->insert('tb_dept', $data);
            if($run){
                redirect('Home/show_dept');
            }else{
                echo("Gagal Simpan");
            }
        }

        //metode model buat simpan ubah data dept
        public function proses_perbaruiddept($data){
            $data = array(
                'nm_dept' => $data['nm_dept'],
                'id_dept' => $data['id_dept']
            );

            $this->db->where('id_dept', $data['id_dept']);
            $run = $this->db->update('tb_dept', $data);

            if($run){
                redirect('Home/show_dept');
            }else{
                echo"(Gagal Ubah Data)";
            }
        }

        //metode untuk apus data dept by id
        public function deltByIdDept($id){
            $this->db->delete('tb_dept', array('id_dept' => $id));
            redirect('home/show_dept');
        }

        //==================================================================================== seksi =======================================================

        //membuat metode model untuk menyimpan data seksie
        public function save_sie($data){
            $proses = $this->db->insert('tb_sie', $data);
            if($proses){
                return 1;
            }else{
                return 0;
            }
        }

        //buat metode model untuk simpan ubah data sie
        public function proses_perbaruisie($data){
            $this->db->where('id_sie', $data['id_sie']);
            $query = $this->db->update('tb_sie', $data);
            if($query){
                redirect('home/show_sie');
                // echo 'Data berhasil Diperbarui';
            }else{
                // echo 'Data gagal diperbarui';
                redirect('home/perbaruidataSie');
            }
        }

        //metode untuk apus data sie by id
        public function deltByIdSie($id){
            $this->db->delete('tb_sie', array('id_sie' => $id));
            redirect('home/show_sie');
        }

        //=================================================================== grup ===================================================================

        //membuat metode model untuk menyimpan data grup 
        public function save_grup($data){
            $proses = $this->db->insert('tb_grup', $data);
            if($proses){
                return 1;
            }else{
                return 0;
            }
        }

        //buat metode model untuk simpan ubah data grup
        public function proses_perbaruigrup($data){
            $this->db->where('id_grup', $data['id_grup']);
            $query = $this->db->update('tb_grup', $data);
            if($query){
                redirect('home/show_grup');
                // echo 'Data berhasil Diperbarui';
            }else{
                // echo 'Data gagal diperbarui';
                redirect('home/perbaruidataGrup');
            }
        }

        //metode untuk apus data grup by id
        public function deltByIdGrup($id){
            $this->db->delete('tb_grup', array('id_grup' => $id));
            redirect('home/show_grup');
        }

        //============================================================= juri =======================================================================
        //buat metode untuk ditampilkan pada saat form input score oleh tiap juri
        public function getNamaSGAById($id_pekerjaan){
            // $this->db->select('nilai_risalah.*, tgl_penilaian as tanggal, pekerjaan.status, tb_grup.nm_grup');
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml');
            
            // // $this->db->from('pekerjaan');
            // $this->db->join('pekerjaan', 'pekerjaan.id_pekerjaan = nilai_risalah.pekerjaan_id');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            $query = $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id_pekerjaan));
            return $query->result();
        }

        //metode untuk tampilkan data peserta sga yang ada pada home juri
        public function getPesertaSGA(){
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, pekerjaan.id_pekerjaan,pekerjaan.tanggal,tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml');
            $this->db->from('pekerjaan');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            return $this->db->get()->result_array();
        }

        //metode get nilai pada view home untuk juri
        public function getNilai(){
            $this->db->select('*');
            $this->db->from('nilai_risalah');
            $query = $this->db->get();
            return $query->result();
        }

        // public function getNilaiByJuri($id_pekerjaan, $nama_juri) {
        //     $this->db->select('*');
        //     $this->db->from('nilai_risalah');
        //     $this->db->where('pekerjaan_id', $id_pekerjaan);
        //     $this->db->where('nm_juri', $nama_juri);
        //     $query = $this->db->get();
        //     return $query->num_rows();
        // }

        public function getNilaiByJuri($id_pekerjaan, $nama_juri) {
            $this->db->select('*');
            $this->db->from('nilai_risalah');
            $this->db->where('pekerjaan_id', $id_pekerjaan);
            $this->db->where('nm_juri', $nama_juri);
            $query = $this->db->get();
            return $query->result_array(); // mengembalikan hasil dalam bentuk array asosiatif
        }

        public function getDataNilai($pekerjaan_id, $username_juri) {
            $this->db->select('*');
            $this->db->from('nilai_risalah');
            $this->db->where('nilai_risalah.pekerjaan_id', $pekerjaan_id);
            $this->db->where('nilai_risalah.nm_juri', $username_juri);
            $query = $this->db->get();
            return $query->result();
        }
        

        //metode untuk ambil nilai total score ditampilkan pada home juri i
        public function getTscore(){
            $this->db->select('total_score');
            $this->db->from('nilai_risalah');
            $query = $this->db->get();
            return $query->result();
        }

        //metode untuk menghitung ada berapa juri yang terdaftar di tabel users, untuk meloop kolom pada dashboard juri
        public function count_rows() {
            $this->db->select('username');
            $this->db->where('akses', 2); //untuk mengambil data juri 
            $query = $this->db->get('users'); 
            
            return $query->num_rows();
        }

        //metode untuk buat kode otomatis for berkas presentasi peserta 
        public function buatKodeDoc(){
            $this->db->select('RIGHT(document.kd_doc,5) as kd_doc', FALSE);
            $this->db->order_by('kd_doc','DESC');    
            $this->db->limit(1);    
            $query = $this->db->get('document');
                if($query->num_rows() <> 0){      
                    $data = $query->row();
                    $kode = intval($data->kd_doc) + 1; 
                }
                else{      
                    $kode = 1;  
                }
            $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
            $kodetampil = "DOC-PPT-".$batas;
            return $kodetampil;  
        }

        //metode untuk simpan point yang diberi tiap juri
        public function pointSave($data){
            $proses = $this->db->insert('nilai_risalah', $data);
            if($proses){
                return 1;
            }else{
                return 0;
            }
        }
        
        //metode untuk get juri yang sudah kasih nilai atau belum, supaya kondisi button muncul atau tidak
        public function getDataJuri($id_pekerjaan, $nama_juri) {
            return $this->db->get_where('nilai_risalah', array('pekerjaan_id' => $id_pekerjaan, 'nm_juri' => $nama_juri))->num_rows();
        }


        //buat metode model untuk simpan ubah data nilai yang sudah di input juri oleh role admin
        public function prosesUpdateScore($data){
            $this->db->where('id_nilai', $data['id_nilai']);
            $query = $this->db->update('nilai_risalah', $data);
            if($query){
                redirect('home/viewScore');
                // echo 'Data berhasil Diperbarui';
            }else{
                // echo 'Data gagal diperbarui';
                redirect('home/ResponDetailInput');
            }
        }
    }

?>