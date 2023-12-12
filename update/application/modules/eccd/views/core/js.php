
<script type="text/javascript">
      var table =   $('#tblPupils')
      var d = new Date();
//    var current_date = d.getFullYear() +"/"+(d.getMonth()+1)+"/"+d.getDate();
      var current_date = (d.getMonth()+1)+"/"+d.getDate()+"/"+d.getFullYear() ;


    $(function(){

    var sidebarcollapse = true;
    if (sidebarcollapse) {
      $('.sidebar-mini').removeClass('sidebar-open').addClass('sidebar-collapse')
    }

        refreshTable(); 

        $('.dt-buttons').addClass('d-none')
    })

      function refreshTable(center_id,worker_id,weighing,year_id){
        var frmdata = {};
            frmdata.center_id = center_id;
            frmdata.worker_id = worker_id;
            frmdata.weighing = weighing;
            frmdata.year_id = year_id;

            var title = $('#centersOption option:selected').text() + ' - ' +$('.worker-text-title').text();

           // return false;
        table.DataTable({
        dom:"Bftrip",
        ajax:{url:site_url+'/eccd/listchild',data:frmdata,method:"POST"},
        destroy:true,
        header:true,
        buttons:[{
            extend: 'excelHtml5',
      title:title,
      messageTop:'Name of CDC/SNP Worker: ' + $('#workersOption option:selected').text(),
      messageBottom:'Date of export: ' + current_date,
            filename: function(){
                return 'ECCD-Records-'+current_date;
            }

        }]



        })
      }
      $('#btn-go').on('click',function(){
        var center_id = $('#centersOption').val()
        var workers_id = $('#workersOption').val()
        var year_id = $('#school_year').val()
        var weighing = $('#weighing').val()

        refreshTable(center_id,workers_id,weighing,year_id)
      })


    $('#centersOption').on('change',function (){
       var center_id  = $(this).val();
        var worker_id = 0;
      $.ajax({
        url:site_url+'/eccd/getworkers',
        data:{center:center_id},
        dataType:'json',
        method:'POST',
        success:function(response){

          if (response.status == true) {
            $('#workersOption').replaceOptions(response.data);
            var data = response.data;
            worker_id = data[0].value

            $('.center-title').text($('#centersOption option:selected').text())

            }else{
            $('#workersOption').replaceOptions([{value:'',text:'All workers'}]);

          }
        },complete:function(){
                refreshTable(center_id,worker_id)

        }
      })
    })

    $('#workersOption').on('change',function (){

       var center_id  = $('#centersOption').val();
            $('.center-title').text($('#centersOption option:selected').text())
            $('.worker-title').text($('#workersOption option:selected').text())

       if (center_id.length == 0) {
        $(this).val('')
        alert('No center selected.');
        return false;
       }

      var worker_id = $(this).val()

        var element = $('#school_year');
        get_myschoolyear(worker_id,element)
        
      var center_id = $('#centersOption').val();
          table.DataTable().clear().destroy();
                refreshTable(center_id,worker_id)

    })
    $('#searchstring').on('keyup',function(){
      table.DataTable().search($(this).val()).draw() ;
    })

    $('#btn-excel').on('click',function(){
    //  $('.buttons-excel').click()

        var center = $('#centersOption').val();
        var  worker = $('#workersOption').val();
        var weighing = $('#date_weighing').val();
        var year_id = $('#school_year').val();
            window.open(site_url+'/eccd/export/'+center+'/'+worker+'/'+weighing+'/'+year_id);
 
        
    })

  $('#school_year').on('change',function(){
    var selected = $('#date_weighing option:selected').text()
    $('.worker-text-title').text('Pupils Nutrition Status '+selected)
    var weighing = $(this).val()
    var year_id = $('#school_year').val()
    var center_id = $('#centersOption').val()
    var worker_id = $('#workersOption').val()
    refreshTable(center_id,worker_id,weighing,year_id)
})
  $('#date_weighing').on('change',function(){
    var selected = $('#date_weighing option:selected').text()
    $('.worker-text-title').text('Pupils Nutrition Status '+selected)
    var weighing = $(this).val()
    var year_id = $('#school_year').val()
    var center_id = $('#centersOption').val()
    var worker_id = $('#workersOption').val()
    refreshTable(center_id,worker_id,weighing,year_id)
  })

//assessments


var ass_table = $('#table-assessment')
      function refreshTable_ass(center_id,worker_id,type,year_id){
        ass_table.DataTable({
            ajax:{
                url:site_url+'/eccd/list_assessments/'+center_id+'/'+worker_id+'/'+year_id+'/'+type,
                /* success:function(response){
                    console.log(response)
                } */
        },
            destroy:true
        })
      }

  function get_myschoolyear(worker_id,element) {
      // body...
    $.ajax({
        url:site_url+'/workers/get_myschoolyear/'+worker_id,
        dataType:'json',
        success:function(response) {
            // body...
            $(element).replaceOptions(response)
        }
    })
  }
    $('#centersOption_ass').on('change',function (){
        var center_id  = $(this).val();
        var worker_id = 0;
        var type = $('#ass_type').val()
        var year_id = $('#school_year').val();

      $.ajax({
        url:site_url+'/eccd/getworkers',
        data:{center:center_id},
        dataType:'json',
        method:'POST',
        success:function(response){

          if (response.status == true) {
            $('#workersOption_ass').replaceOptions(response.data);
            var data = response.data;
            worker_id = data[0].value

            $('.center-title_ass').text($('#centersOption_ass option:selected').text())

            }else{
            $('#workersOption_ass').replaceOptions([{value:'',text:'All workers'}]);

          }
        },complete:function(){
                refreshTable_ass(center_id,worker_id,type,year_id)

        }
      })
    })

    $('#workersOption_ass').on('change',function (){

       var center_id  = $('#centersOption_ass').val();
            $('.center-title').text($('#centersOption_ass option:selected').text())
            $('.worker-title').text($('#workersOption_ass option:selected').text())

       if (center_id.length == 0) {
        $(this).val('')
        alert('No center selected.');
        return false;
       }

        var type = $('#ass_type').val()
        var worker_id = $(this).val()
        var element = $('#school_year_ass');
        get_myschoolyear(worker_id,element)
        setTimeout(function() {
            // body...
        var year_id = $('#school_year_ass').val();
              //ass_table.DataTable().clear().destroy();
              refreshTable_ass(center_id,worker_id,type,year_id)

        },500);

    })
    $('#searchstring_ass').on('keyup',function(){
      ass_table.DataTable().search($(this).val()).draw() ;
    })

    $('#btn-excel_ass').on('click',function(){
    //  $('.buttons-excel').click()

        var center_id = $('#centersOption_ass').val();
        var worker_id = $('#workersOption_ass').val();
        var type = $('#ass_type').val();
        var year_id = $('#school_year_ass').val();
            window.open(site_url+'/eccd/export_ass/'+center_id+'/'+worker_id+'/'+year_id+'/'+type);
 
        
    })

  $('#school_year_ass').on('change',function(){
    var selected = $('#ass_type option:selected').text()
    $('.worker-text-title').text('Pupils Nutrition Status '+selected)
    var year_id = $(this).val()
    var type = $('#ass_type').val()
    var center_id = $('#centersOption_ass').val()
    var worker_id = $('#workersOption_ass').val()
    refreshTable_ass(center_id,worker_id,type,year_id)
  })
</script>