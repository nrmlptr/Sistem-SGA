<!-- Content -->

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
                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Report 10%</h5>
                                    <small  style="color : black"class="col-sm-3">Sistematika Risalah dan Dokumentasi Team</small>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <th  style="color : black"ead>
                                                <tr  style="color : black">
                                                    <th  style="color : black" style="color : black" for="metode_penyusunan_risalah">Metode Penyusunan Risalah (Point : 1-4)</th>
                                                    <th  style="color : black" for="data_pendukung_aktivitas_grup">Data Pendukung Aktivitas Grup (Point : 1-4)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="metode-penyusunan"name="metode_penyusunan_risalah"/></td>
                                                    <td>
                                                        <input type="number" class="form-control" id="data-pendukung" name="data_pendukung_aktivitas_grup"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bordered Table -->

                        </div>
                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Content 70%</h5>
                                    <small  style="color : black"class="col-sm-3">Implementasi</small>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <th  style="color : black"ead>
                                                <tr  style="color : black">
                                                    <th  style="color : black">Identifikasi Masalah (Point : 1-4)</th>
                                                    <th  style="color : black">Safety Mapping (Point : 1-4)</th>
                                                    <th  style="color : black">4M+1E Analysis (Point : 1-4)</th>
                                                    <th  style="color : black">Rencana Perbaikan (Point : 1-4)</th>
                                                    <th  style="color : black">Laporan Perbaikan (Point : 1-4)</th>
                                                    <th  style="color : black">Rank Down (Point : 1-4)</th>
                                                    <th  style="color : black">Justifikasi Atasan (Point : 1-4)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="identifikasi-masalah" name="identifikasi_masalah"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="safety-mapping" name="safety_mapping"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="analysis" name="analysis"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="rencana-perbaikan" name="rencana_perbaikan"/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="laporan-perbaikan" name="laporan_perbaikan"/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="rank-down" name="rank_down"/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="justifikasi-atasan" name="justifikasi_atasan"/>
                                                    </td>  
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bordered Table -->

                        </div>

                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Presentasi 10%</h5>
                                    <small  style="color : black"class="col-sm-3">Presentasi</small>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <th  style="color : black"ead>
                                                <tr  style="color : black">
                                                    <th  style="color : black">Pemahaman Materi (Point : 1-4)</th>
                                                    <th  style="color : black">Sistematika (Point : 1-4)</th>
                                                    <th  style="color : black">Cara Penyampaian (Point : 1-4)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="pemahaman-materi" name="pemahaman_materi"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="sistematika" name="sistematika"/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="cara-penyampaian" name="cara_penyampaian"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bordered Table -->

                        </div>

                        <div class="row mb-3">
                            
                            <!-- Bordered Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="color : black">Gulir SGA 10%</h5>
                                    <small  style="color : black"class="col-sm-3">Timing 7 Step</small>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <th  style="color : black"ead>
                                                <tr  style="color : black">
                                                    <th  style="color : black">Ketarangan SGA 7 Step (Point : 1-4)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  style="color : black">
                                                    <td>
                                                        <input type="number" class="form-control" id="keterangan-sga-7-step" name="keterangan_sga_step_7"/>
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
	$('#keterangan-sga-7-step').on('keyup', function(){
		hitungPoint();
	})
</script>