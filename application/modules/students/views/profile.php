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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url('assets')?>/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$fName.' '.$mName.' '.$lName?></h3>

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
                </ul>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?=(!empty($nameofschool) ? $nameofschool : 'Name of school')?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted"><?=$address?></p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Father</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Father occupation</span>
                </p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Mother</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Mother occupation</span>
                </p>

                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                <p><a class="nav-link" href="#"><i class="fas fa-pencil-alt"></i>&nbsp;Edit personal details.</a></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="card">  
                      <div class="card-header"></div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Weighing ID</th>
                              <th>Date of weighing (m/d/yyyy)</th>
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
                    </div>
                    <!-- /.timeline -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <div class="errors"></div>
                    <form class="form-horizontal" method="POST" action="<?=site_url('students/addstudentweighing')?>" id="frmaddweighing">
                          <div class="d-none">
                            <input type="hidden" name="pupilsId" value="<?=$id?>">
                          </div>
                      <div class="form-group row">
                        <label for="scheduleId" class="col-sm-12 col-form-label">Date of weighing</label>
                        <div class="col-sm-12">
                          <select class="form-control" name="scheduleId" id="scheduleId">
                            <option value="">Select date</option>
                            <?php if (!empty($listschedules)): ?>
                              <?php foreach ($listschedules as $key => $value): ?>
                                <option value="<?=$value->id?>"><?=$value->date?></option>
                              <?php endforeach ?>
                            <?php endif ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="weight" class="col-sm-12 col-form-label">Weight</label>
                        <div class="col-sm-12">
                          <input type="number" class="form-control" id="weight" name="weight" placeholder="0">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="height" class="col-sm-12 col-form-label">Height</label>
                        <div class="col-sm-12">
                           <div class="col-md-9">
                                <input class="form-control" type="number" placeholder="0.00" required name="height" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
"></div>
                        </div>
                      </div>

                      <div class="d-none">
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-12 col-form-label">WFA</label>
                        <div class="col-sm-12">
                          

                          <select class=" form-control " name="wfa">
                            <option>N</option>
                            <option>UW</option>
                            <option>SUW</option>
                          </select>                         </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-12 col-form-label">HFA</label>
                        <div class="col-sm-12">

                          <select class=" form-control " name="hfa">
                            <option>N</option>
                            <option>S</option>
                            <option>SS</option>
                          </select> 

                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-12 col-form-label">WFH</label>
                        <div class="col-sm-12">
                          
                        
                          <select class=" form-control " name="wfh">
                            <option>N</option>
                            <option>W</option>
                            <option>SW</option>
                            <option>OB</option>
                          </select> 

                        </div>
                      </div>

                      </div>

                      <div class="form-group row">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-danger">Add</button>
                        </div>
                      </div>
                    </form>
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