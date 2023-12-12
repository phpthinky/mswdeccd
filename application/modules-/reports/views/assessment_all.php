<main class="content-wrapper">
	

	<section class="content">
		<div class="container-fluid">
			<form id="frm_domain_report_all" method="post"	action="javascript:void(0)">
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
                          <option value="raw_score">Raw Score</option>
                          <option value="scaled_score">Scaled Score</option>
                        </select>

                      </div>

                       <div class="col-sm-4 col-md-2 col-2 r_schedule">
                        <label for="ass_type">Assessment schedule</label>
                          <select class="form-control" name="schedule" id="ass_schedule">
                          <option value="1">First assessment</option>
                          <option value="2">Second assessment</option>
                          <option value="3">Final assessment</option>
                        </select>

                      </div>


		<div class="col-md-12">
			<label></label><br>
			<button class="btn btn-outline-success btn-sm generate-report-all" type="button">Generate report</button>
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
							<span>DOMAIN: </span> <label class="assessment_domain">All</label>
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

                            <th>#</th>
                            <th>Student Name</th>
                            <th>Gross Motor</th>
                            <th>Fine Motor</th>
                            <th>Self Help</th>
                            <th>Expressive Language</th>
                            <th>Receiptive Language</th>
                            <th>Cognitive</th>
                            <th>Social Emotional</th>

						</tr>
					</thead>
					<tbody class="tbody"></tbody>
				</table>
			</div>
				<span class="date-printed print-footer">Date printed: <?=date('M d, Y')?></span>

		</div>
	</section>




</main>