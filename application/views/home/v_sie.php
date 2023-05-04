 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>
            <a href="<?php echo base_url('home/add_sie')?>"><button class='btn btn-secondary'>Tambah Data <i class='bx bx-add-to-queue'></i></button></a>
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Data Seksi - PT Century Batteries Indonesia</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Nama Seksi</th>
                            <th>Nama Kepala Seksi</th>
                            <th>Nama Dept</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" align="center">
                        <?php
                            $loop=1;
                            foreach($list_sie as $data){?>
                            <tr>
                                <td><?php echo $loop++?></td>
                                <td><?php echo $data['nm_sie']?></td>
                                <td><?php echo $data['nm_kasie']?></td>
                                <td><?php echo $data['nm_dept']?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('home/perbaruidataSie/'.$data['id_sie']);?>" class="btn btn-success"><i class='bx bx-edit'></i></a>
                                    <a href="<?php echo base_url('home/hapusDataByIdSie/'.$data['id_sie']);?>" class="btn btn-danger btn-hapus" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"><i class='bx bxs-trash'></i></a>
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