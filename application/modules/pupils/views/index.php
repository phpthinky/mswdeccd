
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MSWD ECCD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nutricare</a></li>
              <li class="breadcrumb-item active">Pupils</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                  <div class="row">
                    <div class="col-md-8 col-lg-8">List of pupils</div>
                    
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <d5v class="form-group">
                    <div class="row">
                      <div class="col-sm-3">
                        <label class="col-sm-4">Center</label>
                        <span class="col-sm-8">

                          <select class="form-control" name="centersOption" id="centersOption">
                          <option value="">Select center</option>
                          <?php foreach ($centers as $key => $value): ?>
                            <option value="<?=$value->centerId?>"><?=$value->centerName?></option>
                          <?php endforeach ?>
                            </select>
                          </span>
                      </div>
                       <div class="col-sm-3">
                        <label class="col-sm-4">Worker</label>
                        <span class="col-sm-8">
                          <select class="form-control" name="workersOption" id="workersOption">
                          <option value="">Select worker</option>
                          
                          <?php foreach ($workers as $key => $value): ?>
                            <option value="<?=$value->workersId?>"><?=$value->workerName?></option>
                          <?php endforeach ?>
                        </select></span>
                      </div>
                       <div class="col-sm-6">
                        <label class="col-sm-4">Search</label>
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                      </div>
                    </div>
                  </d5v>
                <table id="tblPupils" class="table table-bordered table-stripedw-100">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Barangay</th>
                    <th style="max-width: 100px;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>