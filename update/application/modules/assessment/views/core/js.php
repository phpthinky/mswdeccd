<link rel="stylesheet" href="<?=base_url('assets')?>/plugins/jquery-ui/jquery-ui.min.css"></link>
<script src="<?=base_url('assets')?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript">
	var table = $('table#tablegrossmotor')

$(function(){

    $('#select-add-ass-schoolyear').on('change',function (){
		
			var worker_id = '<?=isset($worker_id)? $worker_id : 0 ?>';

			var edata = {}
				edata.data = {value:0,text:'No data'}
							// body...
			var select = $('#select-add-ass-student');
			

		$('input:checkbox').attr('checked',false);
		$('.btn-save').removeClass('disabled');

			var formdata = {};
					formdata.form = 'select';
					formdata.class_schedule = $(this).val();

					$.ajax({
						url:site_url+'/workers/select_students/'+worker_id,
						data: formdata,
						dataType:'json',
						method:'POST',
						success:function(response){
					//		console.log(response)
							if (response.status == true) {
								$(select).replaceOptions(response.data)
								$('#select-add-ass-student').trigger('change')
							}else{
								$(select).replaceOptions([{value:0,text:'No Student found!'}])

							}
						}
					})
		
	});
	$('#select-add-ass-student').on('change',function() {
		// body...
		$('input:checkbox').attr('checked',false);
		$('.btn-save').removeClass('disabled');

								setTimeout(function(){
									get_checked(1)
									get_checked(2)
									get_checked(3)
								},500)

	})
	function get_checked(type) {
		// body...
		var student_id = $('#select-add-ass-student').val()
		var formdata = {};
			formdata.student_id = student_id;
			formdata.type = type;

					$.ajax({
						url:site_url+'/assessment/get_checked',
						data: formdata,
						dataType:'json',
						method:'POST',
						success:function(response){
							//console.log(response)
								checker(response.data,type)
				
						},
						error:function (i,e) {
							i.responseText
						}
					})

	}
	function checker(data,type) {
		// body...
		$.each(data,function(i,d){

			if (d == null) {
				$('.'+i+'-'+type).attr('checked',false)
			}else{
				$.each(d,function (a,v) {
					//console.log(v)
									$('.'+i+'-'+type+'-'+v).attr('checked',true)
				})
				$('.btn-save.'+i+'-'+type).addClass('disabled')
			}
		})
	}
//	$('#btn-update-position').on('click',function(){

		$('#tablegrossmotor tbody').sortable({

			start: function(e,ui){
				var elements = ui.item.siblings('.selected.hidden').not('.ui-sortable-placeholder');
					ui.item.data('items',elements);
			},
			update: function(e,ui){
				ui.item.after(ui.item.data("items"));
			},
			stop: function(e,ui){
				ui.item.siblings('.selected').removeClass('hidden');
				$('tr.selected').removeClass('selected');

				setTimeout(function(){
					update_position();
				},200)
			
			}
		});	
//	
	$('#btn-reload').on('click',function(){
		location.reload()
	})

	$('form').on('submit',function(){
		var formdata = $(this).serializeArray();
		  $.ajax({
        url:site_url+'/assessment/domain_questions/add',
        data:formdata,
        dataType:'json',
        method:'POST',
        success:function(response){

        	get_response(response)

        },error:function(i,e){
                console.log(i.responseText)
        }
      })
	})
})

	function update_position() {
		// body...
		var data = [];
		$('#tablegrossmotor tbody tr').each(function(i,v){
			var tr_id = $(this).data('id')
			data[i] =  tr_id;

		})
		var formdata = {};
			formdata.domain = data;
		$.ajax({
			url:current_url+'/update_position',
			data:formdata,
			method:'POST'
		})
		//console.log(data);
		

		

	}

	$(document).on('click','.btn-trash',function(){
		var id = $(this).data('id');
		var tr = $(this).parent().parent();
		$.ajax({
			url:current_url+'/remove',
			data:{'id':id},
			method:'POST',
			success: function(){
				$(tr).remove()
			}
		})

	})


	$(document).on('click','.btn-save',function(){
		
		if ($(this).hasClass('disabled')) {
			return false;
		}
		var student_id = $('#select-add-ass-student').val();
		var date_assessment = $('#date_assessment').val();

		if (student_id <= 0) {
			alert('No student selected.')
			return false;
		}
		var type= $(this).data('type');
		var domain = $(this).data('domain');
		var checked = $('.'+domain+'-'+type+':checkbox:checked')
		var unchecked = $('.'+domain+'-'+type+':checkbox:not(:checked)')
		var frmdata = {};
			frmdata.checked = [];
		$.each(checked,function(){
			frmdata.checked.push($(this).data('id'))
		})
			frmdata.unchecked = [];
		$.each(unchecked,function(){
			frmdata.unchecked.push($(this).data('id'))
		})

		frmdata.domain = domain;
		frmdata.type = type;
		frmdata.student_id = student_id;
		frmdata.date_assessment = date_assessment;
		$.ajax({
			url:site_url+'/assessment/setscore',
			data:frmdata,
			method:'POST',
			dataType:'json',
			success: function(response){
				console.log(response)

				if (response.status == true) {
					$('.btn-save.'+domain+'-'+type).addClass('disabled');
				}
				get_response(response)
			},
			error: function(i,e){
				console.log(i.responseText)
			}
		
		})
	})
</script>