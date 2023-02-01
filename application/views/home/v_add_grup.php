 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Tambah Data Grup</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Data Grup SGA</h5>
                        <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('home/proses_simpan_grup');?>" method="POST">
                            <input type="hidden" name="id_grup">
                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="nm_grup">Nama Grup</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_grup" name="nm_grup" placeholder="Tulis Nama Grup" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nm_kagrup">Nama Kepala Grup</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_kagrup" name="nm_kagrup" placeholder="Tulis Nama Kagrup" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="no_hp">No HP</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Tulis Nomor HP" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="no_hp">Jumlah Anggota</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="jml" name="jml" placeholder="Tulis Jumlah Anggoa" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nm_sie">Nama Sie</label>
                                <div class="col-sm-10">
                                    <select name="nm_sie" id="nm_sie" class="form-control" required>
                                        <option value="">Pilih Seksie</option>
                                        <?php
                                            foreach($dataSie as $row){
                                                echo "<option value='".$row->id_sie."'>".$row->nm_sie."</option>";
                                            }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button> || <button class="btn btn-warning"><a href="<?php echo base_url('home/show_grup');?>">Cancel</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->