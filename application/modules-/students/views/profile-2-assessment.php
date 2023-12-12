  <div class="card">
    <div class="card-header"> Class of <?=$classess?> - Assessment</div>
    <div class="card-body">

                    <div class="row">
                     <div class="d-none">
                      <input type="hidden" name="YearId2" id="txtYearId-2" value="<?=$YearId?>">
                     </div>
                       <div class="col-sm-12">
                        <label class="col-sm-4">Search</label>
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring2" id="searchstring-2">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go-2">Go!</button>
                  </span>
                </div>

                      </div>
                    </div>
      <div class="form-responsive">
<hr>
<label>Scaled Score Table</label>
<div class="table-responsive">
  
      <table id="tblPupilsAssessment" class="table table-bordered table-striped w-100">
                  <thead>
                  <tr>

                    <th  style="width:50px !important">ID</th>
                    <th>Name</th>
              <th>Grow Motor</th>
              <th>Fine Motor</th>
              <th>Self Help</th>
              <th>Receptive</th>
              <th>Expressive</th>
              <th>Cognitive</th>
              <th>Social Emotional</th>
              <?php if (!$this->aauth->is_admin()): ?>
                
                    <th style="max-width: 100px;">Action</th>
              <?php endif ?>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
                

</div>
    </div>
    </div>
</div>