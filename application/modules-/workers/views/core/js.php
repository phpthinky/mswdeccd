<script type="text/javascript">

	  var d = new Date();
	  var current_date = d.getFullYear() +"/"+(d.getMonth()+1)+"/"+d.getDate();
		var worker_id = '<?=isset($worker_id)? $worker_id : 0 ?>';

$(function(){

		var	w_type = 0;
	//	var table = $('#worker-table');

	  var table = $('#worker-table').DataTable({
        ajax:{url:site_url+'/workers/listall?type='+w_type},
        dom:'Bfrtip',
        buttons:[{

			extend: 'excelHtml5',
			title:'Export to excel',
			attr:{id:'btn-export-1'},
			filename: function(){
				return 'Center-workers-'+current_date;
			}
        }],

      })


	$('#centersOption').on('change',function(){
		console.log($(this).val())
		table.columns(3).search($(this).val()).draw()
	})
	$('#workertype').on('change',function(){
		w_type = $(this).val();
		$('.table-title').text($('#workertype option:selected').text())
		console.log(w_type)
		refreshTable(table,site_url+'/workers/listall?type='+w_type);

	});


    $('#search_worker').on('keyup',function(){
      table.search($(this).val()).draw() ;
    })   

	$(document).on('click','#btn-excel-worker',function() {

		$('#btn-export-1').click()

		//alert('Hello');
	});


	$(document).on('click','.btn-trash.worker',function() {
		// body...
		if (confirm('This worker and his pupils records will be permanently deleted. Make sure you have a backup.')) {
		var w_type = $('#workersOption').val();

		
		var workersId = $(this).data('id');
		var tr = $(this).parent().parent();
		$.ajax({
			url:current_url,
			data:{form:'remove',id:workersId},
			dataType:'text',
			method:'post',
			success:function(response){
				console.log(response)


		refreshTable(table,site_url+'/workers/listall?type='+w_type)
		$(tr).remove()

			}

		})
	
		}	
	})

	$(document).on('click','.btn-edit',function() {
		// body...
		$('a[href="#edit"]').click()
		var workersId = $(this).data('id');

		var data = 0;
		$.ajax({
			url:current_url,
			data:{form:'info',id:workersId},
			dataType:'json',
			method:'post',
			success:function(response){
				console.log(response)
				var data = response;
				var form = $('#frmedit');

				$(form).children($('select[name="centerId"]').val(data.centerId))
				$(form).children($('input[name="workersId"]').val(data.workersId))
				$(form).children($('input[name="fName"]').val(data.fName))
				$(form).children($('input[name="fName"]').val(data.fName))
				$(form).children($('input[name="mName"]').val(data.mName))
				$(form).children($('input[name="lName"]').val(data.lName))
				$(form).children($('input[name="ext"]').val(data.ext))
				$(form).children($('input[name="email"]').val(data.email))
				$(form).children($('input[name="address"]').val(data.address))
				$(form).children($('input[name="birthday"]').val(data.birthDate))
				$(form).children($('input[name="dateHired"]').val(data.dateHired))

			}

		})
	})


	$('#frmedit').on('submit',function(e) {
		// body...
		e.preventDefault();
		var frmdata = $(this).serializeArray();
		$.ajax({
			url:current_url,
			data:frmdata,
			dataType:'json',

			method:'post',
			success:function(response){
				console.log(response)

				if (response.status == true) {
					$('.error-area').addClass('text-success').text(response.msg)

					refreshTable(table,site_url+'/workers/listall?type='+w_type)
				}else{
					$('.error-area').removeClass('text-success').addClass('text-danger').text(response.msg)

				}
			}

		})
	})

var sidebarcollapse = true;
if (sidebarcollapse) {
	$('.sidebar-mini').removeClass('sidebar-open').addClass('sidebar-collapse')
}

	$('#frmschoolyear').on('submit',function(e){
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
		var bday =$(this).children('input[class="birthDate"]').val()
		var center_id = $('#centerId').val();
		if(center_id == 0){
			alert('No center selected');
			return false;
		}
		console.log(frmdata);
		$.ajax({
			url:'<?=site_url('workers/add')?>',
			method: 'POST',
			dataType:'json',
			data: frmdata,
			beforeSend:function(){
				console.log('Processing...');
          	$('.loader').removeClass('d-none');
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
			},
			complete:function(){
          	$('.loader').addClass('d-none');

			}
		})
	});


      $('#frmaddstudents').on('submit',function(e){
        e.preventDefault();

        if ($('#class_schedule').val() == 0) {
        	alert('School Year is required.')
        	return false;
        }
        var frmdata = $(this).serializeArray();
        $.ajax({
          url:'<?=site_url('students/add')?>',
          data: frmdata,
          dataType: 'json',
          method:'POST',
          beforeSend:function(){
          	$('.loader').removeClass('d-none');

          },
          success: function(response){
            console.log(response)
            if (response.status == true) {
              $('#error-area').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
              //$('#frmStudents')[0].reset();
            }else{
              $('#error-area').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);

            }
          },
          error:function (i,e) {
          	// body...
          	console.log(i.responseText)
          },
          complete:function(){
            //refreshTable($('input[name="YearId"]').val(),$('#workersId').val());
          	$('.loader').addClass('d-none');

          }
        })
      });
      $('#StudentType').on('change',function(){
      	/* var i =$(this).val();
      	$(this).val(1)
      	if (i === '2') {
      		$('a[href="#repeater"]').click()
      		console.log(i)
      	}
      	*/
      	var i = $(this).val()
      	if (i === '1') {
      				$('#add-student').removeClass('d-none')
      				$('#search-student').addClass('d-none')

      			}
      	else if (i = '2') {
      				$('#add-student').addClass('d-none')
      				$('#search-student').removeClass('d-none')

      		}     	
      });
      $('#btn-find-oldstudent').on('click',function(){
      	$('#add-student').addClass('d-none')
      				$('#student_id').val(0)
      	var frmdata = {};
      		frmdata.keys = $('#searcholdstudent').val()

      	$.ajax({
      		url:site_url+'/students/find',
      		data:frmdata,
      		dataType:'json',
      		method:'POST',
      		success:function(response){
      			console.log(response)
      			if (response.status == true) {
      				$('#repeater-result').html(response.data);
      				 $('#repeater-result').append($('<hr>'));
      				 $('#repeater-result').append($('<span/>').text('If student not in a database.'));
      				 $('#repeater-result').append($('<div/>').html($('<button/>').attr('type','button').addClass('btn btn-primary btn-sm btn-input').text('Click here to add as new')))
      			
      			}else{
      				$('#repeater-result').html($('<span/>').text('No found in database.'));
      				$('#repeater-result').append($('<div/>').html($('<button/>').attr('type','button').addClass('btn btn-primary btn-sm btn-input').text('Click here to add as new')))
      			}
      		},
      		error:function (i,e) {
      			// body...
      			console.log(i.responseText)
      		}
      	})
      })
      $(document).on('click','.btn-input',function(){
      	$('#add-student').removeClass('d-none')
      				$('#repeater-result').html('');

      })
      $(document).on('click','.btn-select',function () {
      	// body...
      	//alert('Hello')
      	var formdata = {}
      		formdata.student_id = $(this).data('id')
      		formdata.year_id = $('input[name="class_schedule"]').val();
      		formdata.type = $('input[name="StudentType"]').val()
      		formdata.action = 'select';

      	$.ajax({
      		url:site_url+'/students/info',
      		data:formdata,
      		dataType:'json',
      		method:'post',
      		success:function(response){
      			console.log(response)
      				$('#repeater-result').html('');
      			if (response.status == true) {
      				
      				$('#add-student').removeClass('d-none')
      				$.each(response.data,function(i,e){
      					//console.log(e)
      					$('#frmaddstudents').children($('[name="'+i+'"]').val(e));
      				})

      			}


      		}
      	});
      })

	$(document).on('click','.btn-edit-student',function() {
		// body...
		$('a[href="#editStudents"]').click()
		
		var formdata = {}
      	formdata.student_id = $(this).data('id')
        $('select#e_class_schedule').val($(this).data('year_id'))
      	

		var data = 0;
		$.ajax({
			url:site_url+'/students/info',
			data:formdata,
			dataType:'json',
			method:'post',
			beforeSend:function(){
          	$('.loader').removeClass('d-none');

			},
			success:function(response){
        $('.loader').addClass('d-none');
				var data = response.data;
				console.log(data)
				var form = $('#frmeditstudents');
				$.each(data,function(i,v){
					$(form).children($('[name="'+i+'"]').val(v));
				})

			}

		})
	})
	$('#frmeditstudents').on('submit',function (e) {
		// body...
		e.preventDefault()
		var formdata =$(this).serializeArray();
//		alert('Not yet available.')
		
		var data = 0;
		$.ajax({
			url:site_url+'/students/update',
			data:formdata,
			dataType:'json',
			method:'post',
			beforeSend:function () {
				// body...
          	$('.loader').removeClass('d-none');

			},
			success:function(response){
				console.log(response)
            if (response.status == true) {
              $('.ajax-response-edit').removeClass('alert alert-danger').addClass('alert alert-success').text(response.msg);
            }else{
              $('.ajax-response-edit').removeClass('alert alert-success').addClass('alert alert-danger').text(response.msg);

            }

			},
			complete:function () {
				// body...

          	$('.loader').addClass('d-none');
			}

		})

	})

	$(document).on('click','#btn-add-student',function(){
		$('#class_schedule').val($('#home-classess').val());
		$('a[href="#addStudents"]').click()

	})

	$(document).on('click','#btn-export-worker-students',function(){
		var year_id = $('select#home-classess').val();
		var form = $('<form/>',{'action':site_url+'/export/worker_student/','method':'POST','target':'excel_export'});
				$(form).append($('<input/>',{'name':'year_id','value':year_id,'type':'hidden'}))
				$(form).append($('<input/>',{'name':'worker_id','value':worker_id,'type':'hidden'}))
				$(form).addClass('d-none')
				$('body').append($(form))
				$(form).submit();

	})

//
	$(document).on('click','.btn-remove-student',function(){

		var id = $(this).data('id');
		var tr = $(this).parent().parent()
		var year_id = $(this).data('year_id')
		if (confirm('This will delete your pupils data. Click OK to continue.')) {
					$(tr).remove()
		
		var formdata = {};
			formdata.student_id = id;
			formdata.year_id = year_id;
			formdata.form = 'remove_student';
			
		//submit_basicform(current_url,formdata)
			$.ajax({
				url: current_url,
				data:formdata,
				dataType:'json',
				method:'POST',
				success:function(i){
					//console.log(i)
				},
				error:function(i,e){
					console.log(i.responseText)
				}
			})

			//return false;
		}
	})
	
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
					alert('No input data. Please try again.')
				},
				complete:function(){
					return result;
				}
			})

	}
	var table_schoolyear = $('#table-list-schoolyear');
		table_schoolyear.DataTable({
			ajax:site_url+'/workers/listmyschoolyear/0'
		});

	$(document).on('click','.btn-trash-schoolyear',function(){

		var id = $(this).data('id');
		var tr = $(this).parent().parent()

		if (confirm('This will delete your assigned school year including your pupils data.')) {
		
		var formdata = {};
			formdata.id = id;
			formdata.form = 'remove_schoolyear';
		//submit_basicform(current_url,formdata)
			$.ajax({
				url: current_url,
				data:formdata,
				dataType:'json',
				method:'POST',
				success:function(i){
					//console.log(i)
					$(tr).remove()
				},
				error:function(i,e){
					console.log(i.responseText)
				}
			})

			//return false;
		}
	})


var table_mystudents = $('#tblmystudents');
/*
      tblmystudents.DataTable({
        ajax:site_url+'/workers/students/'+worker_id
      })

      */

  
    $('#searchstring').on('keyup',function(){
      table_mystudents.DataTable().search($(this).val()).draw() ;
    })    
/*
		$('#frmfindmystudent select[name="class_schedule"]').on('change',function(e){
			//alert($(this).val())
			var class_schedule = $(this).val()
			var	formdata = {};
				formdata.class_schedule = class_schedule;

				tblmystudents.DataTable({
        	ajax:{
	        	url:site_url+'/workers/students/'+worker_id,
	        	type:'POST',
	        	data:formdata
	        },
	        destroy:true
				})

		})
*/

    $('#select-home-classess').on('change',function(){
    //	alert('Hello')

			var class_schedule = $(this).val()
			var	formdata = {};
				formdata.class_schedule = class_schedule;
		//	const table_mystudents = $('#tblmystudents');
			table_mystudents.draw_students_table(formdata);
			table_mystudents.on('click','.btn-remove',function (e) {
				// body...
				e.preventDefault()
				var id = $(this).data('id')
				$.ajax({
					url:current_url,
					data:{student_id:id,year_id:class_schedule,form:'remove_student'},
					method:'post',
					error:function(i,e){
						console.log(i.responseText)
					}
				})
				$(this).parent().parent().remove()
			//table_mystudents.draw_students_table(formdata);

			})

    });
    $.fn.draw_students_table = function(formdata){
    		$(this).DataTable({
        	ajax:{
	        	url:site_url+'/workers/students/'+worker_id,
	        	type:'POST',
	        	data:formdata
	        },
	        columns:[
	        {data:'no'},
	        {data:'name'},
	        {data:'age'},
	        {data:'gender'},
	        {data:'address'},
	        {data:'student_type'},
	        {data:'class_schedule'},
	        {data:null,
	        	render: function(data,type){
	        		return '<a href="../students/nutritions/'+data.id+'" class="btn btn-sm btn-outline-info">Nutritions</a> <a href="../students/assessments/'+data.id+'" class="btn btn-sm btn-outline-info">Assessments</a>';  
	        	}

	      	},
	        {data:null,
							render: function(data,type){
	        		return '<a href="#" class="btn btn-sm btn-outline-info btn-edit" data-id="'+data.id+'"><i class="fa fa-edit"></i></a>'+
	        		 ' '+'<a href="#" class="btn btn-sm btn-outline-danger btn-remove" data-id="'+data.id+'"><i class="fa fa-trash"></i></a>';  
	      			}
	      	}
	        ],
	        destroy:true
				});

    }
    $('#btn-refresh-table').on('click',function(){
    	var class_schedule = $('#select-home-classess').val();
    	var formdata = {}
    			formdata.class_schedule = class_schedule
    			table_mystudents.draw_students_table(formdata);
    })
		$('#select-home-classess').trigger('change');

		$('#btn-add-weighing').on('click',function() {
			// body...
			$('a[href="#weighing"]').click();
			$('#select-add-weighing-schoolyear').val($('#nutritions-classess').val())
			$('#select-add-weighing-schoolyear').trigger('change');
		})

		$('#select-add-weighing-schoolyear').on('change',function (argument) {
			// body...
			var select = $('#select-add-weighing-student');
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
		})
		})

	
</script>
<?php include_once('student_js.php'); ?>
<?php include_once('assess-js.php'); ?>