
                    <!-- The timeline -->
                    <div class="card" id="ass_card_view">  
                      <div class="card-header">
                        <div class="row">
                          <div class="col-md-10"><label class="text-title">
                        Student Assessments</label></div>
                          <div class="col-md-2">
                          <button class="btn btn-outline-primary btn-sm" type="button" id="btn-add-assessment"><i class="fas fa-plus"></i> Add</button> 
                          <button class="btn btn-outline-success btn-sm" type="button" id="btn-export-student-assessment"><i class="fas fa-table"></i> Export</button>
                        </div>
                        </div>

                      </div>
                      <div class="card-body">
                        

                          <form id="frm_assessment" method="post" action="javascript:void(0)">
                        <div class="row">
                          <div class="col-md-4 col-sm-12 col-xs-12">
                          <select class="form-control class-schedule" name="class_schedule" id="assessment-classess">
                            <option value="0">Select classes</option>
                              <?php if (!empty($myschoolyear)): ?>
                                <?php foreach ($myschoolyear as $key => $value): ?>
                                  <option value="<?=$value->year_id?>"><?=tomdy($value->class_start)?> to <?=tomdy($value->class_end)?></option>
                                <?php endforeach ?>
                              <?php endif ?>
                            

                          </select>
                        </div>

                       <div class="col-sm-2">
                          <select class="form-control" name="date_assessment" id="as_date_assessment">
                          <option value="1">First assessment</option>
                          <option value="2">Second assessment</option>
                          <option value="3">Final assessment</option>
                        </select>

                      </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring_assessement" placeholder="Search here...">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                        </div>
                        
                        </div>
                        </form>

                        
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Student ID#</th>
                              <th>AY</th>
                              <th>Date of Assessment</th>
                              <th>Scaled Score</th>
                              <th>Standard Score</th>
                              

                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>

                      </div>
                      <div class="info-box">
                        <hr>

                      </div>

                    </div>
                    <!-- /.timeline -->


                        <div class="card card-outline-primary d-none" id="ass_card_add">
                          <div class="card-header">
                            <label class="text-title">Add new assessent</label>
                          </div>
                          <div class="card-body">
                            
                            
                                                      <form method="post" action="javascript:void(0)" id="form-assessment">
                            <div class="row">
                              <div class="col-md-3"></div>
                              <div class="col-md-9"><span class="results"></span></div>
                            </div>

                          <hr>
                            <div class="row form-group">
                              <label class="col-md-3">School Year</label>
                              <div class="col-md-9">
                                <select class="form-control class-schedule" id="select-add-ass-schoolyear" name="year_id" required>
                                  <option value="0">Select school year here...</option>
                                   <?php if (!empty($myschoolyear)): ?>
                                <?php foreach ($myschoolyear as $key => $value): ?>
                                  <option value="<?=$value->year_id?>"><?=tomdy($value->class_start)?> to <?=tomdy($value->class_end)?></option>
                                <?php endforeach ?>
                              <?php endif ?>
                                </select>
                              </div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Student Name</label>
                              <div class="col-md-9">
                                <select class="form-control" id="select-add-ass-student" name="student_id" required>
                                  <option value="0">Select student here...</option>
                                </select>
                              </div>
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3">Date of assessment</label>
                              <div class="col-md-9"><input type="date" name="date_assessment" class="form-control birthday"></div>
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9">
                                <input type="hidden" name="form" value="add-ass">
                                
                              </div>
                            </div>

                            <table class="table table-bordered">
                              <thead>
                                                              <tr>
                                <th>Domain</th>
                                <th>Raw Score</th>
                                <th>Scaled Score</th>
                              </tr>

                              </thead>
                              <tbody>
                                <tr>
                                <td>Gross</td>
                                <td><input class="form-control raw-score" type="number"  name="gross_motor" step="1"></td>
                                <td><input class="form-control" name="gross_motor_s" type="number" readonly></td>
                              </tr>
                                <tr>
                                <td>Fine</td>
                                <td><input class="form-control raw-score" type="number"  name="fine_motor" step="2"></td>
                                <td><input class="form-control " name="fine_motor_s" type="number" readonly></td>
                              </tr>
                                <tr>
                                <td>Self Help</td>
                                <td><input class="form-control raw-score" type="number"  name="self_help"></td>
                                <td><input class="form-control" name="self_help_s" type="number" readonly></td>
                              </tr>
                                <tr>
                                <td>Receptive Language</td>
                                <td><input class="form-control raw-score" type="number"  name="receiptive_lang"></td>
                                <td><input class="form-control" name="receiptive_lang_s" type="number" readonly></td>
                              </tr>
                                <tr>
                                <td>Expressive Language</td>
                                <td><input class="form-control raw-score" type="number"  name="expressive_lang"></td>
                                <td><input class="form-control" name="expressive_lang_s" type="number" readonly></td>
                              </tr>
                                <tr>
                                <td>Cognitive</td>
                                <td><input class="form-control raw-score" type="number"  name="cognitive"></td>
                                <td><input class="form-control" name="cognitive_s" type="number" readonly></td>
                              </tr>
                                <tr>
                                <td>Social Emotional</td>
                                <td><input class="form-control raw-score" type="number"  name="social_emotion"></td>
                                <td><input class="form-control" name="social_emotion_s" type="number" readonly></td>
                              </tr>
                                <tr>
                                <td>Total Score</td>
                                <td><input class="form-control" name="raw_score"></td>
                                <td><input class="form-control" name="scaled_score"></td>
                              </tr>
                                <tr>
                                <td></td>
                                <td><input type="submit" name="btnSave" value="Save" class="btn btn-outline-primary">
                                <input type="button" name="btnCancel" id="btn-cancel-ass" value="Cancel" class="btn btn-outline-primary"></td>
                                <td></td>
                              </tr>
                              </tbody>
                            </table>
                          </form>


                          </div>
                        </div>