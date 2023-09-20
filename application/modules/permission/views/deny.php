  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Access denied</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <div class="card">
          <div class="card-header">
        <h2 class="headline text-danger form-justified">No Access.</h2>
            

          </div>
          <div class="card-body">

              <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! You do not have a permission to access this page.</h3>

                <p>
                  We will work on fixing that right away.
                  Meanwhile, you may <a href="<?=site_url('dashboard')?>  ">return to dashboard</a>
                </p>
              </div>            
          </div>
        </div>
        <br>

      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->