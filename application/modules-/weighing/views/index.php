<main class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Weighing schedule</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Weighing</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
				                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Weighing Schedule</a></li>
                  <li class="nav-item"><a class="nav-link" href="#addDate" data-toggle="tab">Add Weighing Date</a></li>
                </ul>
            </div>
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="home">
								
							<table class="table table-bordered" id="tblweighing">
								<thead>
									<tr>
										<th>ID No.</th>
										<th>Date Scheduled</th>
										<th>Center</th>
										<th>Remarks</th>
										<th></th>
									</tr>
								</thead>
							</table>	
						</div>
						<div class="tab-pane" id="addDate">
							<div class="errors"></div>
							<form class="form-horizontal" id="frmaddweighing" method="POST" action="<?=site_url('weighing/add')?>">
								<div class="d-none">
									<input type="hidden" name="teacherId" value="0">
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Select date</label>
									<div class="col-sm-10">
										<input type="date" name="dateOfWeighing" id="dateOfWeighing" class="form-control">
									</div>									
								</div>
								<div class="form-group row">
									<div class="col-sm-2">&nbsp;</div>
									<div class="col-sm-10"><button class="btn btn-danger">Add</button></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>