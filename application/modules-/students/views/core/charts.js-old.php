$(function(){

	$.fn.ScaledScoreChart = function(xData,yData,barcolor,title,options){

			const colors =[
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				]
			const barcolors = []
				var j = 0;
				for (var i = xData.length - 1; i >= 0; i--) {

					barcolors.push(colors[j]);
					j++;
				}
			const rawChart = new
				Chart(this,{

					type:"line",
					data:{
						labels:xData,
						datasets:yData},
					options:{
						legend:{display:true},
						title:{display:true,text:[student_name,'Scaled score charts','<?=date('M d, Y')?>']},
						scales:{yAxes:[{
							display:true,
							title:{
								display:true,
								text:'Score'
							},
							ticks:{
								beginAtZero:true,
								step:1,
								stepValue:1,
								max:20,
							}
						}],
							xAxes:[{
								position:'top',
								ticks:{
									maxRotation:90,
									minRotation:90,
								}
							}]
						},
					}
				})
	}
	
	$.fn.StandardScoreChart = function(xData,yData,age){
			const barcolors =[
				"orange",
				"red",
				"pink",
				]

			const standardChart = new
				Chart("standard-score-chart",{
					

					type:"bar",
					data:{
						labels:xData,
						datasets:yData
					},
					options:{
						legend:{display:false},
						title:{display:true,text:student_name+' - Standard score charts'},
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

/*//end of jquery function /*/

	var student_name = '<?=$fName.' '.$mName.' '.$lName.' '.$ext?>';
		$('input[name="type[]"]').on('click',function(){
			
			$('a[href="#tab-tab-charts-raw"]').trigger('click');
		})
		$('a[href="#tab-tab-charts-raw"]').on('click',function(){
			var student_id =  '<?=$pupilsId?>';
			var type =0;
			var frmdata = $('#frm_scaledscore_chart').serializeObject();
			console.log(frmdata)
			$.ajax({
				url: site_url+'/charts/scaled_score/'+student_id+'/'+type,
				method:'POST',
				data:frmdata,
				dataType:'json',
				success:function (response) {
					// body...
					//console.log(response)
					if (response.status == true) {
						var data = response.data
						$('#raw-score-chart').ScaledScoreChart(data.x,data.y)
					}
				}
			})

		})
		$('a[href="#tab-tab-charts-standard"]').on('click',function(){
			var student_id =  '<?=$pupilsId?>';

			const x = [
				"3 years & 1 month",
				"4 years",
				"5 years",
				]
			const y = [];
			$.ajax({
				url: site_url+'/charts/standard_score/'+student_id,
				dataType:'json',
				success:function (response) {
					// body...
					console.log(response)
					if (response.status == true) {
						var data = response.data
						$('#standard--score-chart').StandardScoreChart(x,data)
					}
				}
			})
			//$('#standard-score-chart').StandardScoreChart(x,y)
		})

	  $('a[href="#tab-tab-charts"]').on('click',function(){
			const x = [
				"UPON ENTRY",
				"AFTER 20 DAYS",
				"AFTER 40 DAYS",
				"TERMINAL",
				]
			const y = [40,20,90,70]
			const barcolors =[
				"orange",
				"red",
				"pink",
				"yellow",
				]

	            const weighingChart = new
	                Chart("weighing-chart",{


					type:"bar",
					data:{
						labels:x,
						datasets:[{
							backgroundColor:barcolors,
							data:y
						}]
					},
					options:{
						legend:{display:false},
						title:{display:true,text:[student_name,'Weigh for Age','Date upon entry: January 1 2023']},
						scales:{yAxes:[{
							display:true,
							title:{
								display:true,
								text:'Score'
							},
							ticks:{
								beginAtZero:true
							}
						}],
						xAxes:[{
							display:true,
							ticks:{
								padding:5
							}
						}]
					},
					}
				})

	        })
})