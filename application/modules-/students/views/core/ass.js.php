$(function(){
		$('a[href="#tab-tab-checklist"]').on('click',function(){
			

			$.ajax({
				url:site_url+'/students/get_checklist',
				method:'GET',
				success:function (response) {
					console.log(response)
				}
			})
		})


  get_date('<?=$id?>',1);
  get_date('<?=$id?>',2);
  get_date('<?=$id?>',3);
    function get_date(id,type) {
      // body...
      $.ajax({
        url:site_url+'/assessment/get_date_assessment/'+id+'/'+type,
        success:function (response) {
          // body...
          $('#date-'+type).text(response)
          if (response !== null) {
            get_age(id,type)
          }
          //console.log(response)
        }
      })
    }
    
    function get_age(id,type) {
      // body...
      $.ajax({
        url:site_url+'/assessment/get_assessment_age/'+id+'/'+type,
        success:function (response) {
          // body...
          if (response !== null) {
          $('#age-'+type).text('Age: '+response)

        }else{
          $('#age-'+type).text(response)
        }
        }
      })
    }
    $(document).on('click','.btn-trash-assessment',function () {
      // body...
      var frmdata={};
          frmdata.student_id = $(this).data('id');
          frmdata.domain = $(this).data('domain');
          var tr = $(this).parent().parent();

      $.ajax({
        url:site_url+'/assessment/remove_student_score/',
        data:frmdata,
        dataType:'json',
        method:'post',
        success:function (response) {
          // body...
          console.log(response)
          $(tr).remove()
        }
      })
    })


    $('#select-student-profile-nutrition').on('change',function () {
      // body...
      var student_id = $(this).val()
      window.location = site_url+'/students/nutritions/'+student_id;
    })

    $('#select-student-profile').on('change',function () {
      // body...
      var student_id = $(this).val()
      window.location = site_url+'/students/assessments/'+student_id;
    })



	})



