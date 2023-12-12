<main class="content-wrapper">
	

	<section class="content">
		<div class="container-fluid">
			<form id="frm_domain_report" method="post"	action="javascript:void(0)">
			<div class="row no-print">
			<div class="col-sm-3 col-md-3 col-3">
			<label>Center</label>
			<select class="form-control" id="report_select_center" name="center_id">
							<option value="">No chosen</option>
                          <?php foreach ($centers as $key => $value): ?>
                            <option value="<?=$value->centerId?>"><?=$value->centerName?></option>
                          <?php endforeach ?>

			</select>
		</div>
			<div class="col-sm-4 col-md-3 col-3">
			<label>Domain</label>
			<select class="form-control" id="report_select_domain" name="domain">
				<option value="gross_motor">Gross Motor</option>
				<option value="fine_motor">Fine Motor</option>
				<option value="self_help">Self Help</option>
				<option value="expressive_lang">Expressive Language</option>
				<option value="receiptive_lang">Receiptive Language</option>
				<option value="cognitive">Cognitive</option>
				<option value="social_emotion">Social Emotional</option>
			</select>
		</div>

                       <div class="col-sm-4 col-md-2 col-2">
                        <label for="school_year_ass">School Year</label>
                          <select class="form-control" name="year_id" id="school_year_ass">
                          <?php if (  !empty($schoolyears)): ?>
                            
                                <?php foreach ($schoolyears as $key => $value): ?>
                                  <option value="<?=$value->YearId  ?>"><?=tomdy($value->YearStart)?> to <?=tomdy($value->YearEnd )?></option>
                                <?php endforeach ?>

                          <?php endif ?>
                        </select>
                      </div>

                       <div class="col-sm-4 col-md-2 col-2">
                        <label for="ass_type">Assessment type</label>
                          <select class="form-control" name="type" id="ass_type">
                          <option value="1">Raw Score</option>
                          <option value="2">Scaled Score</option>
                          <option value="3">All</option>
                        </select>

                      </div>

                       <div class="col-sm-4 col-md-2 col-2 r_schedule">
                        <label for="ass_type">Assessment schedule</label>
                          <select class="form-control" name="schedule" id="ass_schedule">
                          <option value="raw_score_1">First assessment</option>
                          <option value="raw_score_2">Second assessment</option>
                          <option value="raw_score_3">Final assessment</option>
                        </select>

                      </div>

                       <div class="col-sm-4 col-md-2 col-2 d-none s_schedule" >
                        <label for="ass_type">Assessment schedule</label>
                          <select class="form-control" name="s_schedule" id="ass_schedule">
                          <option value="scaled_score_1">First assessment</option>
                          <option value="scaled_score_2">Second assessment</option>
                          <option value="scaled_score_3">Final assessment</option>
                        </select>

                      </div>

		<div class="col-sm-4 col-md-3 col-3">
			<label>Order by</label>
			<div class="form-check">
				

			<div class="radio">
				<label for="radio1" class="form-check-label"><input type="radio" name="score_sort_by" value="asc" id="radio1" class="form-check-input" checked> Lowest to highest</label>
			</div>
			<div class="radio">
				<label for="radio2" class="form-check-label">
				<input type="radio" name="score_sort_by" id="radio2" value="desc" class="form-check-input">
			Highest to lowest</label> 
			</div>
			</div>
		</div>
		<div class="col-md-12">
			<label></label><br>
			<button class="btn btn-outline-success btn-sm generate-report" type="button">Generate report</button>
			<button class="btn btn-outline-success btn-sm btn-print disabled" type="button">Print</button>
		</div>

			</div>
			</form>
			<hr>
			<center>
				
			<div class="print-header block">
				<label class="text-title">MUNICIPAL SOCIAL WORKER DEVELOPMENT</label class="text-title">
				<label class="text-title">EARLY CHILD CARE DEVELOPMENT RECORDS</label class="text-title">
				<label class="text-title">Child Assessment</label class="text-title">

			</div>
			</center>

				<hr>

				<div class="card-body">
					<div class="row reports-header-info" style="font-size:12px">
						<div class="col-md-4 col-4">
							<span>NAME OF CENTER: </span> <label class="center_name"></label><br>
							<span>DOMAIN: </span> <label class="assessment_domain"></label>
						</div>
						<div class="col-md-4 col-4">
							
							<span>SCHOOL YEAR: </span> <label class="school_year"></label><br>
							<span>ASSESSMENT TYPE: </span> <label class="assessment_type"></label>
						</div>
						<div class="col-md-44 col-4">
							
							<span>ASSESSMENT SCHEDULE: </span> <label class="assessment_schedule"></label><br>
							<span>DATE OF ASSESSMENT: </span> <label class="assessment_date"></label>
						</div>
					</div>

			<div class="table-container table-responsive">
				<table class="table table-bordered w-100" id="table-assessment-report">
					<thead>
						<tr>
							<th></th>
							<th>Student Name</th>
							<th>Score</th>
						</tr>
					</thead>
					<tbody class="tbody"></tbody>
				</table>
			</div>
				<span class="date-printed print-footer">Date printed: <?=date('M d, Y')?></span>

		</div>
	</section>




</main>