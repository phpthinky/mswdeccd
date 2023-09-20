<main class="content-wrapper">
  <section class="container-fluid">
    <div class="card">
      <div class="card-header">


                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link <?php if(empty($active)){echo "active";}?>" href="#activity" data-toggle="tab">Home</a></li>


                  <li class="nav-item"><a class="nav-link <?php if(!empty($active)){if($active == 'schoolyear'){ echo " active";}}?>" href="#schoolyear" data-toggle="tab">Add School Year</a></li>
                </ul>

      </div>
      <div class="card-body">

        <div class="tab-content">
          <div class="tab-pane active" id="activity">
            List of school year

            <table class="table ttable-bordered" id="tblSchoolYear">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                <tbody>
                  
                </tbody>
              </thead>
            </table>
          </div>
          <div class="tab-pane " id="schoolyear">
            <h4>Add School Year</h4>
                  <hr>
                        <form id="frmschoolyear" method="post" action="javascript:void(0)">
                      <div class="row">
                        
                      <div class="col-md-3"></div>
                      <div class="col-md-9"><div id="error-area"></div></div>

                      </div>
                        <div class="row form-group">
                          <div class="col-md-3"><label>Start Date</label></div>
                          <div class="col-md-9"><input type="date" name="startdate" class="form-control" placeholder="Start of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>End Date</label></div>
                          <div class="col-md-9"><input type="date" name="enddate" class="form-control" placeholder="End of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>&nbsp;</label></div>
                          <div class="col-md-9"><button type="submit" class="btn btn-danger">Add</button></div>
                        </div>
                        </form>


          </div>
        </div>
      </div>
    </div>
  </section>
</main>