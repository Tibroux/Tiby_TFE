$(document).ready(function()
{
	var tasks = [];
	var id = [];
	$.post(
		"get_task.php", {"action" : "getTasks"}, function(data)
		{
			data = jQuery.parseJSON(data);
			for(var i=0; i < data.task.length; i++)
			{
				tasks.push(data.task[i].task);
				id.push(data.task[i].id);
			}
		});
	
	$("#search").autocomplete(
	{
        source: tasks,
        minLength: 2,
		select : function(event, ui){
			$(this).attr("value", ui.item.value);
			var idAnchor = id[$.inArray(ui.item.value, tasks)];
			$('html,body').animate({
				scrollTop:$('#task'+idAnchor).offset().top - (($(window).height())/2)
			}, 'slow');
		}
	});
});