<div class="content-wrapper">
  

                        <div class="card card-outline-primary" id="ass_card_add">
                          <div class="card-header">
                            <label class="text-title">Student assessment</label>
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
                              <div class="col-md-9"><input type="date" name="date_assessment" id="date_assessment" class="form-control birthday"></div>
                            </div>

                            <div class="row form-group">
                              <label class="col-md-3"></label>
                              <div class="col-md-9">
                                <input type="hidden" name="form" value="add-ass">
                                
                              </div>
                            </div>

                          </form>
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#tabgrossmotor" data-toggle="tab">Gross Motor</a></li>
                  <li class="nav-item"><a class="nav-link " href="#tabfinemotor" data-toggle="tab">Fine Motor</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabselfhelp" data-toggle="tab">Self Help</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabexpressive" data-toggle="tab">Expressive Language</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabreceiptive" data-toggle="tab">Receiptive Language</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabcognitive" data-toggle="tab">Cognitive</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabsocial" data-toggle="tab">Social Emotional</a></li>
                  
                  
                </ul>
    <div class="tab-content">
                       
                    <hr>

                  <div id="tabgrossmotor" class="tab-pane active">
                    <label class="text-title">Gross Motor</label>
                          
                    <table class="table table-bordered" id="tablegrossmotor">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>First</th>
                          <th>Second</th>
                          <th>Third</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($gross_motor)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($gross_motor as $key => $value): ?>
                          <tr data-id="<?=$value->id?>">
                          <td><?=$i++?></td>
                          <td><?=$value->question?></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="gross_motor-1 gross_motor-1-<?=$value->id?>"></td>

                          <td><input type="checkbox" data-id="<?=$value->id?>" class="gross_motor-2 gross_motor-2-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="gross_motor-3 gross_motor-3-<?=$value->id?>"></td>

                          <td></td>
                          
                        </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>
                          <td><button class="btn btn-sm btn-outline-primary btn-save gross_motor-1" data-type="1" data-domain="gross_motor">Save</button></td>
                          <td><buton class="btn btn-sm btn-outline-primary  btn-save gross_motor-2" data-type="2"  data-domain="gross_motor">Save</buton></td>
                          <td><button class="btn btn-sm btn-outline-primary  btn-save gross_motor-3" data-type="3" data-domain="gross_motor">Save</button></td>
                          <td></td>
                        </tr>
                      </tfoot>
                      </tbody>
                    </table>
                  </div> <!---//tab-gross ---->
                  <div id="tabfinemotor" class="tab-pane">
                    <label class="text-title">Fine Motor</label>
                    <hr>
                    <table class="table table-bordered" id="tblfinemotor">
                      

                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>First</th>
                          <th>Second</th>
                          <th>Third</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($fine_motor)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($fine_motor as $key => $value): ?>
                          <tr data-id="<?=$value->id?>">
                          <td><?=$i++?></td>
                          <td><?=$value->question?></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="fine_motor-1 fine_motor-1-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="fine_motor-2 fine_motor-2-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="fine_motor-3 fine_motor-3-<?=$value->id?>"></td>

                          <td></td>
                          
                        </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>

                          <td><button class="btn btn-sm btn-outline-primary btn-save fine_motor-1" data-type="1" data-domain="fine_motor">Save</button></td>
                          <td><buton class="btn btn-sm btn-outline-primary  btn-save fine_motor-2" data-type="2"  data-domain="fine_motor">Save</buton></td>
                          <td><button class="btn btn-sm btn-outline-primary  btn-save fine_motor-3" data-type="3" data-domain="gross_motor">Save</button></td>
                          <td></td>
                        </tr>
                      </tfoot>

                    </table>
                  </div> <!---//tab-gross ---->
                  <div id="tabselfhelp" class="tab-pane">
                    <label class="text-title">Self Help</label>
                    <hr>
                    <table class="table table-bordered" id="tblselfhelp">


                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>First</th>
                          <th>Second</th>
                          <th>Third</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($self_help)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($self_help as $key => $value): ?>
                          <tr data-id="<?=$value->id?>">
                          <td><?=$i++?></td>
                          <td><?=$value->question?></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="self_help-1 self_help-1-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="self_help-2 self_help-2-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="self_help-3 self_help-3-<?=$value->id?>"></td>

                          <td></td>
                          
                        </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>

                          <td><button class="btn btn-sm btn-outline-primary btn-save self_help-1" data-type="1" data-domain="self_help">Save</button></td>
                          <td><buton class="btn btn-sm btn-outline-primary  btn-save self_help-2" data-type="2"  data-domain="self_help">Save</buton></td>
                          <td><button class="btn btn-sm btn-outline-primary  btn-save self_help-3" data-type="3" data-domain="gross_motor">Save</button></td>
                          <td></td>
                        </tr>
                      </tfoot>                    </table>
                  </div> <!---//tab-gross ---->
                  <div id="tabexpressive" class="tab-pane">
                    <label class="text-title">Expressive Language</label>
                    <hr>
                    <table class="table table-bordered" id="tblexpressive">
                      

                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>First</th>
                          <th>Second</th>
                          <th>Third</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($expressive_lang)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($expressive_lang as $key => $value): ?>
                          <tr data-id="<?=$value->id?>">
                          <td><?=$i++?></td>
                          <td><?=$value->question?></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="expressive_lang-1 expressive_lang-1-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="expressive_lang-2 expressive_lang-2-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="expressive_lang-3 expressive_lang-3-<?=$value->id?>"></td>

                          <td></td>
                          
                        </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>

                          <td><button class="btn btn-sm btn-outline-primary btn-save expressive_lang-1" data-type="1" data-domain="expressive_lang">Save</button></td>
                          <td><buton class="btn btn-sm btn-outline-primary  btn-save expressive_lang-2" data-type="2"  data-domain="expressive_lang">Save</buton></td>
                          <td><button class="btn btn-sm btn-outline-primary  btn-save expressive_lang-3" data-type="3" data-domain="gross_motor">Save</button></td>
                          <td></td>
                        </tr>
                      </tfoot>
                                          </table>
                  </div> <!---//tab-gross ---->
                  <div id="tabreceiptive" class="tab-pane">
                    <label class="text-title">Receiptive Language</label>
                    <hr>
                    <table class="table table-bordered" id="tblreceiptive">
                      

                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>First</th>
                          <th>Second</th>
                          <th>Third</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($receiptive_lang)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($receiptive_lang as $key => $value): ?>
                          <tr data-id="<?=$value->id?>">
                          <td><?=$i++?></td>
                          <td><?=$value->question?></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="receiptive_lang-1 receiptive_lang-1-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="receiptive_lang-2 receiptive_lang-2-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="receiptive_lang-3 receiptive_lang-3-<?=$value->id?>"></td>

                          <td></td>
                          
                        </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>

                          <td><button class="btn btn-sm btn-outline-primary btn-save receiptive_lang-1" data-type="1" data-domain="receiptive_lang">Save</button></td>
                          <td><buton class="btn btn-sm btn-outline-primary  btn-save receiptive_lang-2" data-type="2"  data-domain="receiptive_lang">Save</buton></td>
                          <td><button class="btn btn-sm btn-outline-primary  btn-save receiptive_lang-3" data-type="3" data-domain="gross_motor">Save</button></td>
                          <td></td>
                        </tr>
                      </tfoot>

                    </table>
                  </div> <!---//tab-gross ---->
                  <div id="tabcognitive" class="tab-pane">
                    <label class="text-title">Cognitive</label>
                    <hr>
                    <table class="table table-bordered" id="tblcognitive">
                      

                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>First</th>
                          <th>Second</th>
                          <th>Third</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($cognitive)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($cognitive as $key => $value): ?>
                          <tr data-id="<?=$value->id?>">
                          <td><?=$i++?></td>
                          <td><?=$value->question?></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="cognitive-1 cognitive-1-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="cognitive-2 cognitive-2-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="cognitive-3 cognitive-3-<?=$value->id?>"></td>

                          <td></td>
                          
                        </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>

                          <td><button class="btn btn-sm btn-outline-primary btn-save cognitive-1" data-type="1" data-domain="cognitive">Save</button></td>
                          <td><buton class="btn btn-sm btn-outline-primary  btn-save cognitive-2" data-type="2"  data-domain="cognitive">Save</buton></td>
                          <td><button class="btn btn-sm btn-outline-primary  btn-save cognitive-3" data-type="3" data-domain="gross_motor">Save</button></td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div> <!---//tab-gross ---->
                  <div id="tabsocial" class="tab-pane">
                    <label class="text-title">Social Emotional</label>
                    <hr>
                    <table class="table table-bordered" id="tblsocial">
                     

                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>First</th>
                          <th>Second</th>
                          <th>Third</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($social_emotion)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($social_emotion as $key => $value): ?>
                          <tr data-id="<?=$value->id?>">
                          <td><?=$i++?></td>
                          <td><?=$value->question?></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="social_emotion-1 social_emotion-1-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="social_emotion-2 social_emotion-2-<?=$value->id?>"></td>
                          <td><input type="checkbox" data-id="<?=$value->id?>" class="social_emotion-3 social_emotion-3-<?=$value->id?>"></td>

                          <td></td>
                          
                        </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>

                          <td><button class="btn btn-sm btn-outline-primary btn-save social_emotion-1" data-type="1" data-domain="social_emotion">Save</button></td>
                          <td><buton class="btn btn-sm btn-outline-primary  btn-save social_emotion-2" data-type="2"  data-domain="social_emotion">Save</buton></td>
                          <td><button class="btn btn-sm btn-outline-primary  btn-save social_emotion-3" data-type="3" data-domain="gross_motor">Save</button></td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div> <!---//tab-gross ---->
                            
                 </div>
                          </div>
                        </div>


</div>