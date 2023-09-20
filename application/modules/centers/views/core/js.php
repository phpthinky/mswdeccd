<script type="text/javascript">
$(function(){

	var table = $('#table-list-data');

	    table.DataTable({
        ajax:site_url+'/centers/listall'
      })

	function refreshTable(table,url){
		table.DataTable().clear().destroy();

	    table.DataTable({
        ajax:url
      	})
	}
	$(document).on('click','.btn-trash',function() {
		// body...
		var centerId = $(this).data('id');
		$.ajax({
			url:current_url,
			data:{form:'remove',id:centerId},
			dataType:'text',
			method:'post',

		})
		refreshTable(table,site_url+'centers/listall')
		$(this).parent().parent().remove()
	})

})
</script>