
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pupils</span>
                <span class="info-box-number">
                  <?=(!empty($totalPupils) ? $totalPupils : 0)?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Normal</span>
                <span class="info-box-number"><?=(!empty($totalNormal) ? $totalNormal : 0)?>
</span>
              </div>
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

              <div class="info-box-content">
                <span class="info-box-text">Malnourish</span>
                <span class="info-box-number"><?=(!empty($totalManourish) ? $totalManourish : 0)?>
</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Obese</span>
                <span class="info-box-number"><?=(!empty($totalObese) ? $totalObese : 0)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
            <!-- /.info-box -->
        <div class="row d-none">
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content --> 