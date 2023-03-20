 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Data Grup</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Data Group SGA</h5>
                        <!-- <small class="text-muted float-end">Default label</small> -->
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
                        <form action="<?php echo base_url('home/proses_edit_grup');?>" method="POST">
                            <input type="hidden" name="id_grup" value="<?php echo $id_grup;?>">
                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="nm_grup">Nama Group</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_grup" name="nm_grup" value="<?php echo  $nm_grup?>"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nm_kagrup">Nama Leader Group</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_kagrup" name="nm_kagrup" value="<?php echo $nm_kagrup?>"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="no_hp">No HP</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp?>"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="jml">Jumlah Anggota</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="jml" name="jml" value="<?php echo $jml?>"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for=s"namaSie">Nama Seksi</label>
                                <div class="col-sm-10">
                                    <select name="namaSie" id="namaSie" class="form-control" required>
                                        <?php
                                            foreach($sie as $row){
                                                if($row->id_sie == $sie_id){
                                                echo "<option value='".$row->id_sie."' selected>".$row->nm_sie."</option>";
                                                }
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