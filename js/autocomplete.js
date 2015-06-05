$(document).ready(function(){
	//console.log("coucou");
	var tasks = [];
	$.post( "get_task.php", {"action" : "getTasks"}, function(data){
		data = jQuery.parseJSON(data);
		for(var i=0; i < data.task.length; i++)
			{
				tasks.push(data.task[i].task);
			}
	});
	console.log(tasks);
	
		$("#search").autocomplete({
        source: tasks,
        minLength: 2,
		select : function(event, ui){
			$(this).attr("value", ui.item.value);
			/*Scroll to the correct task*/
		}
	});
});