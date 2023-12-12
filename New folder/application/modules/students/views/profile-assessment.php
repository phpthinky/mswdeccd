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
                  <div class="tab-pane active" id="tabassessment">

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