	var table = $('#reports-feeding')
	var settings;
$(function(){
	table.DataTable({
		dom:'Bfrtip',
		buttons:['excel']
		});
	$('#btn-go-filter-feeding').on('click',function(){
		var year_id = $('#filter-school-year').val()
		window.location = '<?=site_url('reports/feeding/')?>'+year_id;
	})




	$('.generate-report-all').on('click',function(){

		$('.btn-print').removeClass('disabled')
		$('.center_name').text($('#report_select_center option:selected').text())
		$('.school_year').text($('#school_year_ass option:selected').text())
		$('.assessment_type').text($('#ass_type option:selected').text())
		$('.assessment_schedule').text($('#ass_schedule option:selected').text())
		//var frmdata = $('#frm_domain_report_all').serializeObject();
		var center_id =$('#report_select_center').val();
		var year_id =$('#school_year_ass').val();
		var type =$('#ass_type').val();
		var schedule =$('#ass_schedule').val();

		$.ajax({
			url:site_url+'/reports/get_assessment_all/'+center_id+'/'+year_id+'/'+type+'/'+schedule+'/',
			dataType:'json',
			beforeSend:function(){


			$('#table-assessment-report tbody').html('')
			},
			success:function (response) {
				// body...
				if (response.data.length > 0) {
					//console.log(response.data)
					$('#table-assessment-report').draw_domain_table_all(response.data)
				}
			
			},
			error:function(i,e){
				console.log(i.responseText)
			}
		})


	});

	$.fn.draw_domain_table_all = function(data){
		var table = $(this)
		var tbody = $(table).children('tbody');

			$(tbody).html('')
		$.each(data,function(i,d){
			//console.log(d.no);
			$(tbody).append($('<tr/>').append(
				'<td>'+d.no+'</td>'+
				'<td>'+d.student_name+'</td>'+
				'<td>'+d.gross_motor+'</td>'+
				'<td>'+d.fine_motor+'</td>'+
				'<td>'+d.self_help+'</td>'+
				'<td>'+d.expressive_lang+'</td>'+
				'<td>'+d.receiptive_lang+'</td>'+
				'<td>'+d.cognitive+'</td>'+
				'<td>'+d.social_emotion+'</td>'
				));
		})

	};

	$('.generate-report').on('click',function(){
		$('.btn-print').removeClass('disabled')
		$('.center_name').text($('#report_select_center option:selected').text())
		$('.assessment_domain').text($('#report_select_domain option:selected').text())
		$('.school_year').text($('#school_year_ass option:selected').text())
		$('.assessment_type').text($('#ass_type option:selected').text())
		$('.assessment_schedule').text($('#ass_schedule option:selected').text())
		
		var frmdata = $('#frm_domain_report').serializeObject();
		//console.log(frmdata)

			$.ajax({
				url:site_url+'/reports/get_assessment',
				method:'POST',
				data:frmdata,
				dataType:'json',
				success:function (response) {
					console.log(response)
					$('.assessment_date').text(response.date_assessment)

						var table = $('table#table-assessment-report tbody');
						var data = response.data
						var j =1;
						//for (var i = data.length - 1; i >= 0; i--) {
						$(table).html('');
						$.each(data,function(i,d){
						$(table).append($('<tr/>').append($('<td/>').text(j)).append($('<td/>').text(d.student_name)).append($('<td/>').text(d.score)))
							
							j++;
						});
					//}
				},

				error:function (i,e) {
					console.log(i.responseText)
				}
			});

	})

})

	$(window).on('beforeprint',function(){

		table.DataTable().destroy()
	})


	$(window).on('afterprint',function(){
		
		table.DataTable({
			destroy:true,
			dom:'Bfrtip',
			buttons:['excel']
		})
	})
	$('#btn-excel').on('click',function(){
		$('.buttons-excel').click()
	})
	$('#btn-filter').on('click',function(){
		
		$('#filter-report').removeClass('d-none')
		$('.card').addClass('d-none')
		$('.buttons').addClass('d-none')
	})

	$('#ass_type').on('change',function(){
		var i = $(this).val();
		//console.log(i)
		if (i == '1') {
			$('.r_schedule').removeClass('d-none');
			$('.s_schedule').addClass('d-none');
		}
		if (i == '2') {
			console.log(2)
			$('.r_schedule').addClass('d-none');

			$('.s_schedule').removeClass('d-none');
		}

	})
