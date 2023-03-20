<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class M_Excel extends CI_Model {
        //kenapa dibuat query join, ya karena data yang ditampilkan itu merupakan data
        //hasil joinan dari tabel master, tabel pekerjaan itu 
        //fungsinya hanya memanggil id data master saja.
        public function view_by_date($date){
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml');
            $this->db->from('pekerjaan');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            $this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya
                
            return $this->db->get()->result();// Tampilkan data sga sesuai tanggal yang diinput oleh user pada filter
        }
            
        public function view_by_month($month, $year){
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml');
            $this->db->from('pekerjaan');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            $this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
            $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
            
            return $this->db->get()->result(); // Tampilkan data sga sesuai bulan dan tahun yang diinput oleh user pada filter
        }
            
        public function view_by_year($year){
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml');
            $this->db->from('pekerjaan');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
            
            return $this->db->get()->result();// Tampilkan data sga sesuai tahun yang diinput oleh user pada filter
        }
            
        public function view_all(){
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml');
            $this->db->from('pekerjaan');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            return $this->db->get()->result(); // Tampilkan semua data sga
        }
        
        public function option_tahun(){
            $this->db->select('pekerjaan.*, pekerjaan.status as status_pekerjaan, tb_dept.nm_dept,tb_sie.nm_sie,tb_sie.nm_kasie,tb_grup.nm_grup,tb_grup.nm_kagrup,tb_grup.no_hp,tb_grup.jml,YEAR(tanggal) AS tahun');
            $this->db->from('pekerjaan');
            $this->db->join('tb_dept','tb_dept.id_dept = pekerjaan.dept_id');
            $this->db->join('tb_sie','tb_sie.id_sie = pekerjaan.sie_id');
            $this->db->join('tb_grup','tb_grup.id_grup = pekerjaan.grup_id');
            $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
            $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl
            
            return $this->db->get()->result(); // Ambil data pada tabel pekerjaan sesuai kondisi diatas
        }
    }
?>