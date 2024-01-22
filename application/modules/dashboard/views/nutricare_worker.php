
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users "></i></span>

              <a class="info-box-content" href="<?=site_url('workers/nutritions')?>">
                <span class="info-box-text">Pupils</span>
                <span class="info-box-number">
                  <?=(!empty($totalPupils) ? $totalPupils : 0)?>
                  <small></small>
                </span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <a class="info-box-content" href="<?=site_url('students/listallnormal')?>">
                <span class="info-box-text">Normal</span>
                <span class="info-box-number"><?=(!empty($totalNormal) ? $totalNormal : 0)?>
</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <a class="info-box-content" href="<?=site_url('students/listallmalnourish')?>">
                <span class="info-box-text">Malnourish</span>
                <span class="info-box-number"><?=(!empty($totalMalnourish) ? $totalMalnourish : 0)?>
</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <a class="info-box-content" href="<?=site_url('students/listallobesed')?>">
                <span class="info-box-text">Obese</span>
                <span class="info-box-number"><?=(!empty($totalObese) ? $totalObese : 0)?></span>
              </a>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
            <!-- /.info-box -->
        <div class="row">
          <div class="col-md-4">
            <center><h4>WEIGHT FOR AGE</h4></center>
            <canvas id="chart-weight-for-age"></canvas>
          </div>

          <div class="col-md-4">
            <center><h4>HEIGHT FOR AGE</h4></center>
            <canvas id="chart-height-for-age"></canvas>
          </div>
          <div class="col-md-4">
            <center><h4>WEIGHT FOR HEIGHT</h4></center>
            <canvas id="chart-weight-for-height"></canvas>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><center><h4>BY SECTOR</h4></center></div>
          <div class="row">
            
          <div class="col-md-4">

            <canvas id="chart-weight-for-age-sector-1"></canvas>
          </div>

          <div class="col-md-4">

            <canvas id="chart-height-for-age-sector-1"></canvas>
          </div>

          <div class="col-md-4">

            <canvas id="chart-weight-for-height-sector-1"></canvas>
          </div>

          </div>
          <div class="row">
            
          <div class="col-md-4">

            <canvas id="chart-weight-for-age-sector-2"></canvas>
          </div>


          <div class="col-md-4">

            <canvas id="chart-height-for-age-sector-2"></canvas>
          </div>

          <div class="col-md-4">

            <canvas id="chart-weight-for-height-sector-2"></canvas>
          </div>


          </div>

          <!-- sector 3 -->
                    <div class="row">
            
          <div class="col-md-4">

            <canvas id="chart-weight-for-age-sector-3"></canvas>
          </div>


          <div class="col-md-4">

            <canvas id="chart-height-for-age-sector-3"></canvas>
          </div>

          <div class="col-md-4">

            <canvas id="chart-weight-for-height-sector-3"></canvas>
          </div>


          </div>
          <!-- sector 4 -->
                    <div class="row">
            
          <div class="col-md-4">

            <canvas id="chart-weight-for-age-sector-4"></canvas>
          </div>


          <div class="col-md-4">

            <canvas id="chart-height-for-age-sector-4"></canvas>
          </div>

          <div class="col-md-4">

            <canvas id="chart-weight-for-height-sector-4"></canvas>
          </div>


          </div>




        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content --> 