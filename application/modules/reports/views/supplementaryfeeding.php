<main class="content-wrapper">
	<style type="text/css">
		.reports-header-info{
			font-size: 12px;
		}
		.reports-table-text{
			font-size: 11px;
		}
	</style>
	<section class="content-header d-none">
		<div class="row">
                      <div class="col-sm-2 d-none">
                        <label for="centersOption">Center</label>

                          <select class="form-control" name="centersOption" id="centersOption">
                          <option value="">-</option>
                          <?php foreach ($centers as $key => $value): ?>
                            <option value="<?=$value->centerId?>"><?=$value->centerName?></option>
                          <?php endforeach ?>
                            </select>
                      </div>
                       <div class="col-sm-2 d-none">
                        <label for="workersOption">Worker</label>
                          <select class="form-control" name="workersOption" id="workersOption">
                          <option value="">-</option>
                          
                          <?php foreach ($workers as $key => $value): ?>
                            <option value="<?=$value->workersId?>"><?=$value->workerName?></option>
                          <?php endforeach ?>
                        </select>
                          </div>

                       <div class="col-sm-2">
                        <label for="school_year">School Year</label>
                          <select class="form-control" name="school_year" id="school_year">
                          <option value="0">-</option>
                          <?php if (  !empty($schoolyears)): ?>
                            
                                <?php foreach ($schoolyears as $key => $value): ?>
                                  <option value="<?=$value->YearId  ?>"><?=tomdy($value->YearStart)?> to <?=tomdy($value->YearEnd )?></option>
                                <?php endforeach ?>

                          <?php endif ?>
                        </select>
                      </div>

                    </div>

	</section>

	<section class="content-body">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<center>
						
					<label class="text-title">SUPPLEMENTARY FEEDING PROGRAM</label><br>
					<p><label class="text-title">TALLY OF BENEFICIARIES</label></p>
					<?php if (isset($filter_schoolyear)): ?>
					<p><label class="text-title">SCHOOL YEAR: <?=$filter_schoolyear?></label></p>
						
					<?php endif ?>
					</center>
				</div>
				<div class="card-body">
					<div class="row reports-header-info">
						<div class="col-md-3">
							<span>PROVINCE:</span> <span>OCCIDENTAL MINDORO</span><br>
							<span>MUNICIPALITY:</span> <span>SABLAYAN</span>
						</div>
						<div class="col-md-3">
							
							<span>TOTAL NUMBER SNP SITES:</span> <span><?=$snp?></span><br>
							<span>TOTAL NUMBER OF SNP CHILDREN:</span> <span><?=$snp_child?></span>
						</div>
						<div class="col-md-3">
							
							<span>TOTAL NUMBER OF CDC:</span> <span><?=$cdc?></span><br>
							<span>TOTAL NUMBER OF CDC CHILDREN:</span> <span><?=$cdc_child?></span>
						</div>
						<div class="col-md-3">
							
							<span>TOTAL NUMBER OF BOYS:</span> <span><?=$total_boys?></span><br>
							<span>TOTAL NUMBERR OF GIRLS:</span> <span><?=$total_girls?></span>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table table-bordered" id="reports-feeding">
							<thead>
								
							<tr>
								<th rowspan="2">No.</th>
								<th rowspan="2">Barangay</th>
								<th rowspan="2">Name of CDC/SNP</th>
								<th rowspan="2">Address</th>
								<th colspan="3">Number of CDC/SNP Children</th>
								<th rowspan="2">Name of CDC Worker or SNP Worker</th>
								<th rowspan="2">Contact No.</th>
							</tr>
							<tr>
								<th>Boys</th>
								<th>Girls</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
								<?php if (!empty($list_feeding)): ?>
									<?php $i=1; ?>
									<?php foreach ($list_feeding as $key => $feeding): ?>
										<tr>
											<td><?=$i?></td>
											<td><?=$feeding->barangay?></td>
											<td><?=$feeding->center_name?></td>
											<td><?=$feeding->center_address?></td>
											<td><?=$feeding->total_students_boys?></td>
											<td><?=$feeding->total_students_girls?></td>
											<td><?=$feeding->total_students?></td>
											<td><?=$feeding->worker_name?></td>
											<td><?=$feeding->contact_number?></td>
										</tr>
										<?php $i++; ?>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="no-print">
		<div class="container-fluid">
			
		<div class="row form-group buttons">
			<div class="col-md-6">
			<button class="btn btn-primary btn-md" id="btn-print">Print</button>
			<button class="btn btn-success btn-md" id="btn-excel">Excel</button>
			<button class="btn btn-default btn-md" id="btn-filter">Filter</button></div>
		</div>
		<div id="filter-report" class="d-none">
			<div class="container-fluid">
<hr>
				<div class="row form-group">
				<label class="col-md-2">School year</label>
				<div class="col-md-8">
					<select class="form-control" id="filter-school-year">
						<option value="0">-</option>
                          <?php if (  !empty($schoolyears)): ?>
                            
                                <?php foreach ($schoolyears as $key => $value): ?>
                                  <option value="<?=$value->YearId  ?>"><?=toymd($value->YearStart)?> to <?=toymd($value->YearEnd )?></option>
                                <?php endforeach ?>

                          <?php endif ?>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-2">Date of feeding</label>
				<div class="col-md-8">
					<select id="filter-feeding-date" class="form-control">
						<option value="0">Default</option>
					</select>
				</div>
			</div>


			<div class="row form-group">
				<label class="col-md-2">&nbsp;</label>
				<div class="col-md-8">
					<button class="btn btn-outline-success" id="btn-go-filter-feeding">Go</button>
				</div>
			</div>
			</div>
		</div>
		</div>
	</section>
</main>