<!-- Content -->
<style>
    input:invalid {
        border-color: red;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>FORM PENILAIAN RISALAH</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 style="color : black" class="mb-0">Penilaian Risalah</h5>
                    <!-- <small  style="color : black"class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <?php
                        // foreach ($sie as $row){
                        //     $nm_sie = $row->nm_sie;
                        //     $nm_kasie = $row->nm_kasie;
                        //     $dept_id = $row->dept_id;
                        //     $id_sie = $row->id_sie;
                        // }
                    ?>
                    <form action="<?php echo base_url('home/savePoint');?>" method="POST">
                        <!-- <input type="hidden" name="id_nilai" value="id_nilai"> -->
                        <!-- <input type="hidden" name="pekerjaan_id" value="<?php echo $id_pekerjaan;?>"> -->
                        <div class="row mb-3 mt-4">
                            <label style="color : black"class="col-sm-4 col-form-label" for="pekerjaan_id">Nama SGA</label>
                            <div class="col-sm-3">
                                <?php foreach($sga as $data){?>
                                    <input type="text" class="form-control" id="id_pekerjaan" name="nm_grup" value="<?= $data->nm_grup?>" readonly/>
                                    <input type="hidden" name="pekerjaan_id" value="<?= $data->id_pekerjaan;?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label style="color : black"class="col-sm-4 col-form-label" for="jml">Tanggal Penilaian</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="tgl_penilaian" name="tgl_penilaian"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label style="color : black"class="col-sm-4 col-form-label" for="namaJuri">Nama Juri</label>
                            <div class="col-sm-4">
                                <input type="text" name="nm_juri" class="form-control" value="<?= $this->session->userdata('username')?>" readonly/>
                                <!-- <select name="nm_dept" id="nm_dept" class="form-control">
                                    <option value="0">-PILIH-</option>
                                    <?php foreach($juri as $row):?>
                                        <option value="<?php echo $row['karyawan_id'];?>"><?php echo $row['nm_juri'];?></option>
                                    <?php endforeach;?>
                                </select>   -->
                            </div>
                        </div>
			    
			<!--POINT REPORT-->
                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Report 10%</h5>
                                    <h6>Sistematika Risalah dan Dokumentasi Team</h6>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead  style="color : black">
                                                <tr  style="color : black"> 
                                                    <th  style="color : black" style="color : black" for="metode_penyusunan_risalah"><b><u>Metode Penyusunan Risalah (Point : 1-4)</u></b> <br>
                                                        <p> Risalah disusun dengan runut sesuai dengan metode yang ada, <br>
                                                            dilengkapi dengan visualisasi yang jelas, <br>
                                                            tulisan mudah dibaca dan mudah dimengerti
                                                        </p>
                                                    </th>
                                                    <th  style="color : black" for="data_pendukung_aktivitas_grup"><b><u>Data Pendukung Aktivitas Grup (Point : 1-4)</u></b><br>
                                                        <p>
                                                            Team SGA memiliki data-data pendukung mengenai informasi <br>
                                                            dan aktivitas yang ditampilkan oleh team
                                                        </p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="metode-penyusunan"name="metode_penyusunan_risalah" min="1" max="4" required/></td>
                                                    <td>
                                                        <input type="number" class="form-control" id="data-pendukung" name="data_pendukung_aktivitas_grup" min="1" max="4" required/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bordered Table -->

                        </div>
			    
			<!-- POINT CONTENT -->
                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Content 70%</h5>
                                    <h6>Implementasi</h6>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead  style="color : black">
                                                <tr  style="color : black">
                                                    <th  style="color : black"><b><u>Identifikasi Masalah (Point : 1-4)</u></b><br>
                                                        <p>Adanya daftar seluruh potensi bahaya di area kerja team SGA</p>
                                                    </th>
                                                    <th  style="color : black"><b><u>Safety Mapping (Point : 1-4)</u></b><br>
                                                        <p>Team SGA melakukan mapping atau pemetaan <br> 
                                                            terhadap potensi bahaya yang dilakukan team</p>
                                                    </th>
                                                    <th  style="color : black"><b><u>4M+1E Analysis (Point : 1-4)</u></b><br>
                                                        <p>Hubungan antara akar masalah atau penyebab <br>
                                                            terhadap masalah yang dihadapi oleh team SGA
                                                        </p>
                                                    </th>
                                                    <th  style="color : black"><b><u>Rencana Perbaikan (Point : 1-4)</u></b><br>
                                                        <p>
                                                        Perencanaan perbaikan memiliki hubungan terhadap masalah <br>
                                                        yang terjadi dan ide-ide yang diajukan memiliki unsur kreatif
                                                        </p>
                                                    </th>
                                                    <th  style="color : black"><b><u>Laporan Perbaikan (Point : 1-4)</u></b><br>
                                                        <p>
                                                            Perbaikan tidak menimbulkan potensi <br>
                                                            bahaya lain dan memiliki unsur kreatif
                                                        </p>
                                                    </th>
                                                    <th  style="color : black"><b><u>Rank Down (Point : 1-4)</u></b><br>
                                                        <p>
                                                            Terjadi rank down atas potensi masalah
                                                        </p>
                                                    </th>
                                                    <th  style="color : black"><b><u>Justifikasi Atasan (Point : 1-4)</u></b><br>
                                                        <p>
                                                            Persetujuan dari atasan terhadap <br>
                                                            aktifitas yang telah dilakukan oleh team SGA
                                                        </p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="identifikasi-masalah" name="identifikasi_masalah" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="safety-mapping" name="safety_mapping" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="analysis" name="analysis" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="rencana-perbaikan" name="rencana_perbaikan" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="laporan-perbaikan" name="laporan_perbaikan" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="rank-down" name="rank_down" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="justifikasi-atasan" name="justifikasi_atasan" min="1" max="4" required/>
                                                    </td>  
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bordered Table -->

                        </div>
			    
			<!-- POINT PRESENTATION  -->
                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Presentasi 10%</h5>
                                    <h6>Presentasi</h6>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead  style="color : black">
                                                <tr  style="color : black">
                                                    <th  style="color : black"><b><u>Pemahaman Materi (Point : 1-4)</u></b><br>
                                                        <p>Penguasaan dan pemahaman seluruh anggota terhadap <br>
                                                            masalah yang ter-identifikasi hingga rank down tercapai
                                                        </p>
                                                    </th>
                                                    <th  style="color : black"><b><u>Sistematika (Point : 1-4)</u></b><br>
                                                        <p>Sistematika mulai dari identifikasi <br>
                                                            masalah hingga rank down tercapai
                                                        </p>
                                                    </th>
                                                    <th  style="color : black"><b><u>Cara Penyampaian (Point : 1-4)</u></b><br>
                                                        <p>Penyampaian presentasi mudah dimengerti</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="pemahaman-materi" name="pemahaman_materi" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="sistematika" name="sistematika" min="1" max="4" required/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="cara-penyampaian" name="cara_penyampaian" min="1" max="4" required/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bordered Table -->

                        </div>
			    
			<!-- POINT KETERANGAN  -->
                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Gulir SGA 10%</h5>
                                    <h6>Timing 7 Step</h6>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead  style="color : black">
                                                <tr  style="color : black">
                                                    <th  style="color : black"><b><u>Keterangan SGA 7 Step (Point : 1-4)</u></b><br>
                                                        <p>Harmonisasi antara aktivitas SGA dengan periode siklus <br>
                                                            dalam menggerakkan roda PDCA melalui 7 tahapan SGA
                                                        </p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="keterangan-sga-7-step" name="keterangan_sga_step_7" min="1" max="4" required/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bordered Table -->

                        </div>
                        <hr>
                        <div class="row mb-3 justify-content-end">
                            <label style="color : black"class="col-sm-2 col-form-label" for="total_score"><b>Total Point</b></label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="total-point" name="total_score"/>
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary">Save</button> || <button class="btn btn-warning"><a href="<?php echo base_url('home/Home_Juri');?>">Cancel</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<script src="<?php echo base_url('assets');?>/jquery/jquery.js"></script>
<script src="<?php echo base_url('assets');?>/bootstrap/js/bootstrap.min.js"></script>
<script>
    function hitungPoint(){
	let metode = $('#metode-penyusunan').val();
	let datapendukung = $('#data-pendukung').val();
        let identifikasi = $('#identifikasi-masalah').val();
	let safety = $('#safety-mapping').val();
        let analysis = $('#analysis').val();
        let rencana = $('#rencana-perbaikan').val();
	let laporan = $('#laporan-perbaikan').val();
        let rank = $('#rank-down').val();
	let ja = $('#justifikasi-atasan').val();
        let pemahaman = $('#pemahaman-materi').val();
        let sistematika = $('#sistematika').val();
	let penyampaian = $('#cara-penyampaian').val();
        let keterangan = $('#keterangan-sga-7-step').val();
	// let datapendukung = $('#data-pendukung').val();
	let total = parseInt(metode) + parseInt(datapendukung) + parseInt(identifikasi) + parseInt(safety) + parseInt(analysis) + parseInt(rencana) + parseInt(laporan) + parseInt(rank) + parseInt(ja) + parseInt(pemahaman) + parseInt(sistematika) + parseInt(penyampaian) + parseInt(keterangan);


        // <?php 
        //     $this->load->model('M_sga');
        //     $dataNilai = $this->M_sga->getNilai(); //ambil data nilai
        //     $data['nilaisga'] = $dataNilai;
        //     for ($i=1; $i<=$jumlah_baris; $i++) {
        //         foreach($dataNilai as $row){
        //             if($row->nm_juri == 'Juri ' .$i){
        //                 if($data['status_pekerjaan'] == 'Finish'  && $data['id_pekerjaan'] == $row->pekerjaan_id){
        //                     $angka += $row->total_score;
        //                 }else{
        //                 $angka = 0; 
        //                 }
        //             }
        //         }
        //     }

        //     var_dump($angka);die;
        // ?>

		//proses perhitungan
		$('#total-point').val(total);
	}

    //proses menjalankan fungsi perhitungan
	// $('#keterangan-sga-7-step').on('keyup', function(){
	// 	hitungPoint();
	// })

    // Proses menjalankan fungsi perhitungan saat nilai input berubah
    $('#metode-penyusunan, #data-pendukung, #identifikasi-masalah, #safety-mapping, #analysis, #rencana-perbaikan, #laporan-perbaikan, #rank-down, #justifikasi-atasan, #pemahaman-materi, #sistematika, #cara-penyampaian, #keterangan-sga-7-step').on('keyup', function() {
        hitungPoint();
    });

    //validation redbox input
    $('#metode-penyusunan, #data-pendukung, #identifikasi-masalah, #safety-mapping, #analysis, #rencana-perbaikan, #laporan-perbaikan, #rank-down, #justifikasi-atasan, #pemahaman-materi, #sistematika, #cara-penyampaian, #keterangan-sga-7-step').on('input', function() {
        hitungPoint();
    });
</script>
