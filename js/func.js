$(".desactive").click(function(){
	$( ".desactive" ).toggleClass( "active" );
	$( ".searching" ).toggleClass( "open" );
});

$(".todo>ul li input").click(function(){
	var taskId = $(this).attr('id').substr(4);
	if($(this).attr('checked'))
	{
		var check = "0";
	}
	else
	{
		var check = "1";
	}
	$.post("get_task.php", {"action" : "check-task", "value":check, "id" : taskId});
});