<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>
    </h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">DATA  PESERTA SGA - PT Century Batteries Indonesia</h5>
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
                        <th rowspan="2" align="center">Jumlah Anggota</th>
                        <th rowspan="2" align="center">Status</th>
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
                            <!-- <td><?php echo $data['no_hp'];?></td> -->
                            <td><?php echo $data['jml'];?></td>
                            <td><?php echo $data['status_pekerjaan'];?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5" />

    <div class="card">
    <h5 class="card-header">PROGRESS GRUP PESERTA SGA - PT Century Batteries Indonesia</h5>
        <div class="row">
        
            <!-- <figure class="highcharts-figure">
                <div id="container"></div>
            </figure> -->
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>

<script src="<?php echo base_url('assets/sneatadmin/assets');?>/vendor/libs/jquery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
    const ctx = document.getElementById('myChart');
    
    const chartValue = (name, arrVal) => {
		return {
			label: name,
			fill: false,
			data: arrVal,
			// data: [80, 99, 70, 50, 120, 30],
			backgroundColor: 'rgba(170, 116, 215, 0.2)',
			borderColor: 'rgba(170, 116, 215, 1)',
			pointHoverRadius: 5,
			pointHitRadius: 5,
			pointBorderWidth: 1,
			lineTension: 0,
			pointRadius: 1,
			borderWidth: 1
		}
	}

	const chartConfig = () => {
		return {
			type: 'bar',
			data: {
				// labels:["tahap1", "t2", "t3"],
                labels: <?php
                    $labels = "[";

                    foreach ($list_sga as $sga) {
                        $labels .= "'".$sga['nm_grup']."',";
                    }

                    echo trim($labels, ",")."]";
                ?>,
				datasets: [  
					// chartValue("pegawai", [2]),met gue merhatiin ya bentar ga ngmg dluok
                    <?php
                    $num = "";
                    foreach ($list_sga as $sga) {
                    	$num .= (trim(str_replace("Tahap", "", $sga['status_pekerjaan'])) == "Finish" ? "8" : trim(str_replace("Tahap", "", $sga['status_pekerjaan']))).",";
                    }
                    echo "chartValue('Tahap Pekerjaan', [".trim($num, ",")."]),";
                ?>
				]
			},
			options: {
				// spanGaps: 86400,
				indexAxis: 'y',
				responsive: true,
				scales: {
					y: {
						beginAtZero: true
					}
				},
				plugins: {
					title: {
						display: false,
						text: 'Tempol Cure - Clean Room'
					},
					// subtitle: {
					// 	display: true,
					// 	text: 'CLEAN ROOM'
					// },
					tooltip: {
						usePointStyle: true,
						callbacks: {
							labelPointStyle: function(context) {
								return {
									pointStyle: 'rectRounded',
									rotation: 0
								};
							}
						}
					},
					legend: {
						position: 'bottom'
					}
				},
				transitions: {
					show: {
						animations: {
							x: {
								from: 0
							},
							// y: {
							// 	from: 0
							// }
						}
					},
					hide: {
						animations: {
							x: {
								to: 0
							},
							// y: {
							// 	to: 0
							// }
						}
					}
				},
				interaction: {
					intersect: false,
					// mode: 'point',
					// mode: 'index',
				},
				animation: {
					duration: 1500
				}
			}
		};
	}

    new Chart(ctx, chartConfig());
</script>


