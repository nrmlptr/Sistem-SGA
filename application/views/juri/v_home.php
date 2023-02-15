<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>
        <!-- <a href="<?php echo base_url('home/add_sga')?>"><button class='btn btn-secondary'>Tambah Data</button></a> -->
        <!-- <a href="<?php echo base_url('dashboard/cetak_dosen')?>"><button class='btn btn-warning'>Cetak Data</button></a> -->
    </h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">DATA SGA 2023</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead align="center">
                    <tr align="center">
                        <th rowspan="2" align="center">No</th>
                        <th rowspan="2" align="center">Nama Dept</th>
                        <th rowspan="2" align="center">Nama Seksi</th>
                        <th rowspan="2" align="center">Nama Kasi</th>
                        <th rowspan="2" align="center">Nama Grup</th>
                        <th colspan="2" align="center">Grup</th>
                        <th rowspan="2" align="center">Jumlah Anggota</th>
                        <th rowspan="2" align="center">Status</th>
                        <th rowspan="2" align="center">Score Juri 1</th>
                        <th rowspan="2" align="center">Score Juri 2</th>
                        <th rowspan="2" align="center">Score Juri 3</th>
                        <th rowspan="2" align="center">Score Juri 4</th>
                        <th rowspan="2" align="center">Score Total</th>
                        <th rowspan="2" align="center">Action</th>
                    </tr>
                    <tr align="center">
                        <th align="center">Nama Kagrup</th>
                        <th align="center">No HP</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" align="center">
                    <?php 
                        $loop= 1;
                        foreach($list_sga as $data){?>
                        <tr>
                            <td><?php echo $loop++?></td>
                            <td><?php echo $data['nm_dept'];?></td>
                            <td><?php echo $data['nm_sie'];?></td>
                            <td><?php echo $data['nm_kasie'];?></td>
                            <td><?php echo $data['nm_grup'];?></td>
                            <td><?php echo $data['nm_kagrup'];?></td>
                            <td><?php echo $data['no_hp'];?></td>
                            <td><?php echo $data['jml'];?></td>
                            <td><?php echo $data['status'];?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center"><?php if($data['status'] == 'Finish'):?>
                                <a href="<?php echo base_url('home/addScore/'.$data['id_pekerjaan']);?>" class="btn btn-success">ADD SCORE</a><?php endif?>
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