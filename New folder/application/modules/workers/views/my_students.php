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
                  <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?=site_url('workers/assessments')?>" >Assessment</a></li>

                  <li class="nav-item"><a class="nav-link" href="<?=site_url('workers/nutritions')?>" >Nutrition</a></li>
                  <?php if (!$this->aauth->is_admin()): ?>
                  <li class="nav-item"><a class="nav-link" href="#addStudents" data-toggle="tab">Add student</a></li>

                  <li class="nav-item"><a class="nav-link" href="#addSchoolYear" data-toggle="tab">School Years</a></li>
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
                  <div class="active tab-pane" id="home">
                    <div class="card" id="cardWeight"> 
                      <div class="card-header">
                         <div class="row">
                          <div class="col-md-8"><label class="text-title">
                         Enrolled Student by School Year</label></div>
                          <div class="col-md-4">
                          <button class="btn btn-outline-primary btn-sm " id="btn-refresh-table" type="button"><i class="fas fa-reload"></i> Refresh</button> <button class="btn btn-outline-primary btn-sm " type="button" id="btn-add-student"><i class="fas fa-plus"></i> Add</button> <button class="btn btn-outline-success btn-sm " id="btn-export-worker-students"><i class="fas fa-table"></i> Export</button>
                        </div>
                        </div>
                       
                      </div>
                      <div class="card-body">
                          <form id="frmfindmystudent" method="post" action="javascript:void(0)">
                        <div class="row">
                          <div class="col-md-4 col-sm-12 col-xs-12">
                          <select class="form-control" name="class_schedule" id="select-home-classess">
                            <option value="0">Select classes</option>
                              <?php if (!empty($myschoolyear)): ?>

                                <?php foreach ($myschoolyear as $key => $value): ?>
                                  <?php if ($key == 0): ?>
                                  <option value="<?=$value->year_id?>" selected><?=tomdy($value->class_start)?> to <?=tomdy($value->class_end)?></option>
                                    <?php else: ?>
                                  <option value="<?=$value->year_id?>"><?=tomdy($value->class_start)?> to <?=tomdy($value->class_end)?></option>

                                  <?php endif ?>
                                <?php endforeach ?>
                              <?php endif ?>
                            

                          </select>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                          
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring" placeholder="Search here...">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                        </div>
                        
                        </div>
                        </form>

                    <br/>

                    <hr/>
                        <div class="row table-responsive">
                        
        
                <table id="tblmystudents" class="table table-bordered w-100">
                  <thead>
                  <tr>
                    <th  style="width:50px !important">#</th>
                    <th>Name</th>
                    <th>Age (months)</th>
                    <th>Gender</th>

                              <th>Address</th>
                              <th>Student Type</th>
                    <th>Class Schedule</th>
                    <th></th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>


                        </div>
                      </div>
                    </div>

                    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="addSchoolYear">
                    Add School Year

                    <div class="card">
                      <div class="card-header">
                        
                      </div>
                      <div class="card-body">
                        <form id="frmschoolyear" method="post" action="javascript:void(0)">
                          

                        <div class="row form-group">
                          <div class="col-md-3"><label></label></div>
                          <div class="col-md-9"><span id="error-area"></span></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-3"><label>Start Date</label></div>
                          <div class="col-md-9"><input type="date" name="startdate" class="form-control" placeholder="Start of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>End Date</label></div>
                          <div class="col-md-9"><input type="date" name="enddate" class="form-control" placeholder="End of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>&nbsp;</label></div>
                          <div class="col-md-9"><button type="submit" class="btn btn-success">Add</button></div>
                        </div>

                        <div class="d-none">
                          <input type="hidden" name="form" value="add_schoolyear">
                        </div>
                        </form>
                      </div>
                    </div>

                    <!-- select school year / -->
                    <hr>
                    <form class="form-responsive d-none" id="frmselectschoolyear" method="post" action="<?=site_url('workers/addtomyschoolyear')?>">
                      <div class="row">
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-9"><div class="pull-right"><span id="error-area"></span></div></div>
                      </div>
                      <div class="row form-group">
                        <input type="hidden" name="workersId" value="<?=$info->workersId?>">
                          <div class="col-md-3"><label>Select school year</label></div>
                          <div class="col-md-9">
                            <select class="form-control" id="schoolyears" name="schoolyears" required>
                              <option value="">Select here..</option>
                              <?php if (!empty($schoolyears)): ?>
                                <?php foreach ($schoolyears as $key => $value): ?>
                                  <option value="<?=$value->YearId?>"><?=tomdy($value->YearStart)?> to <?=tomdy($value->YearEnd)?></option>
                                <?php endforeach ?>
                              <?php endif ?>
                            </select>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>&nbsp;</label></div>
                          <div class="col-md-9"><button type="submit" class="btn btn-danger">Save</button></div>
                        </div>
                    </form>
                    <!-- / select school year -->
                  </div>

                  <!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="addStudents">
                    <?php $this->load->view('workers/students_add'); ?>
                   
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