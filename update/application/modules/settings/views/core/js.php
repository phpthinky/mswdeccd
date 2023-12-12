<script type="text/javascript">

$(function(){
	'use strict'

	$('#frmschoolyear').on('submit',function(e){
		e.preventDefault();

		var frmdata =  $(this).serializeArray();
		//console.log(frmdata);
		$.ajax({
			url:current_url,
			method: 'post',
			dataType:'json',
			data: frmdata,
			success: function(result){
				console.log(result)
				if(result.status == true){
				$('#error-area').addClass('alert alert-success').text(result.msg);

				}else{

				$('#error-area').addClass('alert alert-danger').text(result.msg);

				}
			},
			error: function (i,e) {
				// body...
				console.log(i.responseText)
			}
		})
	})


	$('#e_frmschoolyear').on('submit',function(e){
		e.preventDefault();

		var frmdata =  $(this).serializeArray();
		$.ajax({
			url:current_url,
			method: 'post',
			dataType:'json',
			data: frmdata,
			success: function(result){
				console.log(result)
				if(result.status == true){
				$('#error-area').addClass('alert alert-success').text(result.msg);
				$('#e_frmschoolyear')[0].reset()

				}else{

				$('#error-area').addClass('alert alert-danger').text(result.msg);

				}
			},
			error: function (i,e) {
				// body...
				console.log(i.responseText)
			}
		})
	})


	$(document).on('click','.btn-remove-class',function(e){
		e.preventDefault();
		var parent  = $(this).parent().parent()
				$(parent).remove()
		
		var formdata =  {};
				formdata.form='Remove';
				formdata.id = $(this).data('id')
		$.ajax({
			url:current_url,
			method: 'post',
			dataType:'json',
			data: formdata,
			success: function(result){
				console.log(result)
			},
			error: function (i,e) {
				// body...
				console.log(i.responseText)
			}
		})
	})
	 var table =   $('#tblSchoolYear');
      table.DataTable({
        ajax:"<?=site_url('settings/listschoolyears')?>"
      })
   $(document).on('click','.btn-edit-schoolYear',function(){

   	var tr = $(this).parents('tr'); 		
   		var td = $(tr).children()
   				var td1 = $(td[1]).find('input').val()
   				var td2 = $(td[2]).find('input').val()
   							$('#e_YearId').val($(td[0]).text())
	   						$('#e_startdate').val(td1)
	   						$('#e_enddate').val(td2)
	   						$('a[href="#edit"]').click()
   })
	function refreshTable(table){
		table.DataTable().clear().destroy();
	}

	$('#frmrawscore').on('submit',function(e){
		e.preventDefault();

		var frmdata =  $(this).serializeArray();
		//console.log(frmdata);
		$.ajax({
			url:"<?=site_url('settings/rawscoretable')?>",
			method: 'post',
			dataType:'json',
			data: frmdata,
			beforeSend: function(){
				console.log('processing')
			$('#error-area').removeClass('alert').text('');
			$('#error-area').removeClass('alert').text('');

			},
			success: function(result){
				console.log(result)
				if(result.status == true){
				$('#error-area').addClass('alert alert-success').text(result.msg);
				$('#frmschoolyear')[0].reset()

				}else{

				$('#error-area').addClass('alert alert-danger').text(result.msg);
				}
			},
			error: function (i,e) {
				// body...
				console.log(i.responseText)
			},
			complete:function(){
				setInterval(function(){
				$('#error-area').removeClass('alert alert-success').text('');
				$('#error-area').removeClass('alert alert-danger').text('');
				$('#frmschoolyear')[0].reset()
				},15000)
			}
		})
	})
	function resetinputstyle(input) {
		// body...
		$(input).removeClass('is_warning')
		$(input).removeClass('is_valid')
		$(input).removeClass('is_danger')
	}
	var timeout;
 	var keyupdelay = 1000;
 		

	$('input[name="scaled_score"]').on('keyup',function(){
		var frmdata = {}
		var input = $('input[name="raw-score"]');
		frmdata.form = 'scaled_score';
 		frmdata.scaled_score =  $(this).val();

 		$('.alert').addClass('text-success').text('Processing...')

 		clearTimeout(timeout);
 		timeout = setTimeout(function(){

 		if (frmdata.scaled_score.length <= 0) {
				$('.score-area').addClass('d-none');
 			 	$('.alert').removeClass('text-success').text('')		
 			return false;
 		}
			sendajax(frmdata);
			
 		},keyupdelay)

	})
	function sendajax(frmdata) {
		// body...

				$.ajax({
					url:current_url,
					data: frmdata,
					dataType:'json',
					method:'post',
					beforeSend:function(){
						$('.score-area').addClass('d-none');
					},
					success:function(response){
						console.log(response)
						if(response.status == 0){							
							$('.score-area').removeClass('d-none');
						}
					},
		      complete: function(i,e){
		        

 			 		$('.alert').removeClass('text-success').text('')

		      },
				})
				

	}

	$('#frmaddscaledscore').on('submit',function(e){
		e.preventDefault();
		var frmdata = $(this).serializeArray();
				frmdata.push({name:'form',value:'add'});

			//	
		

				$.ajax({
					url:current_url,
					data: frmdata,
					dataType:'json',
					method:'post',
					beforeSend:function(){
 			 		$('.alert').addClass('text-success').text('Processing...')
					
					},
					success:function(response){
						if (response.status == true) {
 			 		$('.alert').removeClass('text-success').addClass('alert-success').text('Added successfullly.')
 			 			resetAll();
						}else{
 			 		$('.alert').removeClass('alert-success').addClass('alert-danger').text(response.msg)

						}
					}
				})


		//console.log(frmdata);
	});
	function resetAll(){

		      	setTimeout(function(){
  		 			 		refreshTableData(tablerawscoresno1,current_url+'/list');
       
 			 					$('#frmaddscaledscore')[0].reset();
								$('.score-area').addClass('d-none');
					 			$('.alert').removeClass('alert-success').text('')
 					 			$('.alert').removeClass('alert-danger').text('')
 			 					$('.alert').removeClass('text-success').text('')


		      	},2000)
	}

	 var tablescore =   $('#table-list-data');
      tablescore.DataTable({
        ajax:current_url+'/list'
      })

	function refreshTableData(atable,url){
		atable.DataTable().clear().destroy();
		atable.DataTable({
        ajax:url
      })

	}
	$(document).on('click','.btn-remove',function(){
		var id = $(this).data('id');
		$(this).parent().parent().remove();
		$.ajax({
			url:current_url,
			data:{form:'remove',id:id},
			method:'POST',
			complete:function(){
  		 			 		refreshTableData(tablescore,current_url+'/list');

			}
		})
	})
	$(document).on('click','#addmoreraw',function(){
		var tr = '<tr><td><input type="text" name="scaled_score[]" class="form-control"></td><td><input type="text" name="gross_motor[]" class="form-control"></td><td><input type="text" name="fine_motor[]" class="form-control"></td><td><input type="text" name="self_help[]" class="form-control"></td><td><input type="text" name="receiptive_lang[]" class="form-control"></td><td><input type="text" name="expressive_lang[]" class="form-control"></td><td><input type="text" name="cognitive[]" class="form-control"></td><td><input type="text" name="social_emotion[]" class="form-control"></td><td><a href="#" class="btn btn-default btn-sm btn-remove-more"><i class="fas fa-trash"></i></a></td></tr>';
				$('#tableform-add tbody').append(tr);
	})
	$(document).on('click','.btn-remove-more',function(){
		$(this).parent().parent().remove()
	});
$(document).on('click','#addmoreraw-2',function(){
		var tr = '<tr><td><input type="text" name="scaled_score[]" class="form-control"></td><td><input type="text" name="standard_score[]" class="form-control"></td><td class="d-none"><input type="text" name="record_no[]" class="form-control" value="2"></td><td></td></tr>';
				$('#tableform-add tbody').append(tr);
	})
	$(document).on('click','.btn-remove-more',function(){
		$(this).parent().parent().remove()
	});
$(document).on('click','.btn-save',function(){
				//$('#tablerawscoresno1-add tbody tr').remove();

	var frmdata = $('#form-add').serializeArray();
	//console.log(frmdata)
	$.ajax({
		url:current_url,
		data:frmdata,
		dataType:'text',
		method:'POST',
		success:function(response){
			console.log(response)
				$('#tableform-add tbody tr').remove();

		},
					complete:function(){
  		 			 		refreshTableData(tablescore,current_url+'/list');

			}

	})
	});
	$('#select_age_limit').on('change',function(){
		var age_limit = $(this).val();
  	refreshTableData(tablescore,current_url+'/list/'+age_limit);



	});

	 var tablewfh =   $('#table-zscore');
      tablewfh.DataTable({
        ajax:current_url+'?form=list'
      })
	$('#form-add-wfh').on('submit',function (e) {
		// body...
		e.preventDefault();
		var formdata = $(this).serializeArray	();

		$.ajax({
		url:current_url,
		data:formdata,
		dataType:'json',
		method:'POST',
		success:function(response){
			console.log(response)
		},
					complete:function(){
  		 			 		refreshTableData(tablewfh,current_url+'?form=list');

			}

	})
	});

});
</script>