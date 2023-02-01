 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Tambah Data Seksie</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Data Seksie SGA</h5>
                        <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('home/proses_simpan_sie');?>" method="POST">
                            <input type="hidden" name="id_sie">
                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="nm_dept">Nama Seksie</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_sie" name="nm_sie" placeholder="Tulis Nama Seksie" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nm_kasie">Nama Kepala Seksie</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_kasie" name="nm_kasie" placeholder="Tulis Nama Kasie" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nm_dept">Nama Dept</label>
                                <div class="col-sm-10">
                                    <select name="nm_dept" id="nm_dept" class="form-control" required>
                                        <option value="">Pilih Department</option>
                                        <?php
                                            foreach($dataDept as $row){
                                                echo "<option value='".$row->id_dept."'>".$row->nm_dept."</option>";
                                            }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button> || <button class="btn btn-warning"><a href="<?php echo base_url('home/show_sie');?>">Cancel</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->