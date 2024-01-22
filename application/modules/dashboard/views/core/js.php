$(function(){

	$.fn.StandardScoreChart = function(xData,yData){
		//console.log('Hello')
			const barcolors =[
				"orange",
				"red",
				"dodgerblue",
				]

			const standardChart = new
				Chart(this,{
					

					type:"bar",
					data:{
						labels:xData,
						datasets:yData
					},
					options:{
						legend:{display:false},
						title:{display:true,text:'Standard score charts'},
						scales:{
							yAxes:[{
							display:true,
							title:{
								display:true,
								text:'Score'
							},
							ticks:{
								beginAtZero:true,
								step:15,
								stepValue:10,
								max:160,
							},
							stacked:false
						}],
							xAxes:[{
								stacked:false
							}]
							},
					}
				})

	}

	var standardData = JSON.parse('<?=json_encode(isset($xy) ? $xy : null)?>');
	if (standardData !== null) {

	var xData = standardData.x;
	var yData = standardData.y;
	
	}
	$('#chart-standard-score').StandardScoreChart(xData,yData)
$('#btn-print-score').on('click',function (e) {
	// body...
	window.print()
})

	$.fn.weighingChart = function(xData,yData,ntitle){
		//console.log('Hello')
		if (ntitle == undefined) {
			ntitle = 'Nutrition Status';
		}
			const barcolors =[
				"orange",
				"red",
				"dodgerblue",
				]

			const standardChart = new
				Chart(this,{
				
					type:"bar",
					data:{
						labels:xData,
						datasets:yData
					},
					options:{
						legend:{display:false},
						title:{display:true,text:ntitle},
						scales:{
							yAxes:[{
							display:true,
							title:{
								display:true,
								text:'Score'
							},
							ticks:{
								beginAtZero:true,
								step:5,
								stepValue:10
							},
							stacked:false
						}],
							xAxes:[{
								stacked:false
							}]
							},
					}
				})
	}

	const wfa = $.getJSON('<?=site_url('dashboard/current_weighing_wfa')?>',function(data){
			var title ='Weight for age';
			
			$('#chart-weight-for-age').weighingChart(data.x,data.y,title)

	})

	const hfa = $.getJSON('<?=site_url('dashboard/current_weighing_hfa')?>',function(data){
			var title ='Height for age';

			$('#chart-height-for-age').weighingChart(data.x,data.y,title)

	})
	const wfh = $.getJSON('<?=site_url('dashboard/current_weighing_wfh')?>',function(data){
			var title ='Weight for height';

			$('#chart-weight-for-height').weighingChart(data.x,data.y,title)

	})






//sectors charts
	const wfa_s1 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfa/1')?>',function(data){
			var ntitle ='4Ps WFA Nutrition Status';
			$('#chart-weight-for-age-sector-1').weighingChart(data.x,data.y,ntitle)


	})

	const hfa_s1 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/hfa/1')?>',function(data){
			var ntitle ='4Ps HFA Nutrition Status';

			$('#chart-height-for-age-sector-1').weighingChart(data.x,data.y,ntitle)

	})

	const wfh_s1 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfh/1')?>',function(data){
			var ntitle ='4Ps WFH Nutrition Status';
			$('#chart-weight-for-height-sector-1').weighingChart(data.x,data.y,ntitle)

	})
//sector 2


	const wfa_s2 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfa/2')?>',function(data){
			var ntitle ='IPs WFA Nutrition Status';
			
			console.log(data)
			if (data.y == undefined) {
				$('#chart-height-for-age-sector-2').addClass('d-none')

			}else{
			$('#chart-weight-for-age-sector-2').weighingChart(data.x,data.y,ntitle)

			}

	})

	const hfa_s2 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/hfa/2')?>',function(data){
			var ntitle ='IPs HFA Nutrition Status';
			
			$('#chart-height-for-age-sector-2').weighingChart(data.x,data.y,ntitle)
			
	})

	const wfh_s2 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfh/2')?>',function(data){
			var ntitle ='IPs WFH Nutrition Status';

			$('#chart-weight-for-height-sector-2').weighingChart(data.x,data.y,ntitle)


	})

//sector 3


	const wfa_s3 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfa/3')?>',function(data){
			var ntitle ='Solo parents WFA Nutrition Status';
			$('#chart-weight-for-age-sector-3').weighingChart(data.x,data.y,ntitle)


	})

	const hfa_s3 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/hfa/3')?>',function(data){
			var ntitle ='Solo parents HFA Nutrition Status';
			$('#chart-height-for-age-sector-3').weighingChart(data.x,data.y,ntitle)


	})

	const wfh_s3 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfh/3')?>',function(data){
			var ntitle ='Solo parents WFH Nutrition Status';
			$('#chart-weight-for-height-sector-3').weighingChart(data.x,data.y,ntitle)

	})


	//sector 4


	const wfa_s4 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfa/4')?>',function(data){
			var ntitle ='With Disability WFA Nutrition Status';
	$('#chart-weight-for-age-sector-4').weighingChart(data.x,data.y,ntitle)


	})

	const hfa_s4 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/hfa/4')?>',function(data){

	var ntitle ='With Disability HFA Nutrition Status';
	$('#chart-height-for-age-sector-4').weighingChart(data.x,data.y,ntitle)


	})

	const wfh_s4 = $.getJSON('<?=site_url('dashboard/current_sector_weighing/wfh/4')?>',function(data){
	
	var ntitle ='With Disability WFH Nutrition Status';
	$('#chart-weight-for-height-sector-4').weighingChart(data.x,data.y,ntitle)

	})
	
	
});