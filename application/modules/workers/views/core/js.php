<script type="text/javascript">
$(function(){
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
	})


})

</script>