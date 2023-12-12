
<script type="text/javascript">
$(function(){

var sidebarcollapse = true;
if (sidebarcollapse) {
  $('.sidebar-mini').removeClass('sidebar-open').addClass('sidebar-collapse')
}

  var tblmystudents = $('#tblmystudents')
      tblmystudents.DataTable({
        ajax:"<?=site_url('students/listmystudents/')?>"+$('#txtYearId').val()+'/'+$('#workersId').val()
      })

    var table =   $('#tblPupils')
      table.DataTable({
        ajax:"<?=site_url('students/listbyclassess/')?>"+$('#txtYearId').val()+'/'+$('#workersId').val()
      })
      function refreshTable(YearId){
        table.DataTable().clear().destroy();

        table.DataTable({
        ajax:"<?=site_url('students/listbyclassess/')?>"+YearId+'/'+$('#workersId').val(),
        destroy:true,
        "scrollX":true,

        })
      }
      $('#btn-go').on('click',function(){
        var YearId = $('#txtYearId').val()
        var workersId = $('#txtWorkersId').val()
        //table.DataTable().clear().destroy();
        refreshTable(YearId)
      });

      $('#tblPupils_filter').addClass('d-none');

    $('#searchstring').on('keyup',function(){
      table.DataTable().search($(this).val()).draw() ;
    })

      $('#frmStudents').on('submit',function(e){
        e.preventDefault();
        var frmdata = $(this).serializeArray();
        $.ajax({
          url:'<?=site_url('students/add')?>',
          data: frmdata,
          dataType: 'json',
          method:'POST',
          success: function(response){
            console.log(response)
            if (response.status == true) {
              $('.errors').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
              $('#frmStudents')[0].reset();
            }else{
              $('.errors').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);

            }
          },complete:function(){
            refreshTable($('input[name="YearId"]').val(),$('#workersId').val());
          }
        })
      });

      $(document).on('click','.btn-trash.weighing',function () {
        // body...

    if (confirm('This will delete this child nutritions data.')) {
    
    //  return false;

    var tr = $(this).parent().parent();
    var id = $(this).data('id')
    $.ajax({
      url:current_url,
      data:{form:'remove_nut',id:id},
      dataType:'text',
      method:'post',
      success:function(response){
        console.log(response)

    $(tr).remove()

      }

    })
  
    } 

      })
function reset_errors(form=false) {
  // body...

              $('.errors').text('');
              $('.errors').removeClass('alert');
              $('.errors').removeClass('alert-danger');
              $('.errors').removeClass('alert-success');
              if (form) {
                $('#'+form)[0].clear().reset()
              }
}
      $('#frmselectStudent').on('submit',function(e){
        e.preventDefault();
        var frmdata = $(this).serializeArray();
        $.ajax({
          url:'<?=site_url('students/addstudenttomylist')?>',
          data:frmdata,
          dataType:'json',
          method:'post',
          beforeSend:function(){
            reset_errors();
          },
          success: function(response){
      
            if (response.status == true) {
              $('.errors').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
            }else{
              $('.errors').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);

            }
          }
        })
      })

      $('#form-weighing').on('submit',function(e){
        e.preventDefault();
        console.clear()
        var frmdata =$(this).serializeArray(); 
        $.ajax({
          url:'<?=site_url('students/addstudentweighing')?>',
          data: frmdata,
          dataType:'json',
          method: 'POST',

          success: function(response){
            console.log(response);

            if (response.status == true) {
              $('.errors').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
            }else{
              $('.errors').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);
            }
          },
      
      error: function(i,e){
        console.log(i.responseText)
      },

        })
      });
    $('#select_feeding_date').on('change',function(){
      var formdata = {};
      formdata.form='list';
      formdata.date_feeding = $(this).val();



          tbl_nutritions.DataTable({
            ajax:{
            url:site_url+'/students/feeding/1',
            type:'POST',
            data:formdata
          },
          destroy:true
          })



    });
    var tbl_feeding = $('#table-feeding');

        tbl_feeding.DataTable({
          ajax:site_url+'/students/feeding/1/<?=$pupilsId?>'
        });

   $('#form-feeding').on('submit',function(e){
        e.preventDefault();
        var frmdata =$(this).serializeArray(); 
        $.ajax({
          url:'<?=site_url('students/feeding')?>',
          data: frmdata,
          dataType:'json',
          method: 'POST',
          success: function(response){
            console.log(response);

            if (response.status == true) {
              $('.errors').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
            }else{
              $('.errors').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);
            }
          },
      
      error: function(i,e){
        console.log(i.responseText)
      },

        })
      });


    var table2 =   $('#tblPupilsAssessment')
      table2.DataTable({
        ajax:"<?=site_url('students/listbyclassessassessment/')?>"+$('#txtYearId-2').val()+'/'+$('#workersId').val()
      })
      $('#tblPupilsAssessment_filter').addClass('d-none');

      function refreshTable2(YearId,worker){
        table2.DataTable().clear().destroy();

        table2.DataTable({
        ajax:"<?=site_url('students/listbyclassessassessment/')?>"+YearId+'/'+worker

        })
      }
      $('#btn-go-2').on('click',function(){
        var YearId2 = $('#txtYearId-2').val()
        var workersId = $('#txtWorkersId').val()
        //table.DataTable().clear().destroy();
        refreshTable2(YearId2,workersId)
      });

          $('#searchstring-2').on('keyup',function(){
      table2.DataTable().search($(this).val()).draw() ;
    })


$('#btn-add-weighing').on('click',function(){
  if ($('#content-table-weighing').hasClass('d-none')) {

  $('#content-table-weighing').removeClass('d-none')
  $('.form-container').addClass('d-none')
    $(this).html('<i class="fas fa-plus"></i> Add')

  }else{
    $(this).text('Cancel')
  $('#content-table-weighing').addClass('d-none')
  $('.form-container').removeClass('d-none')
 
  }
})

$('#btn-add-feeding').on('click',function(){
  if ($('#content-table-feeding').hasClass('d-none')) {
console.log('kkk')
  $('#content-table-feeding').removeClass('d-none')
  $('#container-feeding').addClass('d-none')
    $(this).html('<i class="fas fa-plus"></i> Add')

  }else{
    $(this).text('Cancel')
  $('#content-table-feeding').addClass('d-none')
  $('#container-feeding').removeClass('d-none')
 
  }
})

function showhidden(){
  $('#content-table-weighing').removeClass('d-none')
  $('.form-container').addClass('d-none')

}
$('.nav-link').on('click',function(){
  showhidden()
})

$('#btn-calculate').on('click',function(){
  var w = $('#weight').val()
  var h = $('#height').val()
  var frmdata = {}
    frmdata.weight = w;
    frmdata.height = h;
    $.ajax({
      url:site_url+'/students/calculate',
      data: frmdata,
      
    })
})

$('#StudentType').on('change',function(){
  var selected = $(this).val();
  if (selected == 1) {
    $('.form-repeater').addClass('d-none');

  }else{
    $('.form-repeater').removeClass('d-none');
  }

})

var tbl_immunization = $('#table-immunization');
    
        tbl_immunization.DataTable({
          ajax:site_url+'/students/immunizations/1/<?=$pupilsId?>'
        });

$('#btn-add-immunization').on('click',function (argument) {
  // body...
  //$(this).text('Cancel');
  if ($('#content-table-immunization').hasClass('d-none')) {
    $(this).html('<i class="fas fa-plus"></i> Add')
   
    $('#content-table-immunization').removeClass('d-none')
    $('#content-form-immunization').addClass('d-none')


  }else{
    $(this).text('Cancel');
    $('#content-form-immunization').removeClass('d-none')
    $('#content-table-immunization').addClass('d-none')
  }
})

$('#form-immunization').on('submit',function(e){
        e.preventDefault();
        var frmdata =$(this).serializeArray(); 
        $.ajax({
          url:'<?=site_url('students/immunizations')?>',
          data: frmdata,
          dataType:'json',
          method: 'POST',
          success: function(response){
            console.log(response);

            if (response.status == true) {
              $('.errors').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
            }else{
              $('.errors').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);
            }
          },
      
      error: function(i,e){
        console.log(i.responseText)
      },

        })

})
  get_date('<?=$id?>',1);
  get_date('<?=$id?>',2);
  get_date('<?=$id?>',3);
    function get_date(id,type) {
      // body...
      $.ajax({
        url:site_url+'/assessment/get_date_assessment/'+id+'/'+type,
        success:function (response) {
          // body...
          $('#date-'+type).text(response)
          if (response !== null) {
            get_age(id,type)
          }
          //console.log(response)
        }
      })
    }
    ;
    function get_age(id,type) {
      // body...
      $.ajax({
        url:site_url+'/assessment/get_assessment_age/'+id+'/'+type,
        success:function (response) {
          // body...
          if (response !== null) {
          $('#age-'+type).text('Age: '+response)

        }else{
          $('#age-'+type).text(response)
        }
        }
      })
    }
    $(document).on('click','.btn-trash-assessment',function () {
      // body...
      var frmdata={};
          frmdata.student_id = $(this).data('id');
          frmdata.domain = $(this).data('domain');
          var tr = $(this).parent().parent();

      $.ajax({
        url:site_url+'/assessment/remove_student_score/',
        data:frmdata,
        dataType:'json',
        method:'post',
        success:function (response) {
          // body...
          console.log(response)
          $(tr).remove()
        }
      })
    })
    $('#select-student-profile').on('change',function () {
      // body...
      var student_id = $(this).val()
      window.location = site_url+'/students/profile/'+student_id;
    })
})
</script>	