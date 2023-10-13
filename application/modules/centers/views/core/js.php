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

	$(document).on('click','.btn-edit-centers',function(){
		var parent = $(this).parents('tr');
		var data = []
		 $.each($(parent).children(),function(i,e){
			data.push($(e).text())
		})
		 console.log(data)
		 $('a[href="#edit"]').click();
		 var form = $('#frmeditcenter');

		 $(form).children($('input[name="centerId"]').val(data[0]))
		 $(form).children($('input[name="centerName"]').val(data[1]))
		 $(form).children($('select[name="barangay"]').val(data[2]))
		 $(form).children($('input[name="address"]').val(data[3]))


	})

	$('#frmeditcenter').on('submit',function (e) {
		// body...
		e.preventDefault()
		var formdata = $(this).serializeArray();
		
		$.ajax({
			data:formdata,
			dataType:'json',
			method:'POST',
			url: current_url,
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