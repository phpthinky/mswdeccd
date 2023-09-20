
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="background-color:palevioletred !important;">
              <div class="inner">
                <h3><?=(isset($totalPupils) ? $totalPupils : 0)?></h3>


                <p>Pupils</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=(isset($totalWorker) ? $totalWorker : 0)?></h3>

                <p>Daycare Worker</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box  bg-danger">
              <div class="inner">
                <h3><?=(isset($totalCenter) ? $totalCenter : 0)?></h3>

                <p>Daycare Center</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="background-color:forestgreen !important; color: #fff !important;">
              <div class="inner">

                <h3><?=(isset($ScaledScore) ? $scaledScore : 0)?></h3>

                <p>Scaled Score</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer" style="color: #fff !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
                    <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary" style="background-color:lightskyblue !important;color: black;">
              <div class="inner" style="color: #333 !important;">
                
                <h3><?=(isset($standardScore) ? $standardScore : 0)?></h3>


                <p>Standard Score</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer" style="color:#333 !important">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


        </div>

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content --> 