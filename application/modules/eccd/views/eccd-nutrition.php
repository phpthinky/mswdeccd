            <div class="card">
              <div class="card-header">
    <label class="text-title">Child Nutrition</label>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-2">
                        <label for="centersOption">Center</label>

                          <select class="form-control" name="centersOption" id="centersOption">
                          <option value="">-</option>
                          <?php foreach ($centers as $key => $value): ?>
                            <option value="<?=$value->centerId?>"><?=$value->centerName?></option>
                          <?php endforeach ?>
                            </select>
                      </div>
                       <div class="col-sm-2">
                        <label for="workersOption">Worker</label>
                          <select class="form-control" name="workersOption" id="workersOption">
                          <option value="">-</option>
                          
                          <?php foreach ($workers as $key => $value): ?>
                            <option value="<?=$value->workersId?>"><?=$value->workerName?></option>
                          <?php endforeach ?>
                        </select>
                          </div>

                       <div class="col-sm-2">
                        <label for="school_year">School Year</label>
                          <select class="form-control" name="school_year" id="school_year">
                          <option value="0">-</option>
                          <?php if (  !empty($schoolyears)): ?>
                            
                                <?php foreach ($schoolyears as $key => $value): ?>
                                  <option value="<?=$value->YearId  ?>"><?=tomdy($value->YearStart)?> to <?=tomdy($value->YearEnd )?></option>
                                <?php endforeach ?>

                          <?php endif ?>
                        </select>
                      </div>

                       <div class="col-sm-2">
                        <label for="workersOption">Weighing</label>
                          <select class="form-control" name="date_weighing" id="date_weighing">
                          <option value="0">-</option>
                          <option value="1">Upon Entry</option>
                          <option value="2">After 20 days</option>
                          <option value="3">After 40 days</option>
                          <option value="4">Terminal</option>
                        </select>

                      </div>
                       <div class="col-sm-4 no-print">
                        <label for="searchstring">Search</label>
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">

                    <div class="col-md-8 col-lg-8"><label class="text-title worker-text-title">Pupils Nutrition Status Upon Entry</label></div>
                    
                      <div class="col-md-4 col-lg-4 buttons" style="padding: 5px;text-align: right;">
                        <button class="btn btn-outline-success btn-sm" id="btn-print"><i class="fas fa-print"></i> Print</button>
                        <button class="btn btn-outline-success btn-sm" id="btn-excel"><i class="fas fa-table"></i> Export</button>
                      </div>
                  </div>
                    <div class="container-fluid">
                      <div class="table-responsive">
                        
               <div class="table-responsive">
                  <table id="tblPupils" class="table table-bordered table-striped w-100">
                   
                  <thead>
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>Firt Name</th>
                    <th>Mi</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Birthday</th>
                    <th>Age in Months</th>
                    <th>Sector</th>
                    <th>Deworming Date</th>
                    <th>Vit. A Supp. Date</th>
                    <th>Date of Weighing</th>
                    <th>Weight kg</th>
                    <th>Height cm</th>
                    <th>WFA</th>
                    <th>HFA</th>
                    <th>WFH</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                
               </div>

                      </div>
                    </div>
                  </div>
                  </div>