<script type="text/javascript">
	$(function(){
		$('a[href="#tab-assessment"]').on('click',function(){$('#assessment-classess').trigger('change')})
		$('#assessment-classess').on('change',function () {
			// body...
		var sy = $(this).val()
		$('#select-add-ass-schoolyear').val(sy)
		refresh_ass_table();
		})

		$('#ass_type').on('change',function () {
			// body...

		refresh_ass_table();

		})
		function refresh_ass_table() {
			// body...

			var worker_id = '<?=isset($worker_id)? $worker_id : 0 ?>';
			var year_id = $('#select-add-ass-schoolyear').val();
			var type = $('#ass_type').val();
			$('#ass-table').DataTable({
				ajax:{
					url:site_url+'/assessment/list_by_worker/'+worker_id+'/'+year_id+'/'+type,
					
				},
				destroy:true
			});

		}
		$('#assessment-classess').trigger('change');
		$('#btn-add-assessment').on('click',function() {
			// body...
			$('#ass_card_add').removeClass('d-none')
			$('#ass_card_view').addClass('d-none')
		})
		$('#btn-cancel-ass').on('click',function() {
			// body...
			$('#ass_card_add').addClass('d-none')
			$('#ass_card_view').removeClass('d-none')
		})

		$('#btn-export-student-assessment').on('click',function() {
			// body...

			var worker_id = '<?=isset($worker_id)? $worker_id : 0 ?>';
			var year_id = $('#select-add-ass-schoolyear').val();
			var type = $('#ass_type').val();
            window.open(site_url+'/export/assessment/'+worker_id+'/'+year_id+'/'+type);

		})
		

    $('#select-add-ass-schoolyear').on('change',function (){
		
			/*
			var edata = {}
				edata.data = {value:0,text:'No data'}
							// body...
			var select = $('#select-add-ass-student');
			console.log(worker_id)
			var formdata = {};
					formdata.form = 'select';
					formdata.class_schedule = $(this).val();

					$.ajax({
						url:site_url+'/workers/select_students/'+worker_id,
						data: formdata,
						dataType:'json',
						method:'POST',
						success:function(response){
							console.log(response)
							$(select).replaceOptions(response.data)
						}
					})

					*/
		
	});

	$('#form-assessment').on('submit',function(e){
		e.preventDefault();
		var frmdata = $(this).serializeArray();

			$.ajax({
				url: site_url+'/assessment/add',
				method: 'POST',
				dataType:'json',
				data:frmdata,
				success: function(response){
					console.log(response)
					if (response.status == true) {
		               
						$('.results').text(response.msg)
					}else{
					
					}
				}
			})

	});
	$('.raw-score').on('change',function(){
		var input_name = $(this).attr('name');
		console.log(input_name);
		var frmdata = {};
			frmdata.student_id = $('#select-add-ass-student').val()
			frmdata.raw_score = input_name;
			frmdata.raw_score_val = $('input[name="'+input_name+'"]').val();
			//frmdata.year_id = $('#select-add-ass-schoolyear').val();

			$.ajax({
				url: site_url+'/assessment/get_score',
				method: 'POST',
				dataType:'json',
				data:frmdata,
				success: function(response){
					console.log(response)
					if (response.status == true) {
		               $('input[name="'+input_name+'_s"]').val(response.score)
						$('.results').text(response.msg)
						gt_total_score(1)
					}else{
					
					}
				},
				error:function(i,e){
					console.log(i.responseText)
				}
			})
	})
	function gt_total_score(type) {
		// body...
			var gross = $('input[name="gross_motor"]').val()
			var fine = $('input[name="fine_motor"]').val()
			var self_help = $('input[name="self_help"]').val()
			var expressive = $('input[name="expressive_lang"]').val()
			var receiptive = $('input[name="receiptive_lang"]').val()
			var cognitive = $('input[name="cognitive"]').val()
			var social = $('input[name="social_emotion"]').val()
			var total = gross+fine+self_help+expressive+receiptive+cognitive+social;
			$('input[name="raw_score"]').val(total)
			var gross = $('input[name="gross_motor_s"]').val()
			var fine = $('input[name="fine_motor_s"]').val()
			var self_help = $('input[name="self_help_s"]').val()
			var expressive = $('input[name="expressive_lang_s"]').val()
			var receiptive = $('input[name="receiptive_lang_s"]').val()
			var cognitive = $('input[name="cognitive_s"]').val()
			var social = $('input[name="social_emotion_s"]').val()
			var total = gross+fine+self_help+expressive+receiptive+cognitive+social;
			$('input[name="scaled_score"]').val(total)

	}

	$('#btn-print-student-assessment').on('click',function() {
		window.print()
	})
	var table_domain_score = $('#table_domain_score');


    $.fn.draw_domain_score = function(formdata){
    		$(this).DataTable({
        	ajax:{
	        	url:site_url+'/assessment/list_by_domain/'+worker_id,
	        	type:'POST',
	        	data:formdata
	        },
	        columns:[
	        {data:'no'},
	        {data:'student_name'},
	        {data:'gross_motor'},
	        {data:'fine_motor'},
	        {data:'self_help'},
	        {data:'expressive_lang'},
	        {data:'receiptive_lang'},
	        {data:'cognitive'},
	        {data:'social_emotion'}
	        ],
	        destroy:true
				});

    }
    $('#score_type').on('change',function () {
    	// body...
    	var formdata = {};
    		formdata.worker_id = worker_id;
    		formdata.type = $('#score_type').val();
    		formdata.schedule = $('#ass_type').val();
    		formdata.year_id = $('#assessment-classess').val();
    		console.log(formdata)
			table_domain_score.draw_domain_score(formdata)
    		/*$.ajax({
    			url:site_url+'/assessment/list_by_domain',
    			method:'POST',
    			data:formdata,
    			success:function (argument) {
    				// body...
    				console.log(argument)
    			},
    			error:function (i,e) {
    				// body...
    				console.log(i.responseText)
    			}
    		})*/
    })
    $('a[href="#tab-domain"]').on('click',function(){
    	$('#score_type').trigger('change')
    })

	});
</script>