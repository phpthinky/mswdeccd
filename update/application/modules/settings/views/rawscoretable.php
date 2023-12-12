<main class="content-wrapper">
	<section class="content-header"></section>
	<section class="content">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addrawscore">Add raw score</a></li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active" id="home">
				<h2 class="text-title">Scaled Score Raw Score table Child's Record 1</h2>
<hr>
<div class="row">
	<div class="col-md-2">Select child age</div>
	<div class="col-md-2">
		<select class="form-control" id="select_age_limit">
			<option value="1">2.7-3.0</option>
			<option value="2">3.1-4.0</option>
			<option value="3">4.1-5.0</option>
			<option value="4">5.1-5.11</option>
		</select>
	</div>
	<div class="col-md-3"></div>
</div>

		
				<table class="table table-bordered" id="table-list-data">
					<thead>
						<tr>

							<th>Scaled Score</th>
							<th>Grow Motor Raw Score</th>
							<th>Fine Motor Raw Score</th>
							<th>Self Help Raw Score</th>
							<th>Receptive Raw Score</th>
							<th>Expressive raw Score</th>
							<th>Cognitive Raw Score</th>
							<th>Social Emotional</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>

					</div>
					<div class="tab-pane" id="addrawscore">
						<div class="form-responsive">
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6"><div class="alert"></div></div>
							</div>
              		<div class="row">
              			<div class="col-md-3"></div>
              			<div class="col-md-9"><div class="error-area"></div></div>
              		</div>
              		<form class="form-horizontal" id="form-add" action="<?=current_url()?>" method="POST">
              			<input type="hidden" name="form" value="add">
              			<div class="form-group">
              				<div class="row">
              					<div class="col-md-2"><label form="agelimit">Select child age</label></div>
              					<div class="co-md-10">
              						<select class="form-control" name="age_limit" id="agelimit">
	              						<option value="1">Age 2.7-3.0</option>										              							
														<option value="2">3.1-4.0</option>
														<option value="3">4.1-5.0</option>
														<option value="4">5.1-5.11</option>
              						</select>
              					</div>
              				</div>
              			</div>
              	<div class="form-group">
              		<div class="row">
              			<table class="table table-bordered" id="tableform-add">
              				<thead>
              					
              				<tr>
              				<th>Scaled Score</th>
              				<th>Gross Motor</th>
              				<th>Fine Motor</th>
              				<th>Self Help</th>
              				<th>Receptive</th>
              				<th>Expressive</th>
              				<th>Cognitive</th>
              				<th>Social Emotion</th>
              				<th><button class="btn btn-default btn-sm" type="button" id="addmoreraw"><i class="fas fa-plus"></i></button></th>

              				</tr>
              				</thead>
              				<tbody>
              					<tr>
              						<td><input type="text" name="scaled_score[]" class="form-control"></td>
              						<td><input type="text" name="gross_motor[]" class="form-control"></td>
              						<td><input type="text" name="fine_motor[]" class="form-control"></td>
              						<td><input type="text" name="self_help[]" class="form-control"></td>
              						<td><input type="text" name="receiptive_lang[]" class="form-control"></td>
              						<td><input type="text" name="expressive_lang[]" class="form-control"></td>
              						<td><input type="text" name="cognitive[]" class="form-control"></td>
              						<td><input type="text" name="social_emotion[]" class="form-control"></td>
              						<td></td>
              					</tr>
              				</tbody>
              				<tfoot>
              					<tr>
              						<td><button class="btn btn-block btn-success btn-save" type="button">Save</button></td>
              					</tr>
              				</tfoot>
              			</table>
              		</div>

              	

              	</div>


              		</form>
              	</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>