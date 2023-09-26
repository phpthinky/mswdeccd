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
                <h3 class="profile-username text-center"><?=$fName.' '.$mName.' '.$lName?></h3>
                
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
                    <b>Gender</b> <a class="float-right"><?=($gender == 1) ? 'Boy' : 'Girl'?></a>
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
          
          <div class="card card-primary card-outline">
          <div class="card-header">
            
                <ul class="nav nav-pills nav-justified" id="nav-tab">
                  <li class="nav-item"><a class="nav-link" href="#tabassessment" data-toggle="tab">Assessments</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#tabnutrition" data-toggle="tab">Nutrition Status</a></li>
                </ul>

          </div>  
          </div>


          <div class="card card-outline">
            <div class="card-body">
              <div class="tab">
                <div class="tab-content">
                  <div class="tab-pane" id="tabassessment">
                    <span class="text-title">Assessment</span>
                  </div>
                  <div class="tab-pane active" id="tabnutrition">
                    <ul class="nav nav-pills" id="nav-tab-2">
                      <li class="nav-item">
                        <a class="nav-link" href="#tab-tab-charts" data-toggle="tab">Charts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#tab-tab-feeding" data-toggle="tab">Feeding</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#tab-tab-weighing" data-toggle="tab">Weighing</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane" id="tab-tab-charts">
                        <hr>
                        
                      </div>
                      <!--- /tab tab charts -->
                      <div class="tab-pane" id="tab-tab-feeding">
                        <hr>
                        <button class="btn btn-outline-primary" type="button" id="btn-add-feeding"><i class="fas fa-plus"></i> Add</button>
                        <hr>
                        <div id="content-table-feeding">
                          
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Date of Feeding 
                              <span style="display: block;">(mm/dd/yyyy)</span></th>
                              <th></th>

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
                              <input type="hidden" name="pupilsId" value="<?=$pupilsId?>">
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9"><span class="errors"></span></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Date of feeding</label>
                              <div class="col-md-9"><input type="date" name="feeding_date" class="form-control"></div>
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
                      <div class="tab-pane" id="tab-tab-weighing">
                        <hr>
                        <button class="btn btn-outline-primary" type="button" id="btn-add-weighing"><i class="fas fa-plus"></i> Add</button>
                        <hr>
                        <div class="table-container" id="content-table-weighing">
                        <table class="table table-bordered" id="table-weighing">
                          <thead>
                            <tr>
                              <th>ID</th>
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
                            <?php if (!empty($weighing)): ?>
                              <?php foreach ($weighing as $key => $value): ?>
                              <tr>
                                <td><?=$value->weighingId?></td>
                                <td><?=tomdy($value->weighingSchedule)?></td>
                                <td><?=$value->weight?></td>
                                <td><?=$value->height?></td>
                                <td><?=$value->wfa?></td>
                                <td><?=$value->hfa?></td>
                                <td><?=$value->wfh?></td>
                                <td><a class="btn btn-sm btn-default" href="#"><i class="fas fa-edit"></i></a><a class="btn btn-sm btn-default" href="#"><i class="fas fa-trash"></i></a></td>
                              </tr>                                
                              <?php endforeach ?>                              
                            <?php endif ?>
                          </tbody>
                        </table>
  
                        </div>
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
                            <div class="row form-group">
                              <label class="col-md-3">Date of weighing</label>
                              <div class="col-md-9"><input type="date" name="dateOfWeighing" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Weigh kg</label>
                              <div class="col-md-9"><input type="number" name="weight" id="weight"  class="form-control"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Height cm</label>
                              <div class="col-md-9">
                          <input type="number" class="form-control" id="height" name="height"  id="height" placeholder="0">
                               
                               </div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9"><input type="submit" name="btnSave" value="Save" class="btn btn-outline-primary"> <button id="btn-calculate" type="button">calculate</button></div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
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