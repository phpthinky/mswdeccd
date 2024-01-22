$(function(){
	$('#frmupdateuser').on('submit',function(e){
		e.preventDefault();

        var frmdata = $(this).serializeArray();
        $.ajax({
          url:'<?=site_url('users/update')?>',
          data: frmdata,
          dataType: 'json',
          method:'POST',
          success: function(response){
            console.log(response)
            if (response.status == true) {
              $('.errors').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
              
            }else{
              $('.errors').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);

            }
          },complete:function(){
            refreshTable($('input[name="YearId"]').val());
          }
        })

	})
})
