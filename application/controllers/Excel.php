<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Excel extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Excel');
        }

        //metode untuk tampilkan data secara view 
        public function index(){
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filter yang dipilih user
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = $_GET['tanggal'];
                    $label = 'Data SGA PT Century Batteries Indonesia - Tanggal '.date('d-m-y', strtotime($tgl));
                    $url_export = 'excel/export?filter=1&tanggal='.$tgl;
                    $pekerjaan = $this->M_Excel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Model Excel
                }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    $label = 'Data SGA PT Century Batteries Indonesia - Bulan '.$nama_bulan[$bulan].' '.$tahun;
                    $url_export = 'excel/export?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                    $pekerjaan = $this->M_Excel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Model Excel
                }else{ // Jika filter nya 3 (per tahun)
                    $tahun = $_GET['tahun'];
                    $label = 'Data SGA PT Century Batteries Indonesia - Tahun '.$tahun;
                    $url_export = 'excel/export?filter=3&tahun='.$tahun;
                    $pekerjaan = $this->M_Excel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Model Excel
                }
            }else{ // Jika user tidak mengklik tombol tampilkan
                $label = 'Semua Data SGA PT Century Batteries Indonesia';
                $url_export = 'excel/export';
                $pekerjaan = $this->M_Excel->view_all(); // Panggil fungsi view_all yang ada di Model Excel
            }
            $data['label'] = $label;
            $data['url_export'] = base_url('index.php/'.$url_export);
            $data['pekerjaan'] = $pekerjaan;
            $data['option_tahun'] = $this->M_Excel->option_tahun();
            $this->load->view('excel/v_excels', $data);
        }


        //metode yang berfungsi untuk ekspor data menjadi excel
        public function export(){
            // Load plugin PHPExcel nya
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();
            // Settingan awal file excel
            $excel->getProperties()->setCreator('EHS Dept')
                ->setLastModifiedBy('EHS Dept')
                ->setTitle("Data SGA")
                ->setSubject("SGA")
                ->setDescription("Laporan Semua Data SGA")
                ->setKeywords("Data SGA");
            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
            );
            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
            );
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filter yang dipilih user
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = $_GET['tanggal'];
                    $label = 'Data SGA PT Century Batteries Indonesia - Tanggal '.date('d-m-y', strtotime($tgl));
                    $pekerjaan = $this->M_Excel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Model Excel
                }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    $label = 'Data SGA PT Century Batteries Indonesia - Bulan '.$nama_bulan[$bulan].' '.$tahun;
                    $pekerjaan = $this->M_Excel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Model Excel
                }else{ // Jika filter nya 3 (per tahun)
                    $tahun = $_GET['tahun'];
                    $label = 'Data SGA PT Century Batteries Indonesia - Tahun '.$tahun;
                    $pekerjaan = $this->M_Excel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Model Excel
                }
            }else{ // Jika user tidak mengklik tombol tampilkan
                $label = 'Semua Data SGA PT Century Batteries Indonesia';
                $pekerjaan = $this->M_Excel->view_all(); // Panggil fungsi view_all yang ada di Model Excel
            }
            $excel->setActiveSheetIndex(0);
            $excel->getActiveSheet()->setCellValue('A1', "DATA SGA - PT Century Batteries Indonesia"); // Set kolom A1 dengan tulisan "DATA SGA - PT Century Batteries Indonesia"
            $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->setCellValue('A2', $label); // Set kolom A2 sesuai dengan yang pada variabel $label
            $excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A2 sampai E2
            // Buat header tabel nya pada baris ke 4
            $excel->getActiveSheet()->setCellValue('A4', "Tanggal"); // Set kolom A4 dengan tulisan "Tanggal"
            $excel->getActiveSheet()->setCellValue('B4', "Nama Department"); // Set kolom B4 dengan tulisan "Nama Department"
            $excel->getActiveSheet()->setCellValue('C4', "Nama Seksi"); // Set kolom C4 dengan tulisan "Nama Seksi"
            $excel->getActiveSheet()->setCellValue('D4', "Kepala Seksi"); // Set kolom D4 dengan tulisan "Kepala Seksi"
            $excel->getActiveSheet()->setCellValue('E4', "Nama Group"); // Set kolom E4 dengan tulisan "Nama Group"
            $excel->getActiveSheet()->setCellValue('F4', "Leader Group"); // Set kolom F4 dengan tulisan "Leader Group"
            $excel->getActiveSheet()->setCellValue('G4', "No HP"); // Set kolom G4 dengan tulisan "No HP"
            $excel->getActiveSheet()->setCellValue('H4', "Jumlah Anggota"); // Set kolom H4 dengan tulisan "Jumlah Anggota"
            $excel->getActiveSheet()->setCellValue('I4', "Status"); // Set kolom I4 dengan tulisan "Status"
            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
            // Set height baris ke 1, 2, 3 dan 4
            $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
            $excel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5
            foreach($pekerjaan as $data){ // Lakukan looping pada variabel pekerjaan
                $tgl = date('d-m-Y', strtotime($data->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy
                $excel->getActiveSheet()->setCellValue('A'.$numrow, $tgl);
                $excel->getActiveSheet()->setCellValue('B'.$numrow, $data->nm_dept);
                $excel->getActiveSheet()->setCellValue('C'.$numrow, $data->nm_sie);
                $excel->getActiveSheet()->setCellValue('D'.$numrow, $data->nm_kasie);
                $excel->getActiveSheet()->setCellValue('E'.$numrow, $data->nm_grup);
                $excel->getActiveSheet()->setCellValue('F'.$numrow, $data->nm_kagrup);
                $excel->getActiveSheet()->setCellValue('G'.$numrow, $data->no_hp);
                $excel->getActiveSheet()->setCellValue('H'.$numrow, $data->jml);
                $excel->getActiveSheet()->setCellValue('I'.$numrow, $data->status_pekerjaan);
                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }
            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(18); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F
            $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom G
            $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom H
            $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom I
            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            // Set judul file excel nya
            $excel->getActiveSheet()->setTitle("Laporan Data SGA");
            $excel->getActiveSheet();
            // Proses file excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data SGA PT Century Batteries Indonesia.xls"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
        }
    }
?>