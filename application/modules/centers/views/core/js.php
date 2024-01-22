$(function(){
	var table = $('#table-list-data').DataTable({
        ajax:site_url+'/centers/listbarangay/0/0',
        buttons: [
            'excel'
        ]
      })
	    /**/

	function refreshTable(table,url){
		console.log(url)
	    $('#'+table).DataTable({
	    	destroy: true,
        ajax:{url:url/*,dataType:'text',success:function(data){
        	console.log(data)
        	}*/

    	},
        buttons: [
            'excel'
        ]
      	})
	}

	//refreshTable(table,site_url+'/centers/listall');

    $('#searchstring-center').on('keyup',function(){

      table.search($(this).val()).draw() ;
    })  
	$('select#select-center-barangay').on('change',function(){
		//alert("Hello")
		let barangay = $(this).val();
		let type = $('#select-center-type').val();
		let url = site_url+'/centers/listbarangay/'+barangay+'/'+type;
		refreshTable('table-list-data',url);
	})

	$('#select-center-type').on('change',function(){
		let type = $(this).val();
		let barangay = $('#select-center-barangay').val();

		let url = site_url+'/centers/listbarangay/'+barangay+'/'+type;

		refreshTable('table-list-data',url);
	})


	$(document).on('click','.btn-trash',function() {
		// body...
		if (confirm('This center and all of its record will be deleted permanently. Make you have a backup.')) {
			var centerId = $(this).data('id');
		$.ajax({
			url:current_url,
			data:{form:'remove',id:centerId},
			dataType:'text',
			method:'post',

		})
		refreshTable('table-list-data',site_url+'/centers/listall')
		$(this).parent().parent().remove()

		}
		
	})
	$(document).on('submit','#frmaddcenter',function(e){
		e.preventDefault();
		var frmdata = $(this).serializeArray();
		$.ajax({
			data:frmdata,
			dataType:'json',
			method:'POST',
			url: site_url+'/centers/add',
			success:function (response) {
				// body...
				console.log(response)
				if(response.status == true){
					refreshTable('table-list-data',site_url+'/centers/listall')
					$('.error-area').addClass('text-success').text(response.msg)
				}else{
					$('.error-area').addClass('text-danger').text(response.msg)

				}

			},
			error: function(i,e){
				console.log(i.responseText)
			}

					})
	})

	$(document).on('click','.btn-edit-centers',function(){
		var parent = $(this).parents('tr');
		var data = []
		 $.each($(parent).children(),function(i,e){
			data.push($(e).text())
		})
		 console.log(data)
		 $('a[href="#edit"]').click();
		 var form = $('#frmeditcenter');

		 $(form).children($('input[name="centerId"]').val(data[0]))
		 $(form).children($('input[name="centerName"]').val(data[1]))
		 $(form).children($('select[name="barangay"]').val(data[2]))
		 $(form).children($('input[name="address"]').val(data[3]))


	})

	$('#frmeditcenter').on('submit',function (e) {
		// body...
		e.preventDefault()
		var formdata = $(this).serializeArray();
		
		$.ajax({
			data:formdata,
			dataType:'json',
			method:'POST',
			url: current_url,
			success:function (response) {
				// body...
				console.log(response)
				if(response.status == true){
					refreshTable('table-list-data',site_url+'/centers/listall')
					$('.error-area').addClass('text-success').text(response.msg)
				}else{
					$('.error-area').addClass('text-danger').text(response.msg)

				}

			},
			error: function(i,e){
				console.log(i.responseText)
			}

					})

	})

	$('#btn-export-centers').on('click',function (e) {

		let type = $('#select-center-type').val();
		let barangay = $('#select-center-barangay').val();

		$(this).attr('href','<?=site_url('export/centers/')?>'+type+'/'+barangay);
		//window.open('<?=site_url('export/centers/')?>'+type+'/'+barangay);


	})
})
