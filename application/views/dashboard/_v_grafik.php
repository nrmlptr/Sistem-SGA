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

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($nm_grup, JSON_UNESCAPED_SLASHES), "\n";?>,
            datasets: [
                {
                    axis: 'y',
                    label: 'Tahap Pekerjaan',
                    data: <?php

                            echo json_encode($data_status_pekerjaan, JSON_UNESCAPED_SLASHES), "\n";?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
        indexAxis: 'y',
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }],
            yAxes: [{
                // ticks: {
                //     beginAtZero:true
                // }
            }]
        }
        }

    });
</script> -->
<script src="<?php echo base_url('assets/sneatadmin/assets');?>/vendor/libs/jquery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var groupProgress = <?php echo json_encode($progressGrup); ?>;
    var groupData = {};
    var groupLabels = [];

    groupProgress.forEach(function(item) {
        if (!groupData.hasOwnProperty(item.nm_grup)) {
            groupData[item.nm_grup] = {
                'Tahap 1': 0,
                'Tahap 2': 0,
                'Tahap 3': 0,
                'Tahap 4': 0,
                'Tahap 5': 0,
                'Tahap 6': 0,
                'Tahap 7': 0,
                'Finish': 0,
            };
            groupLabels.push(item.nm_grup);
        }
        groupData[item.nm_grup][item.status_pekerjaan]++;
    });

    var chartData = {
        labels: groupLabels,
        datasets: [
            {
                label: 'Tahap 1',
                backgroundColor: '#F7464A',
                data: groupLabels.map(function(grup) {
                    return groupData[grup];
                })
            },
            {
                label: 'Tahap 2',
                backgroundColor: '#46BFBD',
                data: groupLabels.map(function(grup) {
                    return groupData[grup]['Tahap 2'];
                })
            },
            {
                label: 'Tahap 3',
                backgroundColor: '#FDB45C',
                data: groupLabels.map(function(grup) {
                    return groupData[grup]['Tahap 3'];
                })
            },{
                label: 'Tahap 4',
                backgroundColor: '#3eff8a',
                data: groupLabels.map(function(grup) {
                    return groupData[grup]['Tahap 4'];
                })
            },
            {
                label: 'Tahap 5',
                backgroundColor: '#fa4394',
                data: groupLabels.map(function(grup) {
                    return groupData[grup]['Tahap 5'];
                })
            },
            {
                label: 'Tahap 6',
                backgroundColor: '#da55e0',
                data: groupLabels.map(function(grup) {
                    return groupData[grup]['Tahap 6'];
                })
            },{
                label: 'Tahap 7',
                backgroundColor: '#7b33e2',
                data: groupLabels.map(function(grup) {
                    return groupData[grup]['Tahap 7'];
                })
            },
            {
                label: 'Finish',
                backgroundColor: '#142680',
                data: groupLabels.map(function(grup) {
                    return groupData[grup]['Finish'];
                })
            }
        ]
    };

    var options = {
        indexAxis: 'y',
        scales: {
            xAxes: [{
                
                // stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        },
        labels: ['Tahap 1', 'Tahap 2', 'Tahap 3', 'Tahap 4', 'Tahap 5', 'Tahap 6', 'Tahap 7', 'Finish']
    };

    var chart = new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: chartData,
        options: options
    });
</script>


