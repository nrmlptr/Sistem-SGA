 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Data Seksie</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Data Seksie SGA</h5>
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
                        <form action="<?php echo base_url('home/proses_edit_sie');?>" method="POST">
                            <input type="hidden" name="id_sie" value="<?php echo $id_sie;?>">
                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="nm_sie">Nama Seksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_sie" name="nm_sie" value="<?php echo  $nm_sie?>"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nm_kasie">Nama Kepala Seksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_kasie" name="nm_kasie" value="<?php echo $nm_kasie?>"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="namaDept">Nama Dept</label>
                                <div class="col-sm-10">
                                    <select name="namaDept" id="namaDept" class="form-control" required>
                                        <?php
                                            foreach($dept as $row){
                                                if($row->id_dept == $dept_id){
                                                echo "<option value='".$row->id_dept."' selected>".$row->nm_dept."</option>";
                                                }
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