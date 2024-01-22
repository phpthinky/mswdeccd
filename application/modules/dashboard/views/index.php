<main class="content-wrapper">
	<br/>
	<section class="container-fluid" id="tab-header">

		
		<h4>Nutrition Status</h4>

	</section>
	<section>
		<div class="tab-content">
		<dv class="tab-pane active" id="activity">
		
		<hr>
		<?php if ($this->aauth->is_admin()): ?>
		<?php $this->load->view('nutricare');?>

			<?php else: ?>
		<?php $this->load->view('nutricare_worker');?>

		<?php endif ?>
		</dv>
		
		</div>
		</section>
</main>	