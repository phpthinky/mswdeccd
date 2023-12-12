                        
                    <!-- The timeline -->
                    <div class="card">  
                      <div class="card-header">
                        <div class="row">
                          <div class="col-md-10"><label class="text-title">
                        Student Nutrition Status</label></div>
                          <div class="col-md-2">
                          <button class="btn btn-outline-primary btn-sm d-none" type="button" id="btn-add-weighing"><i class="fas fa-plus"></i> Add</button> 
                          <button class="btn btn-outline-success btn-sm" type="button" id="btn-export-student-nutritions"><i class="fas fa-table"></i> Export</button>
                        </div>
                        </div>

                      </div>
                      <div class="card-body">
                        

                          <form id="frm_nutritions" method="post" action="javascript:void(0)">
                        <div class="row">
                          <div class="col-md-4 col-sm-12 col-xs-12">
                          <select class="form-control class-schedule" name="class_schedule" id="nutritions-classess">
                            <option value="0">Select classes</option>
                              <?php if (!empty($myschoolyear)): ?>
                                <?php foreach ($myschoolyear as $key => $value): ?>
                                  <option value="<?=$value->year_id?>"><?=tomdy($value->class_start)?> to <?=tomdy($value->class_end)?></option>
                                <?php endforeach ?>
                              <?php endif ?>
                            

                          </select>
                        </div>

                       <div class="col-sm-2">
                          <select class="form-control" name="date_weighing" id="n_date_weighing">
                          <option value="1">Upon Entry</option>
                          <option value="2">After 20 days</option>
                          <option value="3">After 40 days</option>
                          <option value="4">Terminal</option>
                        </select>

                      </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring_nutritions" placeholder="Search here...">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                        </div>
                        
                        </div>
                        </form>

                        <table class="table table-bordered" id="tbl-nutritions">
                          <thead>
                            <tr>

                              <th>#</th>
                              <th>NAME</th>
                              <th>DATE OF WEIGHING</th>
                              <th>WEIGHT</th>
                              <th>HEIGHT</th>
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
                      <div class="info-box">
                        <hr>
                        <p>WFA = child weight over ideal weight multiplied by 100</p>
                        <p>HFA = child height over ideal height multiplied by 100</p>
                        <p>WFH = child weight over ideal weight base on child height multiplied by 100</p>

                      </div>

                    </div>
                    <!-- /.timeline -->