<main class="content-wrapper">
	<section class="content-header"></section>
	<section class="content">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addrawscore">Add center</a></li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active" id="home">
				<h2 class="text-title">List of center</h2>
<hr>

		
				<table class="table table-bordered" id="table-list-data">
					<thead>
						<tr>
							<th>#</th>
							<th>Name of center</th>
							<th>Address</th>
							<th>Total no of Worker</th>
							<th>Total no. of pupils</th>
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
              		<form class="form-horizontal" method="POST" action="<?=site_url('centers')?>">


                          <?php echo validation_errors(); ?>
                          <?php if(!empty($hasErrors)) echo $hasErrors; ?>
                <div class="d-none">
                  <input type="hidden" name="form" value="add">
                </div>
                <div class="form-group row">
                  <label class="col-sm-2">Name of Center</label>
                  <div class="col-sm-10">
                    <input type="text" name="centerName" id="centerName" class="form-control" placeholder=" Name of Center">
                  </div>                  
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Barangay</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="barangay">
                      <option>Arellano</option>
                      <option>Batong Buhay</option>
                      <option>Buenavista</option>
                      <option>Burgos</option>
                      <option>Claudio Salgado</option>
                      <option>Gen. Emillio Aguinaldo</option>
                      <option>Ibud</option>
                      <option>Ilvita</option>
                      <option>Lagnas</option>
                      <option>Ligaya</option>
                      <option>Malisbong</option>
                      <option>Pag-asa</option>
                      <option>Poblacion</option>
                      <option>San Agustin</option>
                      <option>Santa Lucia</option>
                      <option>San Vicente</option>
                      <option>Sato Nino</option>
                      <option>Tagumpay</option>
                      <option>Tuban</option>
                      <option>Victoria</option>
                    </select>
                  </div>                  
                </div>
                <div class="form-group row">
                  <label class="col-sm-2">Complete Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="centerAddress" id="centerAddress" class="form-control" placeholder="Location of Center">
                  </div>                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">&nbsp;</div>
                  <div class="col-sm-10"><button class="btn btn-danger">Add</button></div>
                </div>
              </form>

              		</form>
              	</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>