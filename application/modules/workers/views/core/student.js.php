	$(function(){
		var worker_id = '<?=isset($worker_id)? $worker_id : 0 ?>';
		//var home_classess_selected = $('#home-classess').prop("selectedIndex",1).val();
		//$('#home-classess').val(home_classess_selected)
		//$('#home-classess').trigger('change');

		$(document).on('change','.home-class-schedule',function(){
			$('.class-schedule').val($(this).val());
			//$('#select-add-weighing-schoolyear').trigger('change');
			
		})


	function refresh_nutrition_table(worker_id,year_id,weighing) {
		// body...
		//alert('Hello')
			  //var table = $('#tbl_nutritions');
			  tbl_nutritions.DataTable({
					ajax:{
		        	url:site_url+'/workers/student_nutritions/'+worker_id+'/'+year_id+'/'+weighing,
		        	},
		        	destroy:true
				})


	}



	$(document).on('click','#btn-export-student-nutritions',function(){
		var year_id = $('select#nutritions-classess').val();
		var weighing = $('select#n_date_weighing').val();
		var form = $('<form/>',{'action':site_url+'/export_eccd/export_worker/','method':'POST','target':'excel_export'});
				$(form).append($('<input/>',{'name':'year_id','value':year_id,'type':'hidden'}))
				$(form).append($('<input/>',{'name':'weighing','value':weighing,'type':'hidden'}))
				$(form).append($('<input/>',{'name':'worker_id','value':'<?=isset($worker_id) ? $worker_id : 0?>','type':'hidden'}))
				$(form).addClass('d-none')
				$('body').append($(form))
				$(form).submit();
				$(form).remove();

	})

		$('#nutritions-classess').on('change',function(){

			if($(this).val() === '0'){
				tbl_nutritions.DataTable({destroy:true,data:[]});
				//var tbl = $(tbl_nutritions).children();
				//$(tbl[1]).html('')
				//tbl_nutritions.DataTable({data:false});
			return false;

			};
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

  
    $('#searchstring_nutritions').on('keyup',function(){
      tbl_nutritions.DataTable().search($(this).val()).draw() ;
    })

$('#nutritions-classess').trigger('change')


	$('select#n_date_weighing').on('change',function(e) {
		// body...
		//alert('Hello')

		var year_id = $('select#nutritions-classess').val();
		var weighing = $('select#n_date_weighing').val();

		refresh_nutrition_table(worker_id,year_id,weighing);
	})

	//end onload
	})

