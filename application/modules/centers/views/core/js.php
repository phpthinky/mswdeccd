<script type="text/javascript">
$(function(){

	var table = $('#table-list-data');

	    table.DataTable({
        ajax:site_url+'/centers/listall'
      })

	function refreshTable(table,url){
	    table.DataTable({
	    	destroy: true,
        ajax:url
      	})
	}
	$(document).on('click','.btn-trash',function() {
		// body...
		if (confirm('This center and all of its record will be deleted permanently. Make you have a backup.')) {
			var centerId = $(this).data('id');
		$.ajax({
			url:current_url,
			data:{form:'remove',id:centerId},
			dataType:'text',
			method:'post',

		})
		refreshTable(table,site_url+'/centers/listall')
		$(this).parent().parent().remove()

		}
		
	})
	$(document).on('submit','#frmaddcenter',function(e){
		e.preventDefault();
		var frmdata = $(this).serializeArray();
		$.ajax({
			data:frmdata,
			dataType:'json',
			method:'POST',
			url: site_url+'/centers/add',
			success:function (response) {
				// body...
				console.log(response)
				if(response.status == true){
					refreshTable(table,site_url+'/centers/listall')
					$('.error-area').addClass('text-success').text(response.msg)
				}else{
					$('.error-area').addClass('text-danger').text(response.msg)

				}

			},
			error: function(i,e){
				console.log(i.responseText)
			}

					})
	})
})
</script>