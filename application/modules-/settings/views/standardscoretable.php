<main class="content-wrapper">
	<section class="content-header"></section>
	<section class="content">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addrawscore">Add score</a></li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active" id="home">
				<h2 class="text-title">Standard Score Equivalent of Scaled Score Table Child's Record 2</h2>


		
				<table class="table table-bordered" id="table-list-data">
					<thead>
						<tr>

							<th>Scaled Score</th>
							<th>Standard Score</th>
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
              			<table class="table table-bordered" id="tableform-add">
              				<thead>
              					
              				<tr>
              				<th>Scaled Score</th>
              				<th>Standard Score</th>
              				<th class="d-none"></th>
              				<th><button class="btn btn-default btn-sm" type="button" id="addmoreraw-2"><i class="fas fa-plus"></i></button></th>

              				</tr>
              				</thead>
              				<tbody>
              					<tr>
              						<td><input type="text" name="scaled_score[]" class="form-control"></td>
              						<td><input type="text" name="standard_score[]" class="form-control"></td>
              						<td class="d-none"><input type="text" name="record_no[]" class="form-control" value="2"></td>
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