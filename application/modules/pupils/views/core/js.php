<script type="text/javascript">

//datatable

    $(function(){
      var table =   $('#tblPupils')
      table.DataTable({
        ajax:"<?=site_url('pupils/getList')?>"
      })

      function refreshTable(centerId,workersId){
        console.log(centerId+' '+workersId)
        table.DataTable({
        ajax:"<?=site_url('pupils/getList/')?>"+centerId+'/'+workersId,
        destroy:true

        })
      }
      $('#btn-go').on('click',function(){
        var centerId = $('#centersOption').val()
        var workersId = $('#workersOption').val()
        console.log(workersId)
        refreshTable(centerId,workersId)
      })


/*
    $('#centersOption').on('change',function (){
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.responseType = "json";
       var centerId  = this.value;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
              //console.log(this.responseText)
              var data = this.response
              if (  data.status == true) {
                $('#workersOption').replaceOptions(data.data);
               // console.log(data.data)
              }else{
                var emptyoptions = [{value:'',text:'No workers yet.'}]
                $('#workersOption').replaceOptions(emptyoptions);

              }
            }
        };
        xmlhttp.open("GET", "<?=site_url('pupils/centerworkers/')?>" + centerId   , true);
        xmlhttp.send();


                table.DataTable().clear().destroy();
                refreshTable(centerId)

    })

*/
    $('#centersOption').on('change',function (){
       var centerId  = $(this).val();
        var workersId = 0;
      $.ajax({
        url:site_url+'/pupils/getworkers',
        data:{center:centerId},
        dataType:'json',
        method:'POST',
        success:function(response){
          console.log(response)
          if (response.status == true) {
            $('#workersOption').replaceOptions(response.data);
            var data = response.data;
            workersId = data[0].value
            }else{
            $('#workersOption').replaceOptions([{value:'',text:'No workers yet.'}]);

          }
        },complete:function(){
                refreshTable(centerId,workersId)

        }
      })
    })

    $('#workersOption').on('change',function (){
      var workersId = $(this).val()
      console.log(workersId)
      var centerId = $('#centersOption').val();
          table.DataTable().clear().destroy();
                refreshTable(centerId,workersId)

    })
    $('#searchstring').on('keyup',function(){
      table.DataTable().search($(this).val()).draw() ;
    })

    });


/*
var options = [
  {text: "one", value: 1},
  {text: "two", value: 2}
];

$("#foo").replaceOptions(options);

*/
</script>