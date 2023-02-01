 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Data Department</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Data Department SGA</h5>
                        <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                    <?php
                        foreach ($dept as $row){
                            $nm_dept = $row->nm_dept;
                            $id_dept = $row->id_dept;
                        }
                    ?>
                        <form action="<?php echo base_url('home/proses_edit_dept');?>" method="POST">
                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label" for="nm_dept">Nama Dept</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nm_dept" class="form-control" value="<?php echo $nm_dept?>">
                                    <input type="hidden" name="id_dept" value="<?php echo $id_dept?>">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button> || <button class="btn btn-warning"><a href="<?php echo base_url('home/show_dept');?>">Cancel</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->