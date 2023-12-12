<main class="content-wrapper">
	<br/>
	<section class="container-fluid" id="tab-header">

		<ul class="nav nav-pills nav-justified">
                  <li class="nav-item"><a class="nav-link active" href="#assessments" data-toggle="tab">Assessments</a></li>
                  
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Nutrition Status</a></li>
                </ul>

	</section>
	<section>
		<div class="tab-content">
		<dv class="tab-pane " id="activity">
		
		<hr>
		<?php $this->load->view('nutricare');?>
		</dv>
		<dv class="tab-pane active" id="assessments">

		<hr>
		<?php $this->load->view('assessments');?>

	</dv>
		
		</div>
		</section>
</main>	