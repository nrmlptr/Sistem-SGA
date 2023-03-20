<?php
//  var_dump($this->session->userdata('username'));
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>
        Document Presentasi Peserta
    </h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Document PPT - Peserta SGA</h5>
        <div class="table-responsive text-nowrap pt-2">
            <table id="data_sga" class="table">
                <thead align="center">
                    <tr align="center">
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 5%;">Tanggal</th>
 							<th class="text-center" style="width: 15%;">Kode Document</th>
 							<th class="text-center" style="width: 25%;">Nama Grup</th>
 							<th class="text-center" style="width: 35%;">Keterangan</th>
 							<th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                        <?php
                            $loop = 1;
                            
                            foreach($doc->result() as $row){ ?>
                            <tr>
                                <td class="text-center" style="width: 5%;"><?= $loop++?></td>
                                <td class="text-center" style="width: 5%;"><?php echo date('d-m-Y', strtotime($row->tgl_upload))?></td>
                                <td class="text-center" style="width: 15%;"><?= $row->kd_doc?></td>
                                <td class="text-center" style="width: 25%;"><?= $row->nm_grup?></td>
                                <td class="text-center" style="width: 35%;"><?= $row->keterangan_doc?></td>
                                <td class="text-center" style="width: 15%;">
                                    <a href="<?= base_url('Home/downloadDoc/'.$row->id_doc)?>" class="btn btn-app">
                                    <i class='bx bxs-download'></i>Download
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

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
            // dom: 'Bfrtip',
            // buttons: [
            //     {
            //         extend: 'excel',
            //         exportOptions: {
            //             columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]
            //         }
            //     }
            // ]
        });
    });
</script>
