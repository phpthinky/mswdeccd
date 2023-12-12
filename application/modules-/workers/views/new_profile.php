  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Worker Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Worker profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <?php if (!empty($info)): ?>

                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url('assets/img/user.png')?>"
                       alt="User profile picture">
                <?php endif ?>
                </div>
                <?php if (!empty($info)): ?>
                <h3 class="profile-username text-center"><?=$info->fName.' '.$info->mName.' '.$info->lName?></h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?=$info->email?></a>
                  </li>

                  <li class="list-group-item">
                    <b>Birthday</b> <a class="float-right"><?=date('M d,Y',strtotime($info->birthDate))?></a>
                    
                  </li>

                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?=gender($info->gender)?></a>
                  </li>
               </ul>

                <?php endif ?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary card-outline">
              
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-university mr-1"></i> Assigned Center</strong>

                <p class="text-muted">
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted"><?=$info->address?></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted"></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-m-8">
            <div class="card card-primary card-outline">

              <div class="card-body box-profile">
                <table class="table w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>School Year</th>
                      <th>Total Students</th>
                      <th>Status</th>
                      <th></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($myschoolyear)): ?>
                      <?php foreach ($myschoolyear as $key => $row): ?>
                        <tr>
                          <td><?=$key+1?></td>
                          <td><?=tomdy($row->class_start).'-'.tomdy($row->class_end)?></td>
                          <td><?=$row->total_students?></td>
                          <td></td>
                          <td><a href="<?=site_url('workers/my_students/'.$worker_id.'/'.$row->year_id)?>" title="View students" class="btn btn-default btn-sm"><i class="fa fa-list"></i></a> <button title="Delete from my list" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->