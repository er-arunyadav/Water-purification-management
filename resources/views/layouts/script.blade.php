<script type="text/javascript">
	 $(document).ready(function(){


	 	$('.statusSpan').click(function(){
	 		
	 		var status = $(this).data('status');
	 		var id = $(this).data('id');
      $('#status_id').val(id);
	 		var note = $(this).data('note');
      $('#status_val').val(status);

	 	  $('#noteStatus').val(note);

	 		if(status == 1){
	 			$("#completed").prop("checked", true);
	 		}else if(status == 2){
				$("#onhold").prop("checked", true);
	 		}else{
	 			$("#pending").prop("checked", true);
	 		}
	 	});





        $("#statusButton").click(function(){
        	var status = $("input[name='status']:checked").val();
        	var id = $('#status_id').val();
          var note = $('#noteStatus').val();
            if(status != ''){
               $.ajax({
               	url:'{{route("purchase.status")}}',
               	method:'post',
               	data:{status:status,note:note,id:id,"_token": "{{ csrf_token() }}"},
               	success: function(data){
               		if(data == 'success'){
               			 toastr.success("Service Status Updated");
               			  $('#myModal').modal('toggle');
               			 window.location.reload();
               		}
               	}
               });
            }
        });

    });
</script>