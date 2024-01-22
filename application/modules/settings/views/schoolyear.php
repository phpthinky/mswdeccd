<main class="content-wrapper">
  <section class="container-fluid">
    <div class="card">
      <div class="card-header">


                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link <?php if(empty($active)){echo "active";}?>" href="#activity" data-toggle="tab">Home</a></li>


                  <li class="nav-item"><a class="nav-link <?php if(!empty($active)){if($active == 'schoolyear'){ echo " active";}}?>" href="#schoolyear" data-toggle="tab">Add</a></li>
                  <li class="nav-item d-none"><a href="#edit" data-toggle="tab"></a></li>
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
                        <input type="hidden" name="form" value="Add">

                        <div class="row form-group">
                          <div class="col-md-3"><label>Start Date</label></div>
                          <div class="col-md-9"><input type="text" min="2020-08" value="2020-10" id="startdate" name="startdate" class="form-control" placeholder="Start of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>End Date</label></div>
                          <div class="col-md-9"><input type="month" min="2020-08" value="2020-10" id="enddate" name="enddate" class="form-control" placeholder="End of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>Status</label></div>
                          <div class="col-md-9"><select class="form-control" name="status">
                            <option value="1">Present</option>
                            <option value="2">Completed</option>
                            <option value="0">Pending</option>
                          </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-3"><label>&nbsp;</label></div>
                          <div class="col-md-9"><button type="submit" class="btn btn-danger">Add</button></div>
                        </div>
                        </form>


          </div>
          <div class="tab-pane" id="edit">
            <h4 class="text-title">Edit school year</h4>

                  <hr>
                        <form id="e_frmschoolyear" method="post" action="javascript:void(0)">
                      <div class="row">
                        
                      <div class="col-md-3"></div>
                      <div class="col-md-9"><div id="error-area"></div></div>

                      </div>
                      <div class="d-none">
                        <input type="hidden" name="YearId" id="e_YearId" value="0">
                        <input type="hidden" name="form" value="Update">
                      </div> 
                        <div class="row form-group">
                          <div class="col-md-3"><label>Start Date</label></div>
                          <div class="col-md-9"><input type="month" min="2020-08" value="2020-10" name="startdate" id="e_startdate" class="form-control" placeholder="Start of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>End Date</label></div>
                          <div class="col-md-9"><input type="month" min="2020-08" value="2020-10" name="enddate" id="e_enddate" class="form-control" placeholder="End of school year"></div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-3"><label>Status</label></div>
                          <div class="col-md-9"><select class="form-control" name="status" id="e_status">
                            <option value="1">Present</option>
                            <option value="2">Completed</option>
                            <option value="0">Pending</option>
                          </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-3"><label>&nbsp;</label></div>
                          <div class="col-md-9"><button type="submit" class="btn btn-danger">Update</button></div>
                        </div>
                        </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script type="text/javascript">

</script>