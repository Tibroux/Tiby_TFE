$(document).ready(function(){
	var task_id;
	$('body .content .phone .todo ul li button').click(function(){
		task_id = $(this).attr('data-id');
		$.post("supp_task.php",{ id: task_id},
		function(){
			location.reload();
		});
	});
});