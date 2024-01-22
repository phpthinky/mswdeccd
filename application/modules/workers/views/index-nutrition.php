  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ECCD Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Worker</li>
              <li class="breadcrumb-item active">My Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2 no-print">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#nutritions" data-toggle="tab">Nutrition</a></li>
                  <?php if (!$this->aauth->is_admin()): ?>
                  <li class="nav-item d-none"><a class="nav-link" href="#addStudents" data-toggle="tab">Add student</a></li>

                  <li class="nav-item d-none"><a class="nav-link" href="#addSchoolYear" data-toggle="tab">School Years</a></li>
                  <li class="nav-item d-none"><a class="nav-link" href="#editStudents" data-toggle="tab">Repeater</a></li>
                  <?php endif ?>
                  <li class="nav-item d-none"><a class="nav-link" href="#weighing" data-toggle="tab">Weighing</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="print-header">
                  <h2>MSWD ECCD Records</h2>
                  <h4>Date printed: <?=date('M d, Y')?></h4>
                </div>
                <div class="tab-content">

                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="nutritions">


                    <!-- The timeline -->
                    <div class="card">  
                      <div class="card-header">
                        <div class="row">
                          <div class="col-md-10"><label class="text-title">
                        Student Nutrition Status</label></div>
                          <div class="col-md-2">
                          <button class="btn btn-outline-primary btn-sm d-none" type="button" id="btn-add-weighing"><i class="fas fa-plus"></i> Add</button> 
                          <button class="btn btn-outline-success btn-sm" type="button" id="btn-export-student-nutritions"><i class="fas fa-table"></i> Export</button>
                        </div>
                        </div>

                      </div>
                      <div class="card-body">
                        

                          <form id="frm_nutritions" method="post" action="javascript:void(0)">
                        <div class="row">
                          <div class="col-md-4 col-sm-12 col-xs-12">
                          <select class="form-control class-schedule" name="class_schedule" id="nutritions-classess">
                            <option value="0">Select classes</option>
                              <?php if (!empty($schoolyears)): ?>

                                <?php foreach ($schoolyears as $key => $value): ?>
                                  <?php if ($key == 0): ?>
                                  <option value="<?=$value->YearId?>" selected><?=tomdy($value->YearStart)?> to <?=tomdy($value->YearEnd)?></option>
                                    <?php else: ?>
                                  <option value="<?=$value->YearId?>"><?=tomdy($value->YearStart)?> to <?=tomdy($value->YearEnd)?></option>

                                  <?php endif ?>
                                <?php endforeach ?>
                              <?php endif ?>

                          </select>
                        </div>

                       <div class="col-sm-2">
                          <select class="form-control" name="date_weighing" id="n_date_weighing">
                          <option value="1">Upon Entry</option>
                          <option value="2">After 20 days</option>
                          <option value="3">After 40 days</option>
                          <option value="4">Terminal</option>
                        </select>

                      </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring_nutritions" placeholder="Search here...">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                        </div>
                        
                        </div>
                        </form>
                        <div class="table-responsive">
                          
                        <table class="table table-bordered" id="tbl-nutritions">
                          <thead>
                            <tr>

                    <th></th>
                    <th>#</th>
                    <th>First Name</th>
                    <th>MI</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Birthday</th>
                    <th>Age in Months</th>
                    <th>Sector</th>
                    <th>Deworming Date</th>
                    <th>Vit. A Supp. Date</th>
                    <th>Date of Weighing</th>
                    <th>Weight kg</th>
                    <th>Height cm</th>
                    <th>WFA</th>
                    <th>HFA</th>
                    <th>WFH</th>
                    <th>Nutrition Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                        </div>
                      </div>
                      <div class="info-box">
                        <hr>
                        <p>WFA = child weight over ideal weight multiplied by 100</p>
                        <p>HFA = child height over ideal height multiplied by 100</p>
                        <p>WFH = child weight over ideal weight base on child height multiplied by 100</p>

                      </div>

                    </div>
                    <!-- /.timeline -->
                    
                  </div>
                                
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="weighing">
                    <?php $this->load->view('workers/weighing'); ?>
                   
                  </div>

                  <!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="editStudents">
                    <?php $this->load->view('workers/students_edit'); ?>
                   
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->