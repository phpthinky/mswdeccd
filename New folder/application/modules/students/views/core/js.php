<script type="text/javascript">

$(function(){

	$.fn.extend({
		reloadTable: function(url,data){
			$(this).dataTable({
				destroy:true,
				ajax:{
					url:url,
					data:data
				}
			})
		},
		feedingTable: function(url,data){
			$(this).dataTable({
				destroy:true,
				ajax:{
					url:url,
					data:data
				}
			})
		},
	})
})
<?php include_once('nut.js.php'); ?>
<?php include_once('ass.js.php'); ?>
<?php include_once('charts.js.php'); ?>

</script>	

