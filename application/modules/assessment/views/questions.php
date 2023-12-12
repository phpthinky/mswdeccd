<main class="content-wrapper">
	
	<section class="content-header"></section>


	<section class="content-body">
		
		<div class="container-fluid">
		 <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#tabgrossmotor" data-toggle="tab">Gross Motor</a></li>
                  <li class="nav-item"><a class="nav-link " href="#tabfinemotor" data-toggle="tab">Fine Motor</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabselfhelp" data-toggle="tab">Self Help</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabexpressive" data-toggle="tab">Expressive Language</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabreceiptive" data-toggle="tab">Receiptive Language</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabcognitive" data-toggle="tab">Cognitive</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabsocial" data-toggle="tab">Social Emotional</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabadd" data-toggle="tab"><i class="fas fa-plus"></i> Add</a></li>
                  
                </ul>
<hr>

                <div class="tab-content">
 						<div class="row">
                          <div class="col-md-10"><label class="text-title">
                         Domain Questionaire</label></div>
                          <div class="col-md-2"><button class="btn btn-outline-primary btn-sm " id="btn-reload"><i class="fas fa-loading"></i> Reload</button>
                        </div>
                        </div>
                       
                	<div id="tabgrossmotor" class="tab-pane active">
                		<label class="text-title">Gross Motor</label>
                		<hr>
                		<table class="table table-bordered" id="tablegrossmotor">
                			<thead>
                				<tr>
                					<th>#</th>
                					<th>Description</th>
                					<th>Materyales/Pamaraan</th>
                					<th></th>
                				</tr>
                			</thead>
                			<tbody>
                			<?php if (!empty($gross_motor)): ?>
                				<?php $i=1; ?>
                				<?php foreach ($gross_motor as $key => $value): ?>
                					<tr data-id="<?=$value->id?>">
                					<td><?=$i++?></td>
                					<td><?=$value->question?></td>
                					<td><?=$value->description?></td>
                					<td><button data-id="<?=$value->id?>" class="btn btn-sm btn-outline-danger btn-trash"><i class="fas fa-trash"></i></button></td>
                					
                				</tr>
                				<?php endforeach ?>
                			<?php endif ?>
                			</tbody>
                		</table>
                	</div> <!---//tab-gross ---->
                	<div id="tabfinemotor" class="tab-pane">
                		<label class="text-title">Fine Motor</label>
                		<hr>
                		<table class="table table-bordered" id="tblfinemotor">
                			<thead>
                				<tr>
                					<th>#</th>

                					<th>Description</th>
                					<th>Materyales/Pamaraan</th>
                					<th></th>
                				</tr>
                			</thead>
                			<tbody>
                			<?php if (!empty($fine_motor)): ?>
                				<?php $i=1; ?>
                				<?php foreach ($fine_motor as $key => $value): ?>
                					<tr data-id="<?=$value->id?>">
                					<td><?=$i++?></td>
                					<td><?=$value->question?></td>
                					<td></td>
                					<td><?=$value->description?></td>
                					<td><button data-id="<?=$value->id?>" class="btn btn-sm btn-outline-danger btn-trash"><i class="fas fa-trash"></i></button></td>
                					
                				</tr>
                				<?php endforeach ?>
                			<?php endif ?>
                			</tbody>
                		</table>
                	</div> <!---//tab-gross ---->
                	<div id="tabselfhelp" class="tab-pane">
                		<label class="text-title">Self Help</label>
                		<hr>
                		<table class="table table-bordered" id="tblselfhelp">
                			<thead>
                				<tr>
                					<th>#</th>
                 					<th>Description</th>
                					<th>Materyales/Pamaraan</th>
                					<th></th>
                			</tr>
                			</thead>
                			<tbody>
                			<?php if (!empty($self_help)): ?>
                				<?php $i=1; ?>
                				<?php foreach ($self_help as $key => $value): ?>
                					<tr data-id="<?=$value->id?>">
                					<td><?=$i++?></td>
                					<td><?=$value->question?></td>
                					<td><?=$value->description?></td>
                					<td><button data-id="<?=$value->id?>" class="btn btn-sm btn-outline-danger btn-trash"><i class="fas fa-trash"></i></button></td>
                					
                				</tr>
                				<?php endforeach ?>
                			<?php endif ?>
                			</tbody>
                		</table>
                	</div> <!---//tab-gross ---->
                	<div id="tabexpressive" class="tab-pane">
                		<label class="text-title">Expressive Language</label>
                		<hr>
                		<table class="table table-bordered" id="tblexpressive">
                			<thead>
                				<tr>
                					<th>#</th>
                 					<th>Description</th>
                					<th>Materyales/Pamaraan</th>
                					<th></th>
                			</tr>
     
                			</thead>
                			<tbody>
                			<?php if (!empty($expressive_lang)): ?>
                				<?php $i=1; ?>
                				<?php foreach ($expressive_lang as $key => $value): ?>
                					<tr data-id="<?=$value->id?>">
                					<td><?=$i++?></td>
                					<td><?=$value->question?></td>
                					<td><?=$value->description?></td>
                					<td><button data-id="<?=$value->id?>" class="btn btn-sm btn-outline-danger btn-trash"><i class="fas fa-trash"></i></button></td>
                					
                				</tr>
                				<?php endforeach ?>
                			<?php endif ?>
                			</tbody>
                		</table>
                	</div> <!---//tab-gross ---->
                	<div id="tabreceiptive" class="tab-pane">
                		<label class="text-title">Receiptive Language</label>
                		<hr>
                		<table class="table table-bordered" id="tblreceiptive">
                			<thead>
                				<tr>
                					<th>#</th>
                 					<th>Description</th>
                					<th>Materyales/Pamaraan</th>
                					<th></th>
                			</tr>
     
                			</thead>
                			<tbody>
                			<?php if (!empty($receiptive_lang)): ?>
                				<?php $i=1; ?>
                				<?php foreach ($receiptive_lang as $key => $value): ?>
                					<tr data-id="<?=$value->id?>">
                					<td><?=$i++?></td>
                					<td><?=$value->question?></td>
                					<td><?=$value->description?></td>
                					<td><button data-id="<?=$value->id?>" class="btn btn-sm btn-outline-danger btn-trash"><i class="fas fa-trash"></i></button></td>
                					
                				</tr>
                				<?php endforeach ?>
                			<?php endif ?>
                			</tbody>
                		</table>
                	</div> <!---//tab-gross ---->
                	<div id="tabcognitive" class="tab-pane">
                		<label class="text-title">Cognitive</label>
                		<hr>
                		<table class="table table-bordered" id="tblcognitive">
                			<thead>
                				<tr>
                					<th>#</th>
                 					<th>Description</th>
                					<th>Materyales/Pamaraan</th>
                					<th></th>
                			</tr>
     
                			</thead>
                			<tbody>
                			<?php if (!empty($cognitive)): ?>
                				<?php $i=1; ?>
                				<?php foreach ($cognitive as $key => $value): ?>
                					<tr data-id="<?=$value->id?>">
                					<td><?=$i++?></td>
                					<td><?=$value->question?></td>
                					<td><?=$value->description?></td>
                					
                					<td><button data-id="<?=$value->id?>" class="btn btn-sm btn-outline-danger btn-trash"><i class="fas fa-trash"></i></button></td>
                					
                				</tr>
                				<?php endforeach ?>
                			<?php endif ?>
                			</tbody>
                		</table>
                	</div> <!---//tab-gross ---->
                	<div id="tabsocial" class="tab-pane">
                		<label class="text-title">Social Emotional</label>
                		<hr>
                		<table class="table table-bordered" id="tblsocial">
                			<thead>
                				<tr>
                					<th>#</th>
                 					<th>Description</th>
                					<th>Materyales/Pamaraan</th>
                					<th></th>
                			</tr>
     
                			</thead>
                			<tbody>
                			<?php if (!empty($social_emotion)): ?>
                				<?php $i=1; ?>
                				<?php foreach ($social_emotion as $key => $value): ?>
                					<tr data-id="<?=$value->id?>">
                					<td><?=$i++?></td>
                					<td><?=$value->question?></td>
                					<td><?=$value->description?></td>
                					<td><button data-id="<?=$value->id?>" class="btn btn-sm btn-outline-danger btn-trash"><i class="fas fa-trash"></i></button></td>
                					
                				</tr>
                				<?php endforeach ?>
                			<?php endif ?>
                			</tbody>
                		</table>
                	</div> <!---//tab-gross ---->
                	<div class="tab-pane" id="tabadd">
				                		
						<form class="form-horizontal" method="POST" action="javascript:void(0)" id="form-questions">
							<div class="row"><div class="col-md-3"></div><div class="col-md-9 results"></div></div>
							<div class="row form-group">
								<label class="col-md-3" for="category">Category</label>
								<div class="col-md-9">
								<select class="form-control" name="domain" id="domain">
									<option value="gross_motor">Gross Motor</option>
									<option value="fine_motor">Fine Motor</option>
									<option value="self_help">Self Help</option>
									<option value="expressive_lang">Expressive Language</option>
									<option value="receiptive_lang">Receiptive Language</option>
									<option value="cognitive">Cognitive</option>
									<option value="social_emotion">Social Emotional</option>
								</select>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-3" for="question">Description</label>
								<div class="col-md-9">
									<textarea id="question" name="question" class="form-control" rows="5"></textarea>
									
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-3" for="description">Materyales/Pamaraan</label>
								<div class="col-md-9">
									<textarea id="description" name="description" class="form-control" rows="5"></textarea>
									
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-3" for="question"></label>
								<div class="col-md-9">
								<input class="btn btn-outline-primary" type="submit" id="question">
									
								</div>
							</div>
						</form>
                	</div>
                </div>
			

		</div>
	</section>
</main>