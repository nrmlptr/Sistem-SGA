  <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>DATA SGA</h4>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Edit Status SGA</h5>
                            <!-- <small class="text-muted float-end">Default label</small> -->
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('home/proses_edit')?>">
                                <input type="hidden" name="id_pekerjaan" value="<?php echo $id_pekerjaan?>">
                                <div class="mb-3">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <select class="form-select" id="status" name="status" value="<?php echo isset($id_pekerjaan) && $id_pekerjaan['status']  ? 'selected' : '' ?>">
                                        <option selected>Pilih Tahapan</option>
                                        <option value="Tahap 1"<?php echo isset($id_pekerjaan) && $id_pekerjaan == 'Tahap 1' ?'selected' : '' ?>>Tahap 1</option>
                                        <option value="Tahap 2"<?php echo isset($id_pekerjaan) && $id_pekerjaan == 'Tahap 2' ?'selected' : '' ?>>Tahap 2</option>
                                        <option value="Tahap 3"<?php echo isset($id_pekerjaan) && $id_pekerjaan == 'Tahap 3' ?'selected' : '' ?>>Tahap 3</option>
                                        <option value="Tahap 4"<?php echo isset($id_pekerjaan) && $id_pekerjaan== 'Tahap 4' ?'selected' : '' ?>>Tahap 4</option>
                                        <option value="Tahap 5"<?php echo isset($id_pekerjaan) && $id_pekerjaan == 'Tahap 5' ?'selected' : '' ?>>Tahap 5</option>
                                        <option value="Tahap 6"<?php echo isset($id_pekerjaan) && $id_pekerjaan == 'Tahap 6' ?'selected' : '' ?>>Tahap 6</option>
                                        <option value="Tahap 7"<?php echo isset($id_pekerjaan) && $id_pekerjaan == 'Tahap 7' ?'selected' : '' ?>>Tahap 7</option>
                                        <option value="Finish"<?php echo isset($id_pekerjaan) && $id_pekerjaan == 'Finish' ?'selected' : '' ?>>Finish</option>
                                    </select>
                                    <!-- <select name="status" id="status" class="form-control">
                                        <option value="Tahap 1" <?php echo ($id_pekerjaan ? 'Tahap 1' : 'selected' ); ?> >Tahap 1</option>
                                        <option value="Tahap 2" <?php echo ($id_pekerjaan ? 'Tahap 2' : 'selected' ); ?>>Tahap 2</option>
                                        <option value="Tahap 3" <?php echo ($id_pekerjaan ? 'Tahap 3' : 'selected' ); ?> >Tahap 3</option>
                                        <option value="Tahap 4" <?php echo ($id_pekerjaan ? 'Tahap 4' : 'selected' ); ?>>Tahap 4</option>
                                        <option value="Tahap 5" <?php echo ($id_pekerjaan ? 'Tahap 5' : 'selected' ); ?> >Tahap 5</option>
                                        <option value="Tahap 6" <?php echo ($id_pekerjaan ? 'Tahap 6' : 'selected' ); ?>>Tahap 6</option>
                                        <option value="Tahap 7" <?php echo ($id_pekerjaan ? 'Tahap 7' : 'selected' ); ?> >Tahap 7</option>
                                        <option value="Finish" <?php echo ($id_pekerjaan? 'Finish' : 'selected' ); ?>>Finish</option>

                                    </select> -->
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button> || <button class="btn btn-warning"><a href="<?php echo base_url('home/Home_Admin');?>">Cancel</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- / Content -->
