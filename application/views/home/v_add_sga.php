<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>TAMBAH DATA PESERTA SGA - PT CBI</h4>

  <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Form Tambah Data Peserta SGA</h5>
                    <!-- <small class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('home/proses_simpan');?>" method="POST">

                        <div class="row mb-3 mt-4">
                          <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                          <div class="col-sm-2">
                                <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d')?>" readonly>
                          </div>
                        </div>
                        <div class="row mb-3 mt-4">
                          <label for="nm_dept" class="col-sm-2 col-form-label">Nama Dept</label>   
                            <div class="col-sm-10">
                                <select name="nm_dept" id="nm_dept" class="form-control">
                                    <option value="0">-PILIH-</option>
                                    <?php foreach($dataDept as $row):?>
                                        <option value="<?php echo $row->id_dept;?>"><?php echo $row->nm_dept;?></option>
                                    <?php endforeach;?>
                                </select>     
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label for="nm_sie" class="col-sm-2 col-form-label">Nama Seksi</label>
                          <div class="col-sm-10">
                               <select name="nm_sie" id="nm_sie" class="nm_sie form-control">
                                    <option value="">-PILIH-</option>
                                </select>    
                          </div>
                        </div> 
                        <div class="col-md-3 mb-2"></div>  
                        <div class="row mb-3">
                          <label for="nm_grup" class="col-sm-2 col-form-label">Nama Group</label>
                          <div class="col-sm-10">
                               <select name="nm_grup" id="nm_grup" class="nm_grup form-control">
                                    <option value="">-PILIH-</option>
                                </select>    
                          </div>
                        </div>
                        <div class="col-md-3 mb-2"></div>
                        <div class="row mb-3">
                          <label for="status" class="col-sm-2 col-form-label">Tahapan Kerja</label>
                          <div class="col-sm-10">
                                <select name="status" class="form-select" id="status" required>
                                    <option selected>Pilih Tahapan</option>
                                    <option value="Tahap 1">Tahap 1</option>
                                    <option value="Tahap 2">Tahap 2</option>
                                    <option value="Tahap 3">Tahap 3</option>
                                    <option value="Tahap 4">Tahap 4</option>
                                    <option value="Tahap 5">Tahap 5</option>
                                    <option value="Tahap 6">Tahap 6</option>
                                    <option value="Tahap 7">Tahap 7</option>
                                    <option value="Finish">Finish</option>
                                </select>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"> Save <i class='bx bxs-save'></i></button> || <button class="btn btn-warning"><a href="<?php echo base_url('home/Home_Admin');?>"> Cancel <i class='bx bx-x-circle'></i></a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<script src="<?php echo base_url('assets/sneatadmin/assets');?>/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url('assets/sneatadmin/assets');?>/vendor/js/bootstrap.js"></script>
<script>
    //script untuk manggil sie otomatis berdasarkan nama dept
    $(document).ready(function(){
 
        $('#nm_dept').change(function(){ 
            var id=$(this).val();
            $.ajax({
                url : "<?php echo site_url('home/get_subDept');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    //  console.log(data);
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_sie+'=>'+data[i].nm_sie+'</option>';
                    }
                    $('#nm_sie').html(html);
                    $('#nm_sie').change(); //yang bikin error karena ininya ga di change jadi tiap dept yg pnya 1 sie grup ga ke select
                }
            });
            return false;
        }); 
        
    });

    //script untuk manggil grup otomatis berdasarkan nama sie
    $(document).ready(function(){
           
        $('#nm_sie').change(function(){ 
            var id=$(this).val();
            $.ajax({
                url : "<?php echo site_url('home/get_subSie');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    // console.log(data);
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_grup+'=>'+data[i].nm_grup+'</option>';
                    }
                    $('#nm_grup').html(html);
                }
            });
            return false;
        });  
    });
</script>
