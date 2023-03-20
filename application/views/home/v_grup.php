 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>
            <a href="<?php echo base_url('home/add_grup')?>"><button class='btn btn-secondary'>Tambah Data</button></a>
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Data Group SGA - PT CBI</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Nama Group</th>
                            <th>Leader Group</th>
                            <th>NO HP</th>
                            <th>Jumlah Anggota</th>
                            <th>Nama Seksi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" align="center">
                        <?php
                            $loop=1;
                            foreach($list_grup as $data){?>
                            <tr>
                                <td><?php echo $loop++?></td>
                                <td><?php echo $data['nm_grup']?></td>
                                <td><?php echo $data['nm_kagrup']?></td>
                                <td><?php echo $data['no_hp']?></td>
                                <td><?php echo $data['jml']?></td>
                                <td><?php echo $data['nm_sie']?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('home/perbaruidataGrup/'.$data['id_grup']);?>" class="btn btn-success"><i class='bx bx-edit'></i></a>
                                    <a href="<?php echo base_url('home/hapusDataByIdGrup/'.$data['id_grup']);?>" class="btn btn-danger btn-hapus" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"><i class='bx bxs-trash'></i></a>
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