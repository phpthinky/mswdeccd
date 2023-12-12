
                        <div class="form-container">

                          <form method="post" action="javascript:void(0)" id="form-weighing">
                            <div class="row">
                              <div class="col-md-3"></div>
                              <div class="col-md-9"><span class="results"></span></div>
                            </div>

                          <hr>
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
                            <div class="row form-group">
                              <label class="col-md-3">Student Name</label>
                              <div class="col-md-9">
                                <select class="form-control" id="select-add-weighing-student" name="student_id" required>
                                  <option value="0">Select student here...</option>
                                </select>
                              </div>
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3">Date of weighing</label>
                              <div class="col-md-9"><input type="date" name="date_weighing" class="form-control birthday"></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Weigh kg</label>
                              <div class="col-md-9"><input type="number" value="0.00" step=".01" name="weight" id="weight"  class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3">Height cm</label>
                              <div class="col-md-9">
                          <input type="number"  value="0.00" step=".01" class="form-control" id="height" name="height"  id="height" placeholder="0" required>
                               
                               </div>
                            </div>
                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9">
                                <input type="hidden" name="form" value="add-weighing">
                                <input type="submit" name="btnSave" value="Save" class="btn btn-outline-primary"></div>
                            </div>
                          </form>
                        </div>