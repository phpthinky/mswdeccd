$(function(){
	'use_strict'
	//var table;
	//var active_url;
	var table = $('#table-list-data');
	var active_url = site_url+'/nutritions/<?=$table?>';
	table.DataTable({ajax:active_url});
	var refreshTable = function(table,url){
		table.DataTable({
			destroy:true,
			ajax: url,
			scrollX:true
		})
	}
	$(document).on('click','.btn-trash',function(){
		var id = $(this).data('id');
		var tr = $(this).parent().parent();
		var formdata = {}
			formdata.id = id;
			formdata.form = 'remove';
		$.ajax({
			url:current_url,
			method:'POST',
			data:formdata,
			dataType:'json',
			success:function(response){
				console.log(response)
				if (response.status == true) {
					refreshTable(table,active_url)
				//	$(tr).remove()
				}

			},
			error:function(i,e){
				console.log(i.responseText)
			}

			})
	})
})
