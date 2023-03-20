<html>
<head>
  <title>Export Excel Subcont</title>
  <!-- <script src="<?php echo base_url('assets/sbadmin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" /> <!--Include file bootstrap.min.css-->
  <link href="<?php echo base_url('assets/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet"> <!-- Include file bootstrap-datepicker.min.css -->
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>
<body style="padding: 0 20px;">
  <h2>Data SGA - PT CBI</h2><hr>
  <form method="get" action="">
    <div class="row">
      <div class="col-sm-3 col-md-2">
        <div class="form-group">
          <label>Filter Berdasarkan</label>
          <select name="filter" id="filter" class="form-control">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row" id="form-tanggal">
      <div class="col-sm-3 col-md-2">
        <div class="form-group">
          <label>Tanggal</label>
          <input type="text" name="tanggal" class="form-control datepicker" autocomplete="off" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3 col-md-2" id="form-bulan">
        <div class="form-group">
          <label>Bulan</label>
          <select name="bulan" class="form-control">
            <option value="">Pilih</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3 col-md-2" id="form-tahun">
        <div class="form-group">
          <label>Tahun</label>
          <select name="tahun" class="form-control">
            <option value="">Pilih</option>
            <?php
              foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
              echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
            }?>
          </select>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Tampilkan</button>
    <a href="index" class="btn btn-default">Reset Filter</a>
    <a href="<?= base_url('Home/Home_Admin');?>" class="btn btn-info">Kembali</a>
  </form>
  <hr />
  <b><?php echo $label; ?></b><br /><br />
  <a href="<?php echo $url_export; ?>" class="btn btn-success btn-xs">EXPORT EXCEL</a><br /><br />
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Nama Dept</th>
        <th scope="col">Nama Seksi</th>
        <th scope="col">Kepala Seksi</th>
        <th scope="col">Nama Group</th>
        <th scope="col">Leader Group</th>
        <th scope="col">No HP</th>
        <th scope="col">Jumlah Anggota</th>
        <th scope="col">Status</th>
      </tr>
      <?php
      if( ! empty($pekerjaan)){
      $no = 1;
      foreach($pekerjaan as $data){
        $tgl = date('d-m-Y', strtotime($data->tanggal));
        echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>".$tgl."</td>";
          echo "<td>".$data->nm_dept."</td>";
          echo "<td>".$data->nm_sie."</td>";
          echo "<td>".$data->nm_kasie."</td>";
          echo "<td>".$data->nm_grup."</td>";
          echo "<td>".$data->nm_kagrup."</td>";
          echo "<td>".$data->no_hp."</td>";
          echo "<td>".$data->jml."</td>";
          echo "<td>".$data->status_pekerjaan."</td>";
        echo "</tr>";
        // $no++;
      }
      }
      ?>
    </table>
  </div>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> <!-- Load file bootstrap.min.js -->
  <script src="<?php echo base_url('assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script> <!-- Load file bootstrap-datepicker.min.js -->
  <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
      setDatePicker() // Panggil fungsi setDatePicker
      $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
      $('#filter').change(function(){ // Ketika user memilih filter
        if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
          $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
          $('#form-tanggal').show(); // Tampilkan form tanggal
        }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
          $('#form-tanggal').hide(); // Sembunyikan form tanggal
          $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
        }else{ // Jika filternya 3 (per tahun)
          $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
          $('#form-tahun').show(); // Tampilkan form tahun
        }
        $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
      })
    })
    function setDatePicker(){
      $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
      }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
    }
  </script>
</body>
</html>



