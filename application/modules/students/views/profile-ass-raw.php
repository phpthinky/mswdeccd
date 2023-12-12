<div class="card">
	<div class="card-body">
				<label for="assessment_1">Assessment</label>
				<div class="row">
				<form id="frm_scaledscore_chart">

					<div class="form-check  col-md-2 col-sm-2 col-2">
						<input type="checkbox" class="form-check-input" name="type[]" value="1" id="assessment_1" checked>
					<label class="form-check-label" for="assessment_1">First</label>

						</div>
					<div class="form-check  col-md-2 col-sm-2 col-2">
						<input type="checkbox" class="form-check-input" name="type[]" value="2" id="assessment_2">
					<label class="form-check-label" for="assessment_2">Second</label>
					</div>
					<div class="form-check col-md-2 col-sm-2 col-2">
						<input type="checkbox" class="form-check-input" name="type[]" value="3" id="assessment_3">
						<label class="form-check-label" for="assessment_3">Third</label>
					</div>
				</form>
				</div>

				<div class="row">
					<div class="col-md-12">
						<canvas id="raw-score-chart"></canvas>
						
					</div>
				</div>

	</div>
</div>