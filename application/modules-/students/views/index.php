<style type="text/css">
.table-container{
}
</style>
<main class="content-wrapper">
	<section class="content-header">
		
	</section>
	<section class="content-body">
		<div class="card">
			<div class="card-header">
				 <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#tabhome" data-toggle="tab">Home</a></li>
                  <li class="nav-item"><a class="nav-link " href="#tabassessment" data-toggle="tab">Assessment</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabnutrition" data-toggle="tab">Nutrition</a></li>
                  <?php if (!$this->aauth->is_admin()): ?>
                  	
                  <li class="nav-item"><a class="nav-link" href="#tabselectStudent" data-toggle="tab"><i class="fa fa-list"></i>&nbsp;Add new student</a></li>
                  
                  <li class="nav-item"><a class="nav-link <?php if(!empty($active)){if($active == 'schoolyear'){ echo " active";}}?>" href="#tabaddStudent" data-toggle="tab"><i class="fa fa-plus"></i></a></li>
                  <?php endif ?>
                </ul>
			</div>
			<div class="card-body">
				<div class="tab-content">

					<div class="tab-pane active" id="tabhome">
						<div class="card">
						<div class="card-header">
							My students in class <?=$classess?>
						</div>
							<div class="card-body">
								
                    <div class="row">
                     <div class="d-none">
                     	<input type="hidden" name="YearId" id="txtYearId" value="<?=$YearId?>">
                     </div>
                       <div class="col-sm-12">
                        <label class="col-sm-4">Search</label>
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                      </div>
                    </div>
				<hr>
				<div class="table-responsive-md">
	
                <table id="tblmystudents" class="table table-bordered w-100">
                  <thead>
                  <tr>
                    <th  style="width:50px !important">ID</th>
                    <th  style="min-width:200px !important">Name</th>
                    <th>Age</th>
                    <th>Gender</th>

                              <th>Address</th>
                              <th>Student Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>

			</div>

							</div>
						</div>
					</div>
					<div class="tab-pane" id="tabnutrition">
						<div class="card">
						<div class="card-header">
							Class of <?=$classess?> - Nutrition
						</div>
							<div class="card-body">
								
                    <div class="row">
                     <div class="d-none">
                     	<input type="hidden" name="YearId" id="txtYearId" value="<?=$YearId?>">
                     </div>
                       <div class="col-sm-12">
                        <label class="col-sm-4">Search</label>
                  <div class="input-group input-group">
                  <input type="text" class="form-control" name="searchstring" id="searchstring">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="btn-go">Go!</button>
                  </span>
                </div>

                      </div>
                    </div>
				<hr>
				<div class="table-responsive form-responsive">
	
                <table id="tblPupils" class="table table-bordered">
                  <thead>
                  <tr>
                    <th  style="width:50px !important">ID</th>
                    <th>Name</th>
                    <th>Weight (kg)</th>
                    <th>Height (cm)</th>

                              <th>WFA</th>
                              <th>HFA</th>
                              <th>WFH</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>

			</div>

							</div>
						</div>
					</div>
			<div class="tab-pane" id="tabassessment">
				<?php $this->load->view('profile-2-assessment'); ?>
			</div>
			<div class="tab-pane" id="tabselectStudent">
					<div class="card">
						<div class="card-header">
							Add new student in my class.
						</div>
						<div class="card-body">
																	<div class="form-responsive">
					<form class="form-horizontal" id="frmselectStudent">

						<div class="row form-group">
							<div class="col-md-3"></div>
							<div class="col-md-9"><span class="errors"></span></div>
						</div>
						<div class="row form-group form-repeater d-none">
							<div class="col-md-3"><label>Select student from list</label></div>
							<div class="col-md-9">
								<select class="form-control selectpicker" data-live-search="true" name="StudentId" required>
								<option data-tokens="default" value="0">Select student</option>
								<?php if (!empty($liststudents)): ?>
									<?php foreach ($liststudents as $key => $value): ?>
										<option value="<?=$value->pupilsId?>"><?=$value->fName.' '.$value->mName.' '.$value->lName.' '.$value->ext?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select></div>

						</div>

                      <input type="hidden" name="YearId" value="<?=$YearId?>">

                      <div class="form-group row">
                        <label for="age" class="col-md-3 col-form-label">Student type</label>
                        <div class="col-md-9">
                          <select class="form-control" name="StudentType" required id="StudentType">
                            <option value="1">New</option>

                            <option value="2">Repeater</option>
                          </select>
                        </div>
                      </div>

						<div class="row form-group form-repeater">
							<div class="col-md-3"></div>
							<div class="col-md-9">
								
							</div>
						</div>

						<div class="row form-group  form-repeater">
							<div class="col-md-3"></div>
							<div class="col-md-9"><button class="btn btn-primary">Add to my students</button></div>
						</div>

					</form>
					<hr>
					<div class="row">
							<div class="col-md-3">&nbsp;</div>
							<div class="col-md-9">or Click icon <button class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button> from tab to add new student.</div>
					</div>
				</div>

						</div>
					</div>
			</div>
			<div class="tab-pane" id="tabaddStudent">
				<?php $this->load->view('students/add');?>
			</div>


					</div>
				</div>
		</div>
	</section>
</main>

