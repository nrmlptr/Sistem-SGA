<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <!-- <div class="col-sm-4 col-lg-3 py- mb-8">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="btn-group float-right">
                            </div>
                            <?php
                            $total = $this->db->query("SELECT COUNT(nik) as jumlah FROM karyawan")->result();
                            foreach ($total as $row) {
                                echo  "<div class='text-value'>$row->jumlah</div>";
                            }
                            ?>
                            <div>JUMLAH KARYAWAN EHS</div>
                        </div>
                        <div class="chart-wrapper mt-3" style="height:70px;">
                            <canvas id="card-chart1" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div> -->

                <div class="col-sm-4 col-lg-3 py- mb-8">
                    <div class="card text-white bg-secondary">
                        <div class="card-body pb-0">
                            <div class="btn-group float-right">
                                <!-- <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i>
                                </button> -->
                            </div>
                            <?php
                            $totalSGA = $this->db->query("SELECT COUNT(id_pekerjaan) as jumlah FROM pekerjaan")->result();
                            foreach ($totalSGA as $row) {
                                echo  "<div class='text-value'>$row->jumlah</div>";
                            }
                            ?>
                            <div>JUMLAH PESERTA SGA</div>
                        </div>
                        <div class="chart-wrapper mt-3" style="height:70px;">
                            <canvas id="card-chart1" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-3 py- mb-8">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="btn-group float-right">
                                <!-- <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i>
                                </button> -->
                            </div>
                            <?php
                            $totalDEPT = $this->db->query("SELECT COUNT(id_dept) as jumlah FROM tb_dept")->result();
                            foreach ($totalDEPT as $row) {
                                echo  "<div class='text-value'>$row->jumlah</div>";
                            }
                            ?>
                            <div>JUMLAH DEPARTMENT</div>
                        </div>
                        <div class="chart-wrapper mt-3" style="height:70px;">
                            <canvas id="card-chart1" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-3 py- mb-8">
                    <div class="card text-white bg-secondary">
                        <div class="card-body pb-0">
                            <div class="btn-group float-right">
                                <!-- <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i>
                                </button> -->
                            </div>
                            <?php
                            $totalSIE = $this->db->query("SELECT COUNT(id_sie) as jumlah FROM tb_sie")->result();
                            foreach ($totalSIE as $row) {
                                echo  "<div class='text-value'>$row->jumlah</div>";
                            }
                            ?>
                            <div>JUMLAH SEKSI</div>
                        </div>
                        <div class="chart-wrapper mt-3" style="height:70px;">
                            <canvas id="card-chart1" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-3 py- mb-8">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="btn-group float-right">
                                <!-- <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i>
                                </button> -->
                            </div>
                            <?php
                            $totalGRUP = $this->db->query("SELECT COUNT(id_grup) as jumlah FROM tb_grup")->result();
                            foreach ($totalGRUP as $row) {
                                echo  "<div class='text-value'>$row->jumlah</div>";
                            }
                            ?>
                            <div>JUMLAH GROUP</div>
                        </div>
                        <div class="chart-wrapper mt-3" style="height:70px;">
                            <canvas id="card-chart1" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="fw-bold py-3 mb-6"><span class="text-muted fw-light"></span>
        <a href="<?php echo base_url('home/add_sga')?>"><button class='btn btn-secondary'>Daftar SGA <i class='bx bx-message-square-add'></i></button></a>
        <a href="<?php echo base_url('excel/index')?>"><button class='btn btn-primary'>Cetak Data <i class='bx bxs-printer'></i></button></a>
    </h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header align-left">DATA PESERTA SGA - PT Century Batteries Indonesia
            <!-- <a href="<?php echo base_url('home/add_sga')?>">
                <i class="bx bx-plus"></i>
            </a>
            <a href="<?php echo base_url('excel/index')?>">  
                <span class="tf-icons bx bx-printer"></span>
            </a> -->

        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead align="center">
                    <tr align="center">
                        <th rowspan="2" align="center">No</th>
                        <th rowspan="2" align="center">Nama Dept</th>
                        <th rowspan="2" align="center">Nama Seksi</th>
                        <th rowspan="2" align="center">Kepala Seksi</th>
                        <th rowspan="2" align="center">Nama Group</th>
                        <th rowspan="2" align="center">Leader Group</th>
                        <th rowspan="2" align="center">No HP</th>
                        <th rowspan="2" align="center">Jumlah Anggota</th>
                        <th rowspan="2" align="center">Status</th>
                        <th rowspan="2" align="center">Action</th>
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
                            <td class="text-center"><?php if($data['status'] != 'Finish'):?>
                                <a href="<?php echo base_url('home/perbaruidataSGA/'.$data['id_pekerjaan']);?>" class="btn btn-success"><i class='bx bx-edit'></i></a><?php endif?>
                                <a href="<?php echo base_url('home/hapusDataByIdSGA/'.$data['id_pekerjaan']);?>" class="btn btn-danger btn-hapus" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"><i class='bx bxs-trash'></i></a>
                                <!-- <a href="<?php echo base_url('home/viewScore');?>" class="btn btn-info"><i class='bx bx-mask'></i></a> -->
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