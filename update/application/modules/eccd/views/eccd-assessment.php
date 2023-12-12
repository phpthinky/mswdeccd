    <section class="content">
                    <!-- The timeline -->
                    <div class="card" id="ass_card_view">  
                      <div class="card-header">

                      </div>
                      <div class="card-body">
                        

                          <form id="frm_assessment" method="post" action="javascript:void(0)">
                        <div class="row">

                      <div class="col-md-2">
                        <label for="centersOption_ass">Center</label>

                          <select class="form-control" name="centersOption" id="centersOption_ass">
                          <option value="">All center</option>
                          <?php foreach ($centers as $key => $value): ?>
                            <option value="<?=$value->centerId?>"><?=$value->centerName?></option>
                          <?php endforeach ?>
                            </select>
                      </div>
                       <div class="col-md-2">
                        <label for="workersOption_ass">Worker</label>
                          <select class="form-control" name="workersOption" id="workersOption_ass">
                          <option value="">All worker</option>
                          
                          <?php foreach ($workers as $key => $value): ?>
                            <option value="<?=$value->workersId?>"><?=$value->workerName?></option>
                          <?php endforeach ?>
                        </select>
                          </div>

                       <div class="col-md-2">
                        <label for="school_year_ass">School Year</label>
                          <select class="form-control" name="school_year" id="school_year_ass">
                          <?php if (  !empty($schoolyears)): ?>
                            
                                <?php foreach ($schoolyears as $key => $value): ?>
                                  <option value="<?=$value->YearId  ?>"><?=tomdy($value->YearStart)?> to <?=tomdy($value->YearEnd )?></option>
                                <?php endforeach ?>

                          <?php endif ?>
                        </select>
                      </div>
                       <div class="col-md-2">
                        <label for="ass_type">Assessment type</label>
                          <select class="form-control" name="type" id="ass_type">
                          <option value="1">First assessment</option>
                          <option value="2">Second assessment</option>
                          <option value="3">Final assessment</option>
                        </select>

                      </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                        <label for="ass_type">Search</label>
                          
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring_assessement" placeholder="Search here...">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                        </div>
                        
                        </div>
                        </form>
<hr>
                  <div class="row">

                    <div class="col-md-8 col-lg-8"><label class="text-title worker-text-title">Pupils Assessment</label></div>
                    
                      <div class="col-md-4 col-lg-4 buttons" style="padding: 5px;text-align: right;">


                          <button class="btn btn-outline-success btn-sm" type="button" id="btn-excel_ass"><i class="fas fa-table"></i> Export</button>

                      </div>
                  </div>
                        <hr>
                        <table class="table table-bordered" id="table-assessment">
                          
                          <thead>
                            <tr>
                              <th>Student</th>
                              <th>Date of Assessment</th>
                              <th>Scaled Score</th>
                              <th>Standard Score</th>
                              

                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($standard_score)): ?>
                              
                            <?php foreach ($variable as $key => $value): ?>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                        </table>

                      </div>
                      <div class="info-box">
                        <hr>

                      </div>

                    </div>
                    <!-- /.timeline -->


                      </section>