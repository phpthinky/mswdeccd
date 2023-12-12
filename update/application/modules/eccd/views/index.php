<main class="content-wrapper">
  <br/>
  <section class="container-fluid" id="tab-header">

    <ul class="nav nav-pills nav-justified">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Nutrition Status</a></li>
                  <li class="nav-item"><a class="nav-link" href="#assessments" data-toggle="tab">Assessments</a></li>
                </ul>

  </section>
  <section>
    <div class="tab-content">
    <dv class="tab-pane active" id="activity">
    
    <hr>
    <?php $this->load->view('eccd-nutrition');?>
    </dv>
    <dv class="tab-pane" id="assessments">

    <hr>
    <?php $this->load->view('eccd-assessment');?>

  </dv>
    
    </div>
    </section>
</main> 