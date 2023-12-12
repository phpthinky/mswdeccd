<script type="text/javascript">
	$(function(){
		var worker_id = '<?=isset($worker_id)? $worker_id : 0 ?>';

		$(document).on('change','.home-class-schedule',function(){
			$('.class-schedule').val($(this).val());
			//$('#select-add-weighing-schoolyear').trigger('change');
			
			setTimeout(function(){
			$('#nutritions-classess').trigger('change');

			},2000)
		})



	$(document).on('click','#btn-export-student-nutritions',function(){
		var year_id = $('select#nutritions-classess').val();
		var weighing = $('select#n_date_weighing').val();
		var form = $('<form/>',{'action':site_url+'/export/worker_student_nutrition/','method':'POST','target':'excel_export'});
				$(form).append($('<input/>',{'name':'year_id','value':year_id,'type':'hidden'}))
				$(form).append($('<input/>',{'name':'weighing','value':weighing,'type':'hidden'}))
				$(form).append($('<input/>',{'name':'worker_id','value':'<?=isset($worker_id) ? $worker_id : 0?>','type':'hidden'}))
				$(form).addClass('d-none')
				$('body').append($(form))
				$(form).submit();

	})

		$('#nutritions-classess').on('change',function(){
			var form = $(this).closest('form')
				var year_id = $(form).children().find('select[name="class_schedule"]').val()
				var weighing = $(form).children().find('select[name="date_weighing"]').val()

					tbl_nutritions.DataTable({
						ajax:{
	        	url:site_url+'/workers/student_nutritions/'+worker_id+'/'+year_id+'/'+weighing,
	        },
	        destroy:true
					})



		});
		var tbl_nutritions = $('#tbl-nutritions');

		tbl_nutritions.DataTable();

		$('#form-weighing').on('submit',function(e){
			e.preventDefault();
			var formdata = $(this).serializeArray();
			var msg = $(this).children().find('.results');
					$.ajax({
						url:site_url+'/workers/studentweighing/',
						data: formdata,
						dataType:'json',
						method:'POST',
						success:function(response){
							if (response.status == true) {
							$(msg).addClass('text-success').text(response.msg)

							}else{
								$(msg).addClass('text-danger').text(response.msg)

							}
						},
						error:function (i,e) {
							// body...
							console.log(i.responseText)
						}
					})


		})

	$(document).on('click','.btn-trash.nutritions',function() {
		// body...
		if (confirm('This will delete this child nutritions data.')) {
		
		//	return false;

		var tr = $(this).parent().parent();
		var id = $(this).data('id')
		$.ajax({
			url:current_url,
			data:{form:'remove_nut',id:id},
			dataType:'text',
			method:'post',
			success:function(response){
				console.log(response)


		refresh_nutrition_table()
		$(tr).remove()

			}

		})
	
		}	
	})




	})

	function refresh_nutrition_table(worker_id,year_id,weighing) {
		// body...
			  var table = $('#tbl_nutritions');
			  table.DataTable({
					ajax:{
		        	url:site_url+'/workers/student_nutritions/'+worker_id+'/'+year_id+'/'+weighing,
		        	},
		        	destroy:true
				})


	}
</script>