
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daycare Center</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daycare center</li>
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
                  <li class="nav-item"><a class="nav-link <?=(!empty($action) ? '' : 'active')?>" href="#home" data-toggle="tab">Daycare Center</a></li>
                  <li class="nav-item"><a class="nav-link <?=(!empty($action) ? 'active' : '')?>" href="#addCenter" data-toggle="tab">Add Center</a></li>
                </ul>


          </div>
          <div class="card-body">
            <div class="tab-content">

                            <div class="tab-pane <?=(!empty($action) ? '' : 'active')?>" id="home">
                              



                        <div class="row">
                          <?php $bg = array('bg-primary','bg-success','bg-info','bg-default','bg-danger','bg-warning') ?>
                          <?php $i=0;?>
                          <?php foreach ($centers as $key => $value): ?>
                            <?php if ($i >=5): ?>
                              <?php $i=0; ?>
                            <?php endif ?>
                          <div class="col-md-4">
                            
                            <div class="card mt-4" id="card-id-<?=$value->centerId?>">
                              <div class="card-header border-bottom-0 <?=$bg[$i]?>">
                                <button class="close btn-close-center" data-id="<?=$value->centerId?>"><i class="fas fa-times"></i> </button>
                                <div class="card-blosckcard-title "><?=$value->centerName?> </div>
                              </div>
                              <div class="card-body">
                                <ul class="list-group">
                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Workers
                                    <span class="badge badge-primary badge-pill">0</span>
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Pupils
                                    <span class="badge badge-primary badge-pill">0</span>
                                  </li>
                                </ul>

                              </div>
                            </div>

                          </div>
                            <?php $i++?>
                          <?php endforeach ?>
                        </div>

                            </div>
            <div class="tab-pane <?=(!empty($action) ? 'active' : '')?>" id="addCenter">
              <form class="form-horizontal" method="POST" action="<?=site_url('centers/add')?>">


                          <?php echo validation_errors(); ?>
                          <?php if(!empty($hasErrors)) echo $hasErrors; ?>
                <div class="d-none">
                  <input type="hidden" name="workersId" value="0">
                </div>
                <div class="form-group row">
                  <label class="col-sm-2">Name of Center</label>
                  <div class="col-sm-10">
                    <input type="text" name="centerName" id="centerName" class="form-control" placeholder=" Name of Center">
                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Barangay</label>
                  <div class="col-sm-10">
                    <select class="form-control">
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
                  <label class="col-sm-2">Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="centerAddress" id="centerAddress" class="form-control" placeholder="Location of Center">
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
