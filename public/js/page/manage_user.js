$(document).ready(function() {

	//Load modal register user
	$('#register').click(function(){
		$('#registerModal').load('user/create',function(){
			$('#registerModal').modal('show');	
		});
	});

	//add new user modal processing
	$('#userSave').click(function(){
		
		//call ajax to add new user
		var user=$('#add-user-form').serialize();
		$.ajax({
			type:'post',
			url:'user/store',
			dataType:'json',
			sucess:function(data){
				
				$('#registerModal').modal('hide');	
			}
		});
	});
});
