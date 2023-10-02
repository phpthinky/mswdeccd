<script type="text/javascript">
$(function(){
		var	w_type = 0;
		var table = $('#worker-table');

	    table.DataTable({
        ajax:site_url+'/workers/listall?type='+w_type
      })

	function refreshTable(table,url){
	    table.DataTable({
	    	destroy: true,
        ajax:url
      	})
	}
	$('#workertype').on('change',function(){
		w_type = $(this).val();
		$('.table-title').text($('#workertype option:selected').text())
		console.log(w_type)
		refreshTable(table,site_url+'/workers/listall?type='+w_type);

	});
	$(document).on('click','.btn-trash',function() {
		// body...
		if (confirm('This worker and his pupils records will be permanently deleted. Make sure you have a backup.')) {

		
		var workersId = $(this).data('id');
		$.ajax({
			url:current_url,
			data:{form:'remove',id:workersId},
			dataType:'text',
			method:'post',
			success:function(response){
				console.log(response)
			}

		})
		refreshTable(table,site_url+'/workers/listall?type='+w_type)
		$(this).parent().parent().remove()

	
		}	
	})


var sidebarcollapse = true;
if (sidebarcollapse) {
	$('.sidebar-mini').removeClass('sidebar-open').addClass('sidebar-collapse')
}
	$('#frmselectschoolyear').on('submit',function(e){
		e.preventDefault();
		var frmdata = $(this).serializeArray();
		console.log(frmdata);
		$.ajax({
			url:'<?=site_url('workers/addtomyschoolyear')?>',
			method: 'POST',
			dataType:'json',
			data: frmdata,
			beforeSend:function(){
				console.log('Processing...');
				$('#error-area').text('Processing').addClass('text-success');
			},
			success: function(result){
				console.log(result)
				if(result.status == true){
				$('#error-area').text(result.msg).addClass('text-success');

				}else{
				$('#error-area').text(result.msg).addClass('text-danger');

				}
			},
			error: function(i,e){
				console.log(i.responseText)
			},
			complete: function(){

				//$('#error-area').text('Transaction completed.').addClass('text-success');

			}
		})
	})

	$('#frmaddworker').on('submit',function(e){
		e.preventDefault();
		var frmdata = $(this).serializeArray();
		console.log(frmdata);
		$.ajax({
			url:'<?=site_url('workers/add')?>',
			method: 'POST',
			dataType:'json',
			data: frmdata,
			beforeSend:function(){
				console.log('Processing...');
				$('#error-area').text('Processing').addClass('text-success');
			},
			success: function(result){
				console.log(result)
				if(result.status == true){
				$('#error-area').text(result.msg).addClass('text-success');
					$('#frmaddworker')[0].reset();
				}else{
				$('#error-area').text(result.msg).addClass('text-danger');

				}
			}
		})
	});
    $('#schoolyears').on('change',function (){
		
		var frmdata = {};
			frmdata.yearId = $(this).val();

			console.log(frmdata)

			$.ajax({
				url: site_url+'/workers/list_workers',
				method: 'POST',
				dataType:'json',
				data:frmdata,
				success: function(response){
					if (response.status == true) {
		                $('#all_workers').replaceOptions(response.data);

					}else{

		                $('#workersOption').replaceOptions(data.data);
					}
				}
			})

	});
	$('#frmselectschoolyear').on('submit',function(e){
		e.preventDefault();
		var frmdata = $(this).serializeArray();
		url = site_url+'/workers/addtomyschoolyear';
		var result = submit_basicform(url,frmdata);
		console.log(result)
	})
	function submit_basicform(url,frmdata,method="POST",dataType="JSON",result){

			$.ajax({
				url: url,
				method: method,
				dataType:'json',
				data:frmdata,
				beforeSubmit:function(){
					$('.response').removeClass('alert-success')
					$('.response').removeClass('alert-danger')
					$('.response').addClass('text-success').text('Processing...')

				},
				success: function(response){
					result = response;
					$('.response').removeClass('text-success')

					if (response.status == true) {
						$('.response').addClass('alert-success').text(response.msg)
					}else{
						$('.response').addClass('alert-success').text(response.msg)

					}
				},
				error: function(i,e){
					console.log(i.responseText)
					alert('No data was save. Please try again.')
				},
				complete:function(){
					return result;
				}
			})

	}

})

</script>