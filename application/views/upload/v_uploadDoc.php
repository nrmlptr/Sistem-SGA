 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
        <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Tambah Data Grup</h4> -->

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Upload Document Presentasi Peserta SGA</h5>

                        <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body pt-3">
                        <form id="demo-form" method="POST" action="<?= base_url('Home/prosesUploadDoc');?>" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <label for="judul_berkas">Tanggal Upload Document* :</label>
                                    <input type="date" id="tgl_upload" class="form-control mt-2" name="tgl_upload"  value="<?php echo date("Y-m-d");?>" readonly/>

                                    <label for="kd_berkas">Kode Document * :</label>
                                    <input type="text" id="kd_doc" class="form-control mt-2" name="kd_doc" value="<?= $kd_doc?>" readonly/>

                                    <label for="judul_berkas">Nama Grup * :</label>
                                    <input type="text" id="nm_grup" class="form-control mt-2" name="nm_grup" required/>

                                    <label for="berkas">Berkas * :</label>
                                    <input type="file" id="berkas" class="form-control mt-2" name="berkas" required />
                                    <small style="color: red;">Format Document : Pdf atau Powerpoint</small>


                                    <label for="keterangan_doc">Keterangan * :</label>
                                    <textarea id="keterangan_doc" required="required" class="form-control mt-2" name="keterangan_doc"></textarea>
                                </div>
                            </div>
                                

                                
                            <br />
                            <!-- <button class="btn btn-primary" type="submit">Simpan</button> -->
                            <!-- <div class="row justify-content-end"> -->
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button> || <button class="btn btn-warning"><a href="<?php echo base_url('home/viewDoc');?>">Cancel</a></button>
                                </div>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->