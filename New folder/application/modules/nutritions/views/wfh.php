<main class="content-wrapper">
	<section class="content-header"></section>
	<section class="content">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addrawscore"><i class="fas fa-plus"></i></a></li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active" id="home">
				<h2 class="text-title">WEIGHT FOR HEIGHT (WFH) CHARTS 0-59 MONTHS</h2>
<hr>
<div class="row">	
	<div class="col-md-2">
		<label for="select_age_limit">Child age	</label>
		<select class="form-control" id="select_age_limit">
			<option value="0">Select Age</option>
			<option value="1">2.7-3.0</option>
			<option value="2">3.1-4.0</option>
			<option value="3">4.1-5.0</option>
			<option value="4">5.1-5.11</option>
		</select>
	</div>

	<div class="col-md-2">
		<label for="select-gender">Gender</label>
		<select class="form-control" id="select-gender">
			<option value="0">Select Gender</option>
			<option value="1">Male</option>
			<option value="2">Female</option>
		</select>
	</div>

	<div class="col-md-3"></div>
</div>

		
				<table class="table table-bordered" id="table-list-data">
					<thead>
						<tr>

							<th>HEIGHT (cm)</th>
							<th>SUPER UNDER WEIGHT</th>
							<th>UNDER WEIGHT</th>
							<th>NORMAL</th>
							<th>OVER WEIGHT</th>
							<th>OBESE</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>

					</div>
					<div class="tab-pane" id="addrawscore">
				<h2 class="text-title">ADD WEIGHT FOR HEIGHT</h2>

						<div class="form-responsive">
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6"><div class="alert"></div></div>
							</div>
              		<div class="row">
              			<div class="col-md-3"></div>
              			<div class="col-md-9"><div class="error-area"></div></div>
              		</div>
              		<form class="form-horizontal" id="form-add-wfh" action="" method="POST">
              			<input type="hidden" name="form" value="add">
              			<div class="form-group">
              				<div class="row">
              					<div class="col-md-2"><label form="agelimit">Child age</label>

              						<select class="form-control" name="age_limit" id="agelimit">
			<option value="0">Select age</option>
	              						<option value="1">Age 2.7-3.0</option>										              							
														<option value="2">3.1-4.0</option>
														<option value="3">4.1-5.0</option>
														<option value="4">5.1-5.11</option>
              						</select>

              					</div>
              					<div class="col-md-2">
              						
		<label for="select-gender">Gender</label>
		<select class="form-control" id="select-gender" name="gender">
			<option value="0">Select Gender</option>
			<option value="1">Male</option>
			<option value="2">Female</option>
		</select>
              					</div>
              				</div>
              			</div>
              	<div class="form-group">
              		<div class="row">
              			<table class="table table-bordered" id="tableform-add-zscore">
              				<thead>
              					
              				<tr>

							<th>HEIGHT (cm)</th>
							<th>SUPER UNDER WEIGHT</th>
							<th>UNDER WEIGHT</th>
							<th>NORMAL</th>
							<th>OVER WEIGHT</th>
							<th>OBESE</th>
              				<th></th>

              				</tr>
              				</thead>
              				<tbody>
              					<tr>
              						<td><input type="text" name="height" class="form-control"></td>
              						<td><input type="text" name="suw" class="form-control"></td>
              						<td><input type="text" name="uw" class="form-control"></td>
              						<td><input type="text" name="nw" class="form-control"></td>
              						<td><input type="text" name="ovw" class="form-control"></td>
              						<td><input type="text" name="obw" class="form-control"></td>
              						<td></td>
              					</tr>
              				</tbody>
              				<tfoot>
              					<tr>
              						<td><button class="btn btn-block btn-success btn-save" type="submit">Add</button></td>
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