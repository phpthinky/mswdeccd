var date_of_weighing = {};

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
/////////////////////////
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

///////////////
function reset_errors(form=false) {
  // body...

              $('.errors').html('');
              if (form) {
                $('#'+form)[0].clear().reset()
              }
}
////////
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
/////////
$('#form-weighing button').on('click',function(){

  var parent_tr = $(this).parent().parent();
  var input = $(parent_tr).children().find('input');
  var type = $(this).data('type');
  console.log(type)
     
      var frmdata = {};
      
          frmdata.weight = $('#weight_'+type.toString()).val();
          frmdata.height = $('#height_'+type.toString()).val();

          if (type == 'u') {
            frmdata.date_weighing = date_of_weighing.date_u;
            frmdata.type = 1;
          }

          if (type == '2') {
            frmdata.date_weighing = date_of_weighing.date_20;
            frmdata.type = 2;
          }

          if (type == '4') {
            frmdata.date_weighing = date_of_weighing.date_40;
            frmdata.type = 3;
          }

          if (type == 't') {
            frmdata.date_weighing = date_of_weighing.date_60;
            frmdata.type = 4;
          }
          //frmdata.date_weighing = $('input#date_weighing_2').val();


       $.ajax({
          url:'<?=site_url('students/addstudentweighing/').$pupilsId?>',
          data: frmdata,
          dataType:'json',
          method: 'POST',

          breforeSend:function(){
            $('.errors').html('')
          },
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
$('#form-weighing').on('submit',function(e){
        e.preventDefault();
        console.clear()



        var frmdata = $(this).serializeObject()

       $.ajax({
          url:'<?=site_url('students/addstudentweighing')?>',
          data: frmdata,
          dataType:'json',
          method: 'POST',

          breforeSend:function(){
            $('.errors').html('')
          },
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


////////////////
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
});

$(function(){
    $('#table-feeding').reloadTable(site_url+'/students/feeding/1/<?=$pupilsId?>')
/*
    var tbl_feeding = $('#table-feeding');

        tbl_feeding.DataTable({
          ajax:site_url+'/students/feeding/1/<?=$pupilsId?>'
        });
*/
   $('#form-feeding').on('submit',function(e){
        e.preventDefault();
        var frmdata =$(this).serializeArray(); 
        $.ajax({
          url:'<?=site_url('students/feeding')?>',
          data: frmdata,
          dataType:'json',
          method: 'POST',
          breforeSend:function(){
            $('.errors').html('')
          },
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
var get_weighing_data = function() {
            // body...
            var student_id = '<?=$pupilsId?>';
            $.ajax({
              url:site_url+'/weighing/get_date_weighing/'+student_id,
              dataType: 'json',
              success:function(response){

                if (response.status == true) {
                  var data = response.data;
                  var table = $('#content-table-weighing tbody')
                  $.each(data,function(i,d){

                    var date_of_weighing,weight,height,wfa,hfa,wfh;
                    
                    if(d.date_weighing === undefined) { date_weighing = ''; }else{ date_weighing = moment(d.date_weighing).format('ll'); }
                    if(d.weight === undefined) { weight = ''; }else{ weight = d.weight }
                    if(d.height === undefined) { height = ''; }else{ height = d.height }
                    if(d.wfa === undefined) { wfa = ''; }else{ wfa = d.wfa }
                    if(d.hfa === undefined) { hfa = ''; }else{ hfa = d.hfa }
                    if(d.wfh === undefined) { wfh = ''; }else{ wfh = d.wfh }


                    table.append('<tr><td>'
                      +wtitle(i)+'</td><td>'
                      +date_weighing+'</td><td>'
                      +weight+'</td><td>'
                      +height+'</td><td>'
                      +wfa+'</td><td>'
                      +hfa+'</td><td>'
                      +wfh+'</td></tr>')
                  });
                }

          }
        });
          }
          function wtitle(i) {
            // body...
                var t = '';
                    if(i === 'upon_entry') { t = 'Upon entry'; }
                    if(i === '20_days') { t = 'After 20 days'; }
                    if(i === '40_days') { t = 'After 40 days'; }
                    if(i === 'terminal') { t = 'Terminal'; }
                    return t;
          }
          get_weighing_data();


$('#btn-add-weighing').on('click',function(){
  $('a[href="#tab-tab-weighing-add"]').trigger('click')
var student_id = '<?=$pupilsId?>';
  $.ajax({
    url:site_url+'/weighing/get_date_weighing/'+student_id,
    dataType:'json',
    success:function(response){
      if (response.status == true) {
          var u = response.data.upon_entry.date_weighing
        $('#date_weighing_u').val(u)
        $('#date_weighing_u').change();

      }
      
    }
    });

})
/*
Date.prototype.toInputFormat = function(){
  var yyyy = this.getFullYear().toString();
  var mm = this.getMonth().toString();
  var dd = this.getDate().toString();
  return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + (dd[1]?dd:"0"+dd[0]);
};
*/
Date.prototype.addDays = function(days) {
  // body...
  var date = new Date(this.valueOf());
  date.setDate(date.getDate() + days);
 
  return date;
};
$('#date_weighing_u').on('change',function(){

  var date_u =new Date($(this).val());
  date_uponentry = date_u;
  var date_20 = moment(date_u.addDays(20))// date_u.setDate(date_u.getDate() + 20);
  var date_40 = moment(date_u.addDays(40));
  var date_t = moment(date_u.addDays(60));
  
  $('.date_weighing_2').text(date_20.format('ll'))
  $('.date_weighing_4').text(date_40.format('ll'))
  $('.date_weighing_t').text(date_t.format('ll'))

    date_of_weighing = {};
    date_of_weighing.date_u = moment(date_u).format('YYYY-MM-DD');
    date_of_weighing.date_20 = moment(date_20).format('YYYY-MM-DD');
    date_of_weighing.date_40 = moment(date_40).format('YYYY-MM-DD');
    date_of_weighing.date_60 = moment(date_t).format('YYYY-MM-DD');



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
  //$('#content-table-weighing').removeClass('d-none')
 // $('.form-container').addClass('d-none')

}
$('.nav-link').on('click',function(){
 // showhidden()
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
          breforeSend:function(){
            $('.errors').html('')
          },
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
})
