<!-- Content -->
<style>
    input:out-of-range {
    border:2px solid red;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>FORM PENILAIAN RISALAH ||
        <a href="<?= base_url('Home/viewScore')?>" class="btn btn-secondary">Back <i class='bx bxs-home'></i></a> 

        <select style="width:auto;" class="form-select mt-3 mb-1" id="ok" onChange="opsi(this)">
            <option>Action</option>
            <option value="on">Edit</option>
            <option value="off">Cancel</option>
        </select>  
    </h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 style="color : black" class="mb-0">Penilaian Risalah</h5>
                </div>
                <div class="card-body">
                    <?php
                        // foreach ($sie as $row){
                        //     $nm_sie = $row->nm_sie;
                    ?>
                    <form action="<?php echo base_url('home/loadEditScore');?>" method="POST">
                            <?php foreach($nilai as $data){?>
                                <input type="hidden" name="id_nilai" value="<?= $data->id_nilai?>">
                            <?php } ?>
                        <!-- <input type="hidden" name="pekerjaan_id" value="<?php echo $id_pekerjaan;?>"> -->
                        <div class="row mb-3 mt-4">
                            <label style="color : black"class="col-sm-4 col-form-label" for="pekerjaan_id">Nama SGA</label>
                            <div class="col-sm-3">
                                <?php foreach($sga as $data){?>
                                    <input type="text" class="form-control" id="id_pekerjaan" name="nm_grup" value="<?= $data->nm_grup?>" disabled/>
                                    <input type="hidden" name="pekerjaan_id" value="<?= $data->id_pekerjaan;?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label style="color : black"class="col-sm-4 col-form-label" for="jml">Tanggal Penilaian</label>
                            <div class="col-sm-3">
                                <?php foreach($nilai as $data){?>
                                    <input type="date" class="form-control" id="tgl_penilaian" name="tgl_penilaian" value="<?= $data->tgl_penilaian ?>" disabled/>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label style="color : black"class="col-sm-4 col-form-label" for="namaJuri">Nama Juri</label>
                            <div class="col-sm-4">
                                <?php foreach($nilai as $data){?>
                                    <input type="text" name="nm_juri" id="nm_juri" class="form-control" value="<?= $data->nm_juri?>" readonly/>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- Bordered Table -->
                            <div class="card">
                                <?php foreach($nilai as $row) {?>
                                <div class="card-body">
                                    <h5 style="color : black">Report 10%</h5>
                                    <h6>Sistematika Risalah dan Dokumentasi Team</h6>
                                    <div class="table-responsive text-nowrap">
                                        <table id="detail-point" class="table table-bordered">
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
                                                        <input type="number" class="form-control" id="metode-penyusunan"name="metode_penyusunan_risalah" min="1" max="4" value="<?= $row->metode_penyusunan_risalah?>" disabled/></td>
                                                    <td>
                                                        <input type="number" class="form-control" id="data-pendukung" name="data_pendukung_aktivitas_grup" min="1" max="4" value="<?= $row->data_pendukung_aktivitas_grup?>" disabled/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!--/ Bordered Table -->
                        </div>

                        <div class="row mb-3">
                            <!-- Bordered Table -->
                            <div class="card">
                                <?php foreach($nilai as $row) {?>
                                <div class="card-body">
                                    <h5 style="color : black">Content 70%</h5>
                                    <h6>Implementasi</h6>
                                    <!-- <small  style="color : black"class="col-sm-3">Implementasi</small> -->
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
                                                        <input type="number" class="form-control" id="identifikasi-masalah" name="identifikasi_masalah" min="1" max="4" value="<?= $row->identifikasi_masalah?>" disabled/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="safety-mapping" name="safety_mapping" min="1" max="4" value="<?= $row->safety_mapping?>" disabled/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="analysis" name="analysis" min="1" max="4" value="<?= $row->analysis?>" disabled/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="rencana-perbaikan" name="rencana_perbaikan" min="1" max="4" value="<?= $row->rencana_perbaikan?>" disabled/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="laporan-perbaikan" name="laporan_perbaikan" min="1" max="4" value="<?= $row->laporan_perbaikan?>" disabled/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="rank-down" name="rank_down" min="1" max="4" value="<?= $row->rank_down?>" disabled/>
                                                    </td>
                                                    <td>
                                                    <input type="number" class="form-control" id="justifikasi-atasan" name="justifikasi_atasan" min="1" max="4" value="<?= $row->justifikasi_atasan?>" disabled/>
                                                    </td>  
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!--/ Bordered Table -->
                        </div>

                        <div class="row mb-3">
                            <!-- Bordered Table -->
                            <div class="card">
                                <?php foreach($nilai as $row) {?>
                                <div class="card-body">
                                    <h5 style="color : black">Presentasi 10%</h5>
                                    <h6>Presentasi</h6>
                                    <!-- <small  style="color : black"class="col-sm-3">Presentasi</small> -->
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
                                                        <input type="number" class="form-control" id="pemahaman-materi" name="pemahaman_materi" min="1" max="4" value="<?= $row->pemahaman_materi?>" disabled/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="sistematika" name="sistematika" min="1" max="4" value="<?= $row->sistematika?>" disabled/>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="cara-penyampaian" name="cara_penyampaian" min="1" max="4" value="<?= $row->cara_penyampaian?>" disabled/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!--/ Bordered Table -->
                        </div>

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
                                                        <input type="number" class="form-control" id="keterangan-sga-7-step" name="keterangan_sga_step_7" min="1" max="4" value="<?= $row->keterangan_sga_step_7?>" disabled/>
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
                                <input type="number" class="form-control" id="total-point" name="total_score" value="<?= $row->total_score?>" disabled/>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" id="perbarui" class="btn btn-primary" disabled> Update <i class='bx bxs-edit'></i></button>
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
<!-- <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script> -->

<!-- Script menghitung point  -->
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
</script>


<!-- Script untuk mencetak file dengan datatables tapi hold -->
<!-- <script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $('#detail-point').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0,1,2,3]
                    }
                }
            ]
        });
    });
</script> -->

<!-- Script mengaktifkan tombol perbarui -->
<script>
    function opsi(value){
        var st = $("#ok").val();
        if(st == "on"){
            document.getElementById("tgl_penilaian").disabled           = false;
            document.getElementById("metode-penyusunan").disabled       = false;
            document.getElementById("data-pendukung").disabled          = false;
            document.getElementById("identifikasi-masalah").disabled    = false;
            document.getElementById("safety-mapping").disabled          = false;
            document.getElementById("analysis").disabled                = false;
            document.getElementById("rencana-perbaikan").disabled       = false;
            document.getElementById("laporan-perbaikan").disabled       = false;
            document.getElementById("rank-down").disabled               = false;
            document.getElementById("justifikasi-atasan").disabled      = false;
            document.getElementById("pemahaman-materi").disabled        = false;
            document.getElementById("sistematika").disabled             = false;
            document.getElementById("cara-penyampaian").disabled        = false;
            document.getElementById("keterangan-sga-7-step").disabled   = false;
            document.getElementById("total-point").disabled             = false;
            document.getElementById("perbarui").disabled                = false;
        } else {
            document.getElementById("tgl_penilaian").disabled           = true;
            document.getElementById("metode-penyusunan").disabled       = true;
            document.getElementById("data-pendukung").disabled          = true;
            document.getElementById("identifikasi-masalah").disabled    = true;
            document.getElementById("safety-mapping").disabled          = true;
            document.getElementById("analysis").disabled                = true;
            document.getElementById("rencana-perbaikan").disabled       = true;
            document.getElementById("laporan-perbaikan").disabled       = true;
            document.getElementById("rank-down").disabled               = true;
            document.getElementById("justifikasi-atasan").disabled      = true;
            document.getElementById("pemahaman-materi").disabled        = true;
            document.getElementById("sistematika").disabled             = true;
            document.getElementById("cara-penyampaian").disabled        = true;
            document.getElementById("keterangan-sga-7-step").disabled   = true;
            document.getElementById("total-point").disabled             = true;
            document.getElementById("perbarui").disabled                = true;
        }
    }
</script>
