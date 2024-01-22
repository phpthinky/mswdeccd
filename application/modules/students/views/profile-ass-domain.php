<hr>
<div class="container-fluid">
      <div class="row">
            
      <label class="col-md-10">Scaled Score Table</label>

      <div class="col-md-2">
            
                        <?php if (!$this->aauth->is_admin()): ?>
                          
                          
                        <button class="btn btn-xs btn-outline-primary" type="button" id="btn-add-student-assessment"><i class="fas fa-plus"></i> Add</button>
                        <?php endif ?>
      </div>

      </div>


<div class="table-responsive">
  
      <table id="table-raw-score" class="table table-bordered table-striped w-100">
                  <thead>

                  	<tr>
                  		<th rowspan="4">DOMAIN</th>

                  		<th colspan="2">FIRST ASSESSMENT 
                        <button class="btn btn-xs btn-outline-primary" type="button" id="btn-add-student-assessment"><i class="fas fa-plus"></i></button></th>
                  		<th colspan="2">SECOND ASSESSMENT 
                        <button class="btn btn-xs btn-outline-primary" type="button" id="btn-add-student-assessment"><i class="fas fa-plus"></i></button></th>
                  		<th colspan="2">FINAL ASSESSMENT 
                        <button class="btn btn-xs btn-outline-primary" type="button" id="btn-add-student-assessment"><i class="fas fa-plus"></i></button></th>
                              <th></th>
                  	</tr>

                        <tr>
                              <th colspan="2">DATE: <span id="date-1"></span></th>
                              <th colspan="2">DATE: <span id="date-2"></span></th>
                              <th colspan="2">DATE: <span id="date-3"></span></th>
                              <th></th>
                        </tr>

                  	<tr>
                  		<th colspan="2"><span id="age-1">AGE</span></th>
                  		<th colspan="2"><span id="age-2">AGE</span></th>
                  		<th colspan="2"><span id="age-3">AGE</span></th>
                              <th></th>
                  	</tr>
                  <tr>

              		<th>RAW SCORE</th>
              		<th>SCALED SCORE</th>
              		<th>RAW SCORE</th>
              		<th>SCALED SCORE</th>
              		<th>RAW SCORE</th>
              		<th>SCALED SCORE</th>
                        <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php if (!empty($assessment_data)): ?>
                  		<?php foreach ($assessment_data as $key => $value): ?>
                                    <?php if (!empty($value->domain)): ?>
                                    <tr>
                                          <td><?=$key?></td>
                                          <td><?=$value->raw_score_1?></td>
                                          <td><?=$value->scaled_score_1?></td>
                                          <td><?=$value->raw_score_2?></td>
                                          <td><?=$value->scaled_score_2?></td>
                                          <td><?=$value->raw_score_3?></td>
                                          <td><?=$value->scaled_score_3?></td>
                                          <td><button class="btn btn-sm btn-outline-danger btn-trash-assessment" data-domain="<?=$value->domain?>" data-id="<?=$value->student_id?>"><i class="fas fa-trash"></i></button></td>
                                    </tr> 
                                    <?php endif ?>
                  		<?php endforeach ?>
                  	<?php endif ?>
                  </tbody>
                </table>
                

</div>


</div>
