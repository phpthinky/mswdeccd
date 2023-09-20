
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daycare Worker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daycare workers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
                                    <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link <?=(!empty($action) ? '' : 'active')?>" href="#home" data-toggle="tab">Daycare Workers</a></li>
                  <li class="nav-item"><a class="nav-link <?=(!empty($action) ? 'active' : '')?>" href="#addWorker" data-toggle="tab">Add Worker</a></li>
                </ul>


          </div>
          <div class="card-body">
            <div class="tab-content">

                            <div class="tab-pane <?=(!empty($action) ? '' : 'active')?>" id="home">
                              
                                <div class="row">
                                  
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th>Center</th>
                    <th>Job Status</th>
                    <th style="max-width:   100px !important;"></th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php if (!empty($workers)): ?>
                      <?php foreach ($workers as $key => $value): ?>
                        
                        <tr>
                          <td><?=$value->workersId?></td>
                          <td><?=$value->workerName?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><a href="<?=site_url('workers/profile/'.$value->workersId)?>"><i class="fas fa-list"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  
                  </tbody>
                </table>

                                </div>

                            </div>
            <div class="tab-pane <?=(!empty($action) ? 'active' : '')?>" id="addWorker">
              <div id="error-area"></div>
              <form class="form-horizontal" id="frmaddworker" method="POST" action="<?=site_url('workers/add')?>">

                
                          <?php echo validation_errors(); ?>
                          <?php if(!empty($hasErrors)) echo $hasErrors; ?>

                <div class="form-group row">
                  <label class="col-sm-2">Select center</label>
                  <div class="col-sm-10">
                    <select name="centerId" id="centerId" class="form-control">
                      <option value="0">Select assigned center here</option>
                      <?php foreach ($centers as $key => $value): ?>
                        <option value="<?=$value->centerId?>"><?=$value->centerName?></option>
                      <?php endforeach ?>
                    </select>
                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Name of worker</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="firstName" placeholder="First Name">
                      <input type="text" class="form-control" name="middleName" placeholder="Middle Name">
                      <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                        <div class="input-group-append">
                          <input type="text" name="ext" class="form-control" placeholder="Extension: Jr." width="50px">
                        </div>

                    </div>
                    <?=form_error('firstName')?>
                    <?=form_error('lastName')?>

                  </div>                  
                </div>


                <div class="form-group row">
                  <label class="col-sm-2">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" placeholder="user@email.com">
                    <?=form_error('email')?>
                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                    <?=form_error('address')?>
                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Birthday</label>
                  <div class="col-sm-10">
                    <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Birthday">
                    <?=form_error('birthday')?>
                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Date Hired</label>
                  <div class="col-sm-10">
                    <input type="date" name="dateHired" id="dateHired" class="form-control" placeholder="Date Hired">
                    <?=form_error('dateHired')?>
                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Job Status</label>
                  <div class="col-sm-10">
                    <select name="jobStatus" id="jobStatus" class="form-control" >
                      <option value="1">Job Order</option>
                      <option value="2">Contractual</option>
                      <option value="3">Permanent</option>
                      <option value="4">Resigned</option>
                      <option value="5">Retired</option>
                    </select>
                    <?=form_error('jobStatus')?>
                  </div>                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">&nbsp;</div>
                  <div class="col-sm-10"><button class="btn btn-danger">Add</button></div>
                </div>
              </form>
            </div>

          </div>


          </div>
        </div>

    </div>
  </div>

  </div>