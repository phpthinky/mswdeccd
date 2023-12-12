

      	<div class="card">
      		<div class="card-header">
      			Add new student
      		</div>
      		<div class="card-body">

              
            <div class="tab-content">
              
                  <div class="tab-pane active" id="personaldetails">

        <form class="form-horizontal" id="frmStudents" action="<?=site_url('students/add')?>" method="POST">
                      <div class="row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                          <div class="errors <?php if(!empty($hasErrors)) echo 'alert alert-danger'; ?>" >

                          <?php if(!empty($hasErrors)) echo $hasErrors; ?>
                          </div>
                        </div>
                      </div>
                <div class="form-group row d-none">
                  <label class="col-sm-2">Center</label>
                  <div class="col-sm-10">
                    <input name="centerId" id="centerId" class="form-control" value="<?=$centerId?>">
                      
                  </div>                  
                </div>

                <div class="form-group row d-none">
                  <label class="col-sm-2">Worker</label>
                  <div class="col-sm-10">
                    <input name="workersId" id="workersId" value="<?=$workersId?>" class="form-control">
                      
                  </div>                  
                </div>

                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Student type</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="StudentType" id="sector" required>
                            <option value="1">New</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                                
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" required name="firstName" placeholder="First Name" value="<?php echo set_value('firstName')?>">
                            <input type="text" class="form-control" name="middleName" placeholder="Middle Name" value="<?php echo set_value('middleName')?>">
                            <input type="text" class="form-control" name="lastName" required placeholder="Last Name" value="<?php echo set_value('lastName')?>">
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
                          <input type="date" class="form-control" id="birthDate" name="birthDate" placeholder="0" value="<?php echo set_value('birthDate')?>" required>
                          <div class="error"><?php echo form_error('birthDate') ?></div>
                        
                        </div>

                      </div>
                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <?php $gender = set_value('gender'); ?>
                          <select class="form-control" name="gender" id="gender" required>
                            <option value="">Select gender</option>
                            <option value="1" <?=($gender == '1')?'selected' : ''?>>Female</option>

                            <option value="2" <?=($gender == '2')?'selected' : ''?>>Male</option>
                          </select>
                          <div class="error"><?php echo form_error('gender') ?></div>
                        
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Sector</label>
                        <div class="col-sm-10">
                          <?php $sector = set_value('sector'); ?>
                          <select class="form-control" name="sector" id="sector">
                            <option value="0">Default</option>
                            <option value="2" <?=($sector == '2')?'selected' : ''?>>Single parent</option>
                            <option value="3" <?=($sector == '3')?'selected' : ''?>>IPs</option>
                            <option value="3" <?=($sector == '4')?'selected' : ''?>>4Ps</option>
                            <option value="1" <?=($sector == '1')?'selected' : ''?>>WD</option>
                          </select>
                          <div class="error"><?php echo form_error('sector') ?></div>
                        
                        </div>
                      </div>



                      <div class="form-group row">
                        <label for="barangay" class="col-sm-2 col-form-label">Residential address</label>
                        <div class="col-sm-10">
                         <input class="form-control" placeholder="Residential address" name="address" id="address">
                          <div class="error"><?php echo form_error('address') ?></div>
                        
                        </div>
                      </div>

                      <hr>
                      <input type="hidden" name="YearId" value="<?=$YearId?>">


                      <div class="form-group row">
                        <label for="barangay" class="col-sm-2 col-form-label">Barangay</label>
                        <div class="col-sm-10">
                         <select class="form-control" name="barangay" id="barangay">
                          
                          <option>Arellano</option>
                      <option>Batong Buhay</option>
                      <option>Buenavista</option>
                      <option>Burgos</option>
                      <option>Claudio Salgado</option>
                      <option>Gen. Emillio Aguinaldo</option>
                      <option>Ibud</option>
                      <option>Ilvita</option>
                      <option>Lagnas</option>
                      <option>Ligaya</option>
                      <option>Malisbong</option>
                      <option>Pag-asa</option>
                      <option>Poblacion</option>
                      <option>San Agustin</option>
                      <option>Santa Lucia</option>
                      <option>San Vicente</option>
                      <option>Sato Nino</option>
                      <option>Tagumpay</option>
                      <option>Tuban</option>
                      <option>Victoria</option>
                         </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="municipality" class="col-sm-2 col-form-label">Municipality</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="municipality" id="municipality">
                            <option value="1">Sablayan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="province" class="col-sm-2 col-form-label">Province</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="province" id="province">
                            <option class="1">Occidental Mindoro</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="row">
                    <span class="col-sm-2"></span><div class="col-sm-10">
                      <button class="btn btn-primary" type="submit">Add</button>

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