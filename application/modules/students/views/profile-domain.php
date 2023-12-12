<hr>
<div class="container-fluid">
	<label>Scaled Score Table</label>
<div class="table-responsive">
  
      <table id="table-raw-score" class="table table-bordered table-striped w-100">
                  <thead>

                  	<tr>
                  		<th rowspan="3">DOMAIN</th>
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
                  			<tr>
                  				<td><?=get_domain($value->domain)?></td>
                  				<td><?=$value->raw_score_1?></td>
                  				<td><?=$value->scaled_score_1?></td>
                  				<td><?=$value->raw_score_2?></td>
                  				<td><?=$value->scaled_score_2?></td>
                  				<td><?=$value->raw_score_3?></td>
                  				<td><?=$value->scaled_score_3?></td>
                                          <td><button class="btn btn-sm btn-outline-danger btn-trash-assessment" data-domain="<?=$value->domain?>" data-id="<?=$value->student_id?>"><i class="fas fa-trash"></i></button></td>
                  			</tr>
                  		<?php endforeach ?>
                  	<?php endif ?>
                  </tbody>
                </table>
                

</div>


</div>
