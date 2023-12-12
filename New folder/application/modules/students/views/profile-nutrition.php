  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pupil Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pupil Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="container-fluid profile">
      <div class="row">
        <div class="col-md-3">
          
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="profile-username text-center"><select class="form-control" id="select-student-profile" style="border:none; background: #ffffff;text-align: center;font-size: 16px;">
                  <?php if (!empty($liststudents)): ?>
                    <?php foreach ($liststudents as $key => $value): ?>
                      <?php if ($value->student_id === $pupilsId): ?>
                  <option value="<?=$value->student_id?>" selected><?=$value->student_name?></option>
                        <?php else: ?>
                  <option value="<?=$value->student_id?>"><?=$value->student_name?></option>

                      <?php endif ?>
                    <?php endforeach ?>
                  <?php else: ?>

                  <option value="<?=$pupilsId?>"><?=$fName.' '.$mName.' '.$lName?></option>
                  <?php endif ?>
                </select></h3>
                
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url('assets')?>/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>


                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Birthday</b> <a class="float-right"><?=tomdy($birthDate)?></a>
                  </li>

                  <li class="list-group-item">
                    <b>Age</b> <a class="float-right"><?=$age->y .' years '.$age->m.' months' ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?=gender($gender)?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Height</b> <a class="float-right"><?=$height?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Weight</b> <a class="float-right"><?=$weight?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right">Normal</a>
                  </li>
                  <li class="list-group-item">
                    <a class="btn btn-default" style="cursor:pointer;">Parent details...</a>
                  </li>
                </ul>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
            <!-- /.col-md-3 -->




        <div class="col-md-9" id="content-body">
          <div class="card card-outline">
            <div class="card-body">
              <div class="tab">
                <div class="tab-content">
                  <div class="tab-pane" id="tabassessment">

                    <ul class="nav nav-pills" id="nav-tab-3">
                      
                      <li class="nav-item">
                        <a class="nav-link active" href="#tab-tab-assessment" data-toggle="tab">Assessment</a>
                      </li><li class="nav-item">
                        <a class="nav-link" href="#tab-tab-charts-raw" data-toggle="tab">Scaled score charts</a>
                      </li>
                      </li><li class="nav-item">
                        <a class="nav-link" href="#tab-tab-charts-standard" data-toggle="tab">Standard score charts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#tab-tab-checklist" data-toggle="tab">Checklist</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      
                  <div class="tab-pane active" id="tab-tab-assessment">


                    <span class="text-title">Assessment</span>
                    <?php $this->load->view('profile-ass-domain'); ?>

                  </div>

                  <div class="tab-pane" id="tab-tab-charts-raw">


                    <span class="text-title">Scaled Score Charts</span>
                    <hr>
                    <?php $this->load->view('profile-ass-raw'); ?>
                    
                  </div>

                  <div class="tab-pane" id="tab-tab-charts-standard">


                    <span class="text-title">Standard</span>
                    <?php $this->load->view('profile-ass-standard'); ?>
                    
                  </div>

                  <div class="tab-pane" id="tab-tab-checklist">


                    <span class="text-title">Checklist</span>
                    <?php $this->load->view('profile-ass-checklist'); ?>
                    
                  </div>

                    </div>
                  </div>
                  <div class="tab-pane active" id="tabnutrition">

                    <ul class="nav nav-pills" id="nav-tab-2">
                      
                      <li class="nav-item">
                        <a class="nav-link active" href="#tab-tab-weighing" data-toggle="tab">Weighing</a>
                      </li><li class="nav-item">
                        <a class="nav-link" href="#tab-tab-charts" data-toggle="tab">Charts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#tab-tab-imunization" data-toggle="tab">Immunization</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#tab-tab-feeding" data-toggle="tab">Feeding</a>
                      </li>

                      <li class="nav-item d-none">
                        <a class="nav-link" href="#tab-tab-weighing-add" data-toggle="tab">Add weighing</a>
                      </li>
                    </ul>

                    <div class="tab-content">
                      <div class="tab-pane" id="tab-tab-charts">
                        <hr>
                        <div class="card">
                          <div class="card-body">
                            

                            <canvas id="weighing-chart"></canvas>
                          </div>
                        </div>
                        
                      </div>
                      <!--- /tab tab charts -->
                      <div class="tab-pane" id="tab-tab-imunization">
                        <hr>
                        <button class="btn btn-outline-primary" type="button" id="btn-add-immunization"><i class="fas fa-plus"></i> Add</button>
                        <hr>
                        <div id="content-table-immunization" class=" table-responsive">
                          
                        <table class="table table-bordered" id="table-immunization">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Date of immunizations</th>
                              <th>Type</th>
                              <th>Description</th>

                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>

                        </div>

                         <div class="form-container d-none" id="content-form-immunization">
                          <hr>
                          <form method="post" action="javascript:void(0)" id="form-immunization">
                            <div class="d-none">
                              <input type="hidden" name="student_id" value="<?=$pupilsId?>">
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9"><span class="errors"></span></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Date of immunization</label>
                              <div class="col-md-9"><input type="date" name="date_immunization" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Type</label>
                              <div class="col-md-9">
                                <select name="type_immunization" id="type_immunization" class="form-control">
                                  <option>Vitamins</option>
                                  <option>Vaccination</option>
                                </select>
                              </div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Description</label>
                              <div class="col-md-9">
                                <input class="form-control" type="text" name="description"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9"><input type="submit" name="btnSave" value="Save" class="btn btn-outline-primary"></div>
                            </div>
                          </form>
                        </div>

                      </div>
                      <!-- /tab tab immunization -->

                                            <div class="tab-pane" id="tab-tab-feeding">
                        <hr>
                        <button class="btn btn-outline-primary" type="button" id="btn-add-feeding"><i class="fas fa-plus"></i> Add</button>
                        <hr>
                        <div id="content-table-feeding">
                          
                        <table class="table table-bordered" id="table-feeding">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Date of Feeding</th>
                              <th>Food</th>
                              <th>Drink</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>

                        </div>

                         <div class="form-container d-none" id="container-feeding">
                          <hr>
                          <form method="post" action="javascript:void(0)" id="form-feeding">
                            <div class="d-none">
                              <input type="hidden" name="student_id" value="<?=$pupilsId?>">
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9"><span class="errors"></span></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Date of feeding</label>
                              <div class="col-md-9"><input type="date" name="date_feeding" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Food</label>
                              <div class="col-md-9"><input type="text" name="foods" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Drink</label>
                              <div class="col-md-9">
                                <input class="form-control" type="text" name="drinks"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9"><input type="submit" name="btnSave" value="Save" class="btn btn-outline-primary"></div>
                            </div>
                          </form>
                        </div>

                      </div>
                      <!-- /tab tab feeding -->
                      <div class="tab-pane active" id="tab-tab-weighing">
                        <hr>
                        <div class="row">
                          <label class="col-md-10">Student Weighing Information</label>
                          <div class="col-md-2">
                            <button class="btn btn-outline-primary btn-sm" type="button" id="btn-add-weighing"><i class="fas fa-plus"></i> Add/Edit</button>
                          </div>
                        </div>
                        <hr>
                        <div class="table-container" id="content-table-weighing">
                        <table class="table table-bordered" id="table-weighing">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Date of weighing
                                <span style="display: block;">(mm/dd/yyyy)</span></th>
                              <th>Weight (kg)</th>
                              <th>Height (cm)</th>
                              <th>WFA</th>
                              <th>HFA</th>
                              <th>WFH</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
  
                        </div>

                      </div>
                      <div class="tab-pane" id="tab-tab-weighing-add">
                        <div class="form-container">
                          <hr>
                          <form method="post" action="javascript:void(0)" id="form-weighing">
                            <div class="d-none">
                              <input type="hidden" name="pupilsId" value="<?=$pupilsId?>">
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9"><span class="errors"></span></div>
                              <div class="col-md-9"><span class="results"></span></div>
                            </div>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Weighing Type</th>
                                  <th>Date of Weighing</th>
                                  <th>Weight</th>
                                  <th>Height</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                <tr>
                                  <td>Upon Entry</td>
                                  <td class="date_weighing_u"><input type="date" value="" class="form-control" id="date_weighing_u"> </td>


                                  <td><input type="text" value="<?=(!empty($weighing['upon_entry']['weight']) ? $weighing['upon_entry']['weight']  : '')?>" name="weight" id="weight_u" class="form-control"></td>
                                  <td><input type="text" value="<?=(!empty($weighing['upon_entry']['height']) ? $weighing['upon_entry']['height']  : '')?>" name="height" id="height_u" class="form-control"></td>

                                  <td><button class="btn btn-sm btn-outline-primary" data-type="u" type="button" id="btn-save-u"><i class="fas fa-save"></i></button></td>
                                </tr>

                                <tr>
                                  <td>20 days</td>
                                  <td class="date_weighing_2"><?=(!empty($weighing['20_days']['date_weighing']) ? date('M d, Y',strtotime($weighing['20_days']['date_weighing'])) : '')?></td>


                                  <td><input type="text" value="<?=(!empty($weighing['20_days']['weight']) ? $weighing['20_days']['weight']  : '')?>" name="weight" id="weight_2" class="form-control"></td>
                                  <td><input type="text" value="<?=(!empty($weighing['20_days']['height']) ? $weighing['20_days']['height']  : '')?>" name="height" id="height_2" class="form-control"></td>

                                  <td><button class="btn btn-sm btn-outline-primary" data-type="2"  type="button" id="btn-save-2"><i class="fas fa-save"></i></button></td>
                                </tr>

                                <tr>
                                  <td>40 days</td>
                                  <td class="date_weighing_4"><?=(!empty($weighing['40_days']['date_weighing']) ? date('M d, Y',strtotime($weighing['40_days']['date_weighing']))  : '')?></td>



                                  <td><input type="text" value="<?=(!empty($weighing['40_days']['weight']) ? $weighing['40_days']['weight']  : '')?>" name="weight" id="weight_4" class="form-control"></td>
                                  <td><input type="text" value="<?=(!empty($weighing['40_days']['height']) ? $weighing['40_days']['height']  : '')?>" name="height" id="height_4" class="form-control"></td>

                                  <td><button class="btn btn-sm btn-outline-primary" data-type="4"  type="button" id="btn-save-4"><i class="fas fa-save"></i></button></td>
                                </tr>

                                <tr>
                                  <td>Terminal</td>
                                  <td class="date_weighing_t"><?=(!empty($weighing['terminal']['date_weighing']) ? date('M d, Y',strtotime($weighing['terminal']['date_weighing']))  : '')?></td>
                                  
                                  <td><input type="text" value="<?=(!empty($weighing['terminal']['weight']) ? $weighing['terminal']['weight']  : '')?>" name="weight" id="weight_t" class="form-control"></td>
                                  <td><input type="text" value="<?=(!empty($weighing['terminal']['height']) ? $weighing['terminal']['height'] : '')?>" name="height" id="height_t" class="form-control"></td>
                                  <td><button class="btn btn-sm btn-outline-primary" data-type="t"  type="button" id="btn-save-t"><i class="fas fa-save"></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                            
                            
                          </form>
                        </div>
                      </div>                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
            <!-- /.col-md-9 -->
    
      </div>
    </section>

  </div>