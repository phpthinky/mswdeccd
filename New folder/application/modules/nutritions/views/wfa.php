<main class="content-wrapper">
	<div class="container-fluid">
		
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-8">
            <h4>Child Growth Monitoring Table</h4>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nutricare</a></li>
              <li class="breadcrumb-item active">WFA</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="tab-section container-fluid">
		
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add-score"><i class="fas fa-plus"></i></a></li>
				</ul>
	</section>
	<section class="body">
		<div class="tab-content">
			<div class="tab-pane active" id="home">
				<div class="container-fluid">
					<hr>
					<h4 class="text-title">Weight for Age</h4>
					<div class="row">
						<div class="col-md-2 col-xs-12">
							<label for="agelimit">Child Age</label>
							<select id="agelimit" class="form-control">
								<option>3.1</option>
								<option>4.1</option>
								<option>5.1</option>
							</select>
						</div>
						<div class="col-md-10 col-xs-12">
							<label>Search</label>
							<input type="text" name="searchstring" class="form-control">
						</div>
					</div>
				</div>
<br>
					<div class="row">
						<div class="container-fluid">

						<table class="table table-bordered">
							<thead>
								<tr>
									<th></th>
									<th>Age</th>
									<th>Severly Under Weight</th>
									<th>Under Weight</th>
									<th>Normal</th>
									<th>Over Weight</th>
									<th class="w-20"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
			</div>
			<div class="tab-pane" id="add-score">
				
				<div class="form-horizontal">	
					<form class="form" method="POST"	class="form-responsive">
						
						<table class="table table-hovered">
							<tr>
									<th>Age</th>
									<th>Severly Under Weight</th>
									<th>Under Weight</th>
									<th>Normal</th>
									<th>Over Weight</th>
									<th class="w-20"></th>
								</tr>
								<tr>
									<td><input type="text" name="age" class="form-control"></td>
									<td><input type="text" name="su_weight" class="form-control"></td>
									<td><input type="text" name="u_weight" class="form-control"></td>
									<td><input type="text" name="n_weight" class="form-control"></td>
									<td><input type="text" name="ov_weight" class="form-control"></td>
									<td><input type="submit" name="form" class="btn btn-primary" value="Add"></td>
								</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</section>


	</div>

</main>