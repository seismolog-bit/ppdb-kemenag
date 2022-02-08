<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>  

<?php
  function cek_internet(){
    $connected = @fsockopen("www.google.com", 80);
    if ($connected){
      $is_conn = true;
      fclose($connected);
    } else {
      $is_conn = false;
    }
      return $is_conn;
  }
            
  if (cek_internet() == true) {    
      if ($count_agama) { ?>
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Agama</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <div class="chart-responsive">
                        <?php
                        if ($count_agama) {
                          foreach($count_agama as $data){
                            $agama[] = $data->agama;
                            $tot_agama[] = (float) $data->jml_agama;
                          }
                        }  
                        ?>   
                        <canvas id="agama" style="width: 100px;height: 100px"></canvas> 
                        <script>
                          var ctx = document.getElementById("agama");
                          var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                              labels: <?php echo json_encode($agama);?>,
                              datasets: [{
                                label: 'Agama ',
                                data: <?php echo json_encode($tot_agama);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>                                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 

            <div class="col-md-6 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Jenis Kelamin</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <div class="chart-responsive">
                        <?php
                        if ($count_jk) {
                          foreach($count_jk as $data){
                            $jenis_kel[] = $data->jenis_kelamin;
                            $tot_jk[] = (float) $data->jml_jk;
                          }
                        }  
                        ?>   
                        <canvas id="jenis_kel" style="width: 100px;height: 100px"></canvas> 
                        <script>
                          var ctx = document.getElementById("jenis_kel");
                          var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                              labels: <?php echo json_encode($jenis_kel);?>,
                              datasets: [{
                                label: 'Jenis Kelamin ',
                                data: <?php echo json_encode($tot_jk);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>                                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>           
          </div> 

          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Asal Sekolah</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <div class="chart-responsive">
                        <?php
                        if ($count_sekolah) {
                          foreach($count_sekolah as $data){
                            $sekolah[] = $data->asal_sekolah;
                            $tot_sekolah[] = (float) $data->jml_sekolah;
                          }
                        }  
                        ?>   
                        <canvas id="sekolah" width="500"></canvas> 
                        <script>
                          var ctx = document.getElementById("sekolah");
                          var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                              labels: <?php echo json_encode($sekolah);?>,
                              datasets: [{
                                label: 'Asal Sekolah ',
                                data: <?php echo json_encode($tot_sekolah);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>                                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
    <?php } else { ?>             
          <div class="row">
            <div class="col-xs-12">
              <div class="callout callout-info">
                Tidak ada data statistik
              </div>
            </div>
          </div>  
    <?php }    
  } else { ?>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12 col-xs-12">            
          <div class="callout callout-info">
            <p>Aktifkan koneksi internet untuk menampilkan Statistik</p>
          </div>
        </div>
      </div>  
    </div>               
  <?php } ?>