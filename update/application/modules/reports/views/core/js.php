
<script type="text/javascript">

	var table = $('#reports-feeding')
	var settings;
$(function(){
	table.DataTable({
		dom:'Bfrtip',
		buttons:['excel']
		
	})

})

	$('#btn-print').on('click',function(){
		window.print()
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
</script>