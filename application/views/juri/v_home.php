<?php
    //  var_dump($this->session->userdata('username'));
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> DASHBOARD PENILAIAN SGA - PT Century Batteries Indonesia
        <!-- <a href="<?php echo base_url('home/add_sga')?>"><button class='btn btn-secondary'>Tambah Data</button></a> -->
        <!-- <a href="<?php echo base_url('dashboard/cetak_dosen')?>"><button class='btn btn-warning'>Cetak Data</button></a> -->
    </h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">DATA PESERTA SGA</h5>
        <div class="table-responsive text-nowrap pt-2">
            <table id="data_sga" class="table">
                <thead align="center">
                    <tr >
                        <th >No</th>
                        <th >Tanggal Pendaftaran</th>
                        <th  >Nama Dept</th>
                        <th  >Nama Seksi</th>
                        <th  >Kepala Seksi</th>
                        <th  >Nama Group</th>
                        <th  >Leader Group</th>
                        <th  >No HP</th>
                        <th  >Jumlah Anggota</th>
                        <th  >Status</th>
                        <?php for ($i=1; $i<=$jumlah_baris; $i++) {
                            echo '<th >Juri'.$i.'</th>';
                        }?>
                        <th  >Grand Total</th>
                        <th  >Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php 
                        $loop= 1;
                        foreach($listGrup as $data){?>
                            <tr>
                                <td align="center"><?php echo $loop++?></td>
                                <td align="center"><?php echo date('d-m-Y', strtotime($data['tanggal']))?></td>
                                <td><?php echo $data['nm_dept'];?></td>
                                <td><?php echo $data['nm_sie'];?></td>
                                <td><?php echo $data['nm_kasie'];?></td>
                                <td><?php echo $data['nm_grup'];?></td>
                                <td><?php echo $data['nm_kagrup'];?></td>
                                <td><?php echo $data['no_hp'];?></td>
                                <td align="center"><?php echo $data['jml'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <?php 
                                    $this->load->model('M_sga');
                                    $dataNilai = $this->M_sga->getNilai(); //ambil data nilai
                                    $data['nilaisga'] = $dataNilai;
                                    $score_grand = 0; //inisialisasi variable untuk nampung grand_total setiap row
                                    $grand_total = 0; // inisialiasi variable untuk menampung total_score setiap row
                                    $show_btn_add_score = true;
                                    
                                    // hitung jumlah juri
                                    $jumlah_juri = 0;
                                    foreach ($dataNilai as $row) {
                                        if ($row->pekerjaan_id == $data['id_pekerjaan']) {
                                            $jumlah_juri++;
                                        }
                                    }
                                    
                                    for ($i=1; $i<=$jumlah_baris; $i++) {
                                      echo '<td align="center">';
                                        foreach($dataNilai as $row){
                                            if($row->nm_juri == 'Juri' .$i){
                                                    if($data['status_pekerjaan'] == 'Finish'  && $data['id_pekerjaan'] == $row->pekerjaan_id){
                                                        $grand_total += $row->total_score; 
                                                        echo $row->total_score;?>
                                                            <!-- <a href="<?= base_url('Home/ResponDetailInput/'.$row->pekerjaan_id.'/'.$row->nm_juri)?>"><?= $row->total_score;?></a> -->
                                                        <?php  $cekDataJuri = $this->M_sga->getDataJuri($row->pekerjaan_id, $this->session->userdata('username'));
                                                        if ($cekDataJuri > 0) {
                                                            $show_btn_add_score = false;
                                                        }
                                                    }else{
                                                        echo ''; 
                                                    }
                                            }
                                        } 

                                        
                                      echo '</td>';
                                    }
                                    
                                    // hitung nilai rata-rata total_score / jumlah juri yang beri score
                                    if ($grand_total > 0 && $jumlah_juri > 0) {
                                        $score_grand = $grand_total / $jumlah_juri;
                                    }
                                    
                                    echo '<td align="center">'.$score_grand.'</td>'; // menampilkan grand total yang sudah dilakukan pada pengulangan di atas :D <3
                                ?>
                                
                                <td class="text-center">
                                    <?php if($data['status'] == 'Finish'):
                                        if ($show_btn_add_score) { ?>

                                            <a href="<?php echo base_url('home/addScore/'.$data['id_pekerjaan']);?>" class="btn btn-success">ADD SCORE</a>
                                        <?php } ?>
                                    <?php endif?>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5" />
</div>
<!-- / Content -->

<!-- <script src="<?php echo base_url('assets');?>/jquery/jquery.js"></script> -->
<script src="<?php echo base_url('assets');?>/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $('#data_sga').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                    }
                }
            ]
        });
    });
</script>
