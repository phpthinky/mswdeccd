
<script type="text/javascript">
$(function(){


      $('#frmaddweighing').on('submit',function(e){
        e.preventDefault();
        var frmdata = $(this).serializeArray();
        $.ajax({
          url:'<?=site_url('weighing/add')?>',
          data:frmdata,
          dataType:'json',
          method:'post',
          beforeSend: function(){
                $('.errors').removeClass('alert alert-danger').text('')
                $('.errors').removeClass('alert alert-success').text('')

          },
          success: function(response){
                      console.log(response);
                      if (response.status == true) {
                          $('.errors').addClass('alert alert-success').text(response.msg)
                          
                          refreshTable();
                      }
                        else{
                          $('.errors').addClass('alert alert-danger').text(response.msg)
                        }
                    },
                    complete:function(){
                      setInterval(function(){
                        $('.errors').removeClass('alert alert-danger').text('')
                        $('.errors').removeClass('alert alert-success').text('')
                        $('form')[0].reset()
                      },15000)
                    }
                  })
                })
          })
          


      var table =   $('#tblweighing')
      table.DataTable({
        ajax:"<?=site_url('weighing/getlist')?>"
      })

      function refreshTable(){
        table.DataTable().clear().destroy();
        table.DataTable({
        ajax:"<?=site_url('weighing/getlist/')?>"

        })
      }
          </script>}