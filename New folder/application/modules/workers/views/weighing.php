
                        <div class="form-container d-none">

                          <form method="post" action="javascript:void(0)" id="form-weighing">
                            <div class="row">
                              <div class="col-md-3"></div>
                              <div class="col-md-9"><span class="results"></span></div>
                            </div>

                          <hr>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-6">
                                
                            <div class="row form-group">
                              <label class="col-md-3">School Year</label>
                              <div class="col-md-9">
                                <select class="form-control class-schedule" id="select-add-weighing-schoolyear" name="year_id" required>
                                  <option value="0">Select school year here...</option>
                                   <?php if (!empty($myschoolyear)): ?>
                                <?php foreach ($myschoolyear as $key => $value): ?>
                                  <option value="<?=$value->year_id?>"><?=tomdy($value->class_start)?> to <?=tomdy($value->class_end)?></option>
                                <?php endforeach ?>
                              <?php endif ?>
                                </select>
                              </div>
                            </div>
                              </div>
                              <div class="col-md-6">
                                
                            <div class="row form-group">
                              <label class="col-md-3">Student Name</label>
                              <div class="col-md-9">
                                <select class="form-control" id="select-add-weighing-student" name="student_id" required>
                                  <option value="0">Select student here...</option>
                                </select>
                              </div>
                            </div>
                              </div>
                            </div>
                          </div>

                            <div class="row">
                              <div class="col-md-12 upon-entry">
                                <div class="row">
                                  
                                  <div class="col-md-3">
                                    <label>Weighing type</label>
                                      <select class="form-control class-schedule" id="select-add-weighing-type" name="year_id" required>

                                        <option value="1" selected>Upon Entry</option>
                                        <option value="2">20 days after</option>
                                        <option value="3">40 days after</option>
                                        <option value="4">Terminal</option>
                                        <option value="5">Extend</option>
                                      </select>
                                  </div>
                                 <div class="col-md-3">
                                  <label>Date weighing</label>
                                  <input type="date" name="date_weighing" class="form-control birthday"></div>
                                  <div class="col-md-3">
                                    <label>Weight</label><input type="number" value="0.00" step=".01" name="weight" id="weight"  class="form-control" placeholder="weight" required></div>
                                  <div class="col-md-3">
                                    <label>Height</label><input type="number"  value="0.00" step=".01" class="form-control" id="height" name="height"  id="height" placeholder="height" required></div>
                              
                                </div>

                              </div><!-- //class upon-entry -->


                              
                              

                            </div>


                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9">
                                <input type="hidden" name="form" value="add-weighing">
                                <input type="submit" name="btnSave" value="Save" class="btn btn-outline-primary"></div>
                            </div>
                          </form>
                        </div>