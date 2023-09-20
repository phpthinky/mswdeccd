
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nutricare</a></li>
              <li class="breadcrumb-item"><a href="#">Pupils</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      	<div class="card">
      		<div class="card-header">
      			<ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#personaldetails" data-toggle="tab">Personal Details</a></li>
                  <li class="nav-item"><a class="nav-link d-none" href="#parent" data-toggle="tab">Parent</a></li>
                  <li class="nav-item"><a class="nav-link d-none" href="#weigh" data-toggle="tab">Status</a></li>
                  <li class="nav-item"><a class="nav-link d-none" href="#done" data-toggle="tab">Done</a></li>
                </ul>
      		</div>
      		<div class="card-body">

              
            <div class="tab-content">
              
                  <div class="tab-pane active" id="personaldetails">

        <form class="form-horizontal" action="<?=current_url()?>" method="POST">
                      <div class="row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                          <div class="error <?php if(!empty($hasErrors)) echo 'alert alert-danger'; ?>" >

                          <?php if(!empty($hasErrors)) echo $hasErrors; ?>
                          </div>
                        </div>
                      </div>
                <div class="form-group row">
                  <label class="col-sm-2">Center</label>
                  <div class="col-sm-10">
                    <select name="centerId" id="centerId" class="form-control">
                      <option value="0">Select assigned center here</option>
                      <?php foreach ($centers as $key => $value): ?>
                        <option value="<?=$value->centerId?>"><?=$value->centerName?></option>
                      <?php endforeach ?>
                    </select>
                          <div class="error"><?php echo form_error('centerName') ?></div>

                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Worker</label>
                  <div class="col-sm-10">
                    <select name="workersId" id="workersId" class="form-control">
                      <option value="0">Select assigned worker here</option>
                      <?php foreach ($workers as $key => $value): ?>
                        <option value="<?=$value->workersId?>"><?=$value->workerName?></option>
                      <?php endforeach ?>
                    </select>
                          <div class="error"><?php echo form_error('workerName') ?></div>

                  </div>                  
                </div>

                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                                
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="firstName" placeholder="First Lame" value="<?php echo set_value('firstName')?>">
                            <input type="text" class="form-control" name="middleName" placeholder="Middle Name" value="<?php echo set_value('middleName')?>">
                            <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="<?php echo set_value('lastName')?>">
                              <div class="input-group-append">
                                <input type="text" name="ext" value="<?php echo set_value('ext')?>" class="form-control" placeholder="Extension: Jr." width="50px">
                              </div>

                          </div>
                          <div class="error"><?php echo form_error('firstName') ?></div>
                          <div class="error"><?php echo form_error('lastName') ?></div>


                              </div>
                      </div>
                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Birthday</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="birthDate" name="birthDate" placeholder="0" value="<?php echo set_value('birthDate')?>">
                          <div class="error"><?php echo form_error('birthDate') ?></div>
                        
                        </div>

                      </div>
                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <?php $gender = set_value('gender'); ?>
                          <select class="form-control" name="gender" id="gender">
                            <option value="">Select gender</option>
                            <option value="1" <?=($gender == '1')?'selected' : ''?>>Girl</option>

                            <option value="2" <?=($gender == '2')?'selected' : ''?>>Boy</option>
                          </select>
                          <div class="error"><?php echo form_error('gender') ?></div>
                        
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sector" class="col-sm-2 col-form-label">Sector</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?php echo set_value('sector')?>" class="form-control" id="sector" name="sector" placeholder="Sector">
                          <div class="error"><?php echo form_error('sector') ?></div>
                        
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="barangay" class="col-sm-2 col-form-label">Barangay</label>
                        <div class="col-sm-10">
                         <input class="form-control" name="barangay" id="barangay">
                          <div class="error"><?php echo form_error('barangay') ?></div>
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="municipality" class="col-sm-2 col-form-label">Municipality</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="municipality" id="municipality">
                          <div class="error"><?php echo form_error('municipality') ?></div>
                            
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="province" class="col-sm-2 col-form-label">Province</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="province" id="province">
                            
                          <div class="error"><?php echo form_error('province') ?></div>
                        </div>
                      </div>

                      <!--
                      <div class="form-group row">
                        <label for="barangay" class="col-sm-2 col-form-label">Barangay</label>
                        <div class="col-sm-10">
                         <select class="form-control" name="barangay" id="barangay">
                          <option>Name of barangay</option>
                         </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="municipality" class="col-sm-2 col-form-label">Municipality</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="municipality" id="municipality">
                            <option>Name of municipality</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="province" class="col-sm-2 col-form-label">Province</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="province" id="province">
                            <option>Name of province</option>
                          </select>
                        </div>
                      </div>
                      -->
                      <div class="row">
                    <span class="col-sm-2"></span><div class="col-sm-10">
                      <button class="btn btn-danger" type="submit">Save</button>

                    </div>
    
                      </div>
                    
            </form>
                  </div>
                  <div class="tab-pane" id="parent">
                    
                  </div>
                  <div class="tab-pane" id="weigh">
                    
                  </div>
                  <div class="tab-pane" id="done">
                  </div>
                  <!-- /.tab-pane -->

            </div>
      		</div>
      	</div>
      </div>
  	</section>




	</div>