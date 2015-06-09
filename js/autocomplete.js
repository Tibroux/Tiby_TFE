$(document).ready(function()
{
	var tasks = [];
	var dateAlreadyExist =[];
	var today = new Date();
	var closest = new Date('2050-01-01 00:00:00');
	var days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
	var months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
	for(var i=0; i<$('.phone>ul.active_day').length; i++)
	{
		/* dateAlreadyExist.push(new Date(($('.phone >ul.active_day').eq(i).attr('data-id'))+" 23:59:59")); */
		dateAlreadyExist.push(new Date(($('.phone >ul.active_day').eq(i).attr('data-id'))));
		console.log(dateAlreadyExist);
	}
	
	$.post(
		"get_task.php", {"action" : "getTasks", "userId" : dataT}, function(data)
		{
		data = jQuery.parseJSON(data);
		
		console.log(data);
		for(var i=0; i < data.task.length; i++)
		{
			tasks.push(data.task[i].task);
			
			/*Add tasks to semaine.php*/
			var taskDate = data.task[i].datetask.substr(0, data.task[i].datetask.indexOf(' '));
			
			/*If there is already the day of the task*/
			if($('.phone ul[data-id="'+taskDate+'"]').length > 0)
			{
				$('.phone ul[data-id="'+taskDate+'"] .todo>ul').append('\
					  <li> \
						<input name="shaker" type="checkbox"/> \
						<label class="todo_right" name="shaker" for="shaker">'+data.task[i].task+'</label> \
						<button class="supp" data-id="'+data.task[i].id+'">-</button> \
					</li> \
				');
			}
			else
			{
				if(new Date(data.task[i].datetask) > today)
				//if(closest < new Date(dateAlreadyExist[d]))
				{
					for(var d=0; d<dateAlreadyExist.length; d++)
					{
						if(new Date(data.task[i].datetask) < dateAlreadyExist[d])
						/* if(new Date(data.task[i].datetask) < new Date(closest)) */
						{
							if(closest > dateAlreadyExist[d])
							{
								closest = dateAlreadyExist[d];
								//if((closest.getMonth()+1).toString().length<2)
								if(closest < dateAlreadyExist[d])
								{
									var sqldate = closest.getFullYear()+"-0"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								else
								{
									var sqldate = closest.getFullYear()+"-"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								var dateOfTask = new Date(data.task[i].datetask);
								if(today.getFullYear() == dateOfTask.getFullYear() && today.getMonth() == dateOfTask.getMonth() && today.getDate() == dateOfTask.getDate())
								{
									var aujourd = '(Aujourd\'hui)';
								}
								else
								{
									var aujourd = '';
								}
								$('\
									<ul class="active_day" data-id="'+data.task[i].datetask+'">\
										<li>\
											<h3 class="date">'+days[dateOfTask.getDay()]+' '+dateOfTask.getDate()+' '+months[dateOfTask.getMonth()]+' '+dateOfTask.getFullYear()+'<span>'+aujourd+'</span></h3>\
										</li>\
										<li>\
											<div class="todo">\
												<h3>Vos tâches<span class="compteur">(dev date : '+data.task[i].datetask+')</span></h3>\
												<ul>\
													<li>\
														<input name="shaker" type="checkbox"/>\
														<label class="todo_right" name="shaker" for="shaker">'+data.task[i].task+'</label>\
														<button class="supp" data-id="'+data.task[i].id+'">-</button>\
													</li>\
												</ul>\
												<form class="more" method="post" action="post_task.php">\
												   <ul>\
													<li>\
														<input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/>\
														<input id="datetask" class="disappear" name="datetask" type="text" value="'+data.task[i].datetask+'"/>\
														<input class="ok" type="submit" value="OK"/></li>\
												   </ul>\
												</form>\
											</div>\
										</li>\
									</ul>\
								').insertBefore('.phone ul[data-id='+sqldate+']');
								/* dateAlreadyExist.push(new Date(data.task[i].datetask)+" 23:59:59"); */
								dateAlreadyExist.splice(i, 0, new Date(data.task[i].datetask));
								/* J'ai supprimé le insertBefore, ça supprime rien. J'ai remis le dateAlreadyExist, pareil...*//*Si j'ajoute .content devant le .phone, rien ne change non plus*/
							}
							else
							{
								//if((closest.getMonth()+1).toString().length<2)
								if(closest < dateAlreadyExist[d])
								{
									var sqldate = closest.getFullYear()+"-0"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								else
								{
									var sqldate = closest.getFullYear()+"-"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								var dateOfTask = new Date(data.task[i].datetask);
								if(today.getFullYear() == dateOfTask.getFullYear() && today.getMonth() == dateOfTask.getMonth() && today.getDate() == dateOfTask.getDate())
								{
									var aujourd = '(Aujourd\'hui)';
								}
								else
								{
									var aujourd = '';
								}
								$('\
									<ul class="active_day" data-id="'+data.task[i].datetask+'">\
										<li>\
											<h3 class="date">'+days[dateOfTask.getDay()]+' '+dateOfTask.getDate()+' '+months[dateOfTask.getMonth()]+' '+dateOfTask.getFullYear()+'<span>'+aujourd+'</span></h3>\
										</li>\
										<li>\
											<div class="todo">\
												<h3>Vos tâches<span class="compteur">(dev date : '+data.task[i].datetask+')</span></h3>\
												<ul>\
													<li>\
														<input name="shaker" type="checkbox"/>\
														<label class="todo_right" name="shaker" for="shaker">'+data.task[i].task+'</label>\
														<button class="supp" data-id="'+data.task[i].id+'">-</button>\
													</li>\
												</ul>\
												<form class="more" method="post" action="post_task.php">\
												   <ul>\
													<li>\
														<input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/>\
														<input id="datetask" class="disappear" name="datetask" type="text" value="'+data.task[i].datetask+'"/>\
														<input class="ok" type="submit" value="OK"/></li>\
												   </ul>\
												</form>\
											</div>\
										</li>\
									</ul>\
								').insertBefore('.phone ul[data-id='+sqldate+']'); 
								/* dateAlreadyExist.push(new Date(data.task[i].datetask)+" 23:59:59"); */
								dateAlreadyExist.splice(i, 0, new Date(data.task[i].datetask));
								/* J'ai supprimé ça, ça supprime le doublon sur aujourd mais aussi la 2eme task de aujourd et tout mercredi...*/
								//.appendTo('.content .phone ul[data-id='+sqldate+']'); /*ça, ça a créé une catastrophe avec des lundi et mercredi dans le jeudi...*/
								//.appendTo('.content .phone'); /*et ça arrange pas grand chose non plus...*/
							}
						}
						else
						{
							if(closest < dateAlreadyExist[d]) /*Si je supprime ce if, même le samedi se dédouble... P-e que ça peut être réutilisé pour mercredi et lundi, même en trichant...*/
							{
								var dateOfTask = new Date(data.task[i].datetask);
								if(today.getFullYear() == dateOfTask.getFullYear() && today.getMonth() == dateOfTask.getMonth() && today.getDate() == dateOfTask.getDate())
								{
									var aujourd = '(Aujourd\'hui)';
								}
								else
								{
									var aujourd = '';
								}
								$('\
									<ul class="active_day" data-id="'+data.task[i].datetask+'">\
										<li>\
											<h3 class="date">'+days[dateOfTask.getDay()]+' '+dateOfTask.getDate()+' '+months[dateOfTask.getMonth()]+' '+dateOfTask.getFullYear()+'<span>'+aujourd+'</span></h3>\
										</li>\
										<li>\
											<div class="todo">\
												<h3>Vos tâches<span class="compteur">(dev date : '+data.task[i].datetask+')</span></h3>\
												<ul>\
													<li>\
														<input name="shaker" type="checkbox"/>\
														<label class="todo_right" name="shaker" for="shaker">'+data.task[i].task+'</label>\
														<button class="supp" data-id="'+data.task[i].id+'">-</button>\
													</li>\
												</ul>\
												<form class="more" method="post" action="post_task.php">\
												   <ul>\
													<li>\
														<input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/>\
														<input id="datetask" class="disappear" name="datetask" type="text" value="'+data.task[i].datetask+'"/>\
														<input class="ok" type="submit" value="OK"/></li>\
												   </ul>\
												</form>\
											</div>\
										</li>\
									</ul>\
								').appendTo('.content .phone');
								/* dateAlreadyExist.push(new Date(data.task[i].datetask)); */
							}
						}
						/* else
						{
							if(closest < new Date(dateAlreadyExist[d]))
							{
								closest = new Date(dateAlreadyExist[d]);
								if((closest.getMonth()+1).toString().length<2)
								{
									var sqldate = closest.getFullYear()+"-0"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								else
								{
									var sqldate = closest.getFullYear()+"-"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								var dateOfTask = new Date(data.task[i].datetask);
								if(today.getFullYear() == dateOfTask.getFullYear() && today.getMonth() == dateOfTask.getMonth() && today.getDate() == dateOfTask.getDate())
								{
									var aujourd = '(Aujourd\'hui)';
								}
								else
								{
									var aujourd = '';
								}
								$('\
									<ul class="active_day" data-id="'+data.task[i].datetask+'">\
										<li>\
											<h3 class="date">'+days[dateOfTask.getDay()]+' '+dateOfTask.getDate()+' '+months[dateOfTask.getMonth()]+' '+dateOfTask.getFullYear()+'<span>'+aujourd+'</span></h3>\
										</li>\
										<li>\
											<div class="todo">\
												<h3>Vos tâches<span class="compteur">(dev date : '+data.task[i].datetask+')</span></h3>\
												<ul>\
													<li>\
														<input name="shaker" type="checkbox"/>\
														<label class="todo_right" name="shaker" for="shaker">'+data.task[i].task+'</label>\
														<button class="supp" data-id="'+data.task[i].id+'">-</button>\
													</li>\
												</ul>\
												<form class="more" method="post" action="post_task.php">\
												   <ul>\
													<li>\
														<input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/>\
														<input id="datetask" class="disappear" name="datetask" type="text" value="'+data.task[i].datetask+'"/>\
														<input class="ok" type="submit" value="OK"/></li>\
												   </ul>\
												</form>\
											</div>\
										</li>\
									</ul>\
								').insertAfter('.phone ul[data-id='+sqldate+']');
								dateAlreadyExist.push(new Date(data.task[i].datetask));
							}
							/* else
							{
								closest = new Date(dateAlreadyExist[d]);
								if((closest.getMonth()+1).toString().length<2)
								{
									var sqldate = closest.getFullYear()+"-0"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								else
								{
									var sqldate = closest.getFullYear()+"-"+(closest.getMonth()+1)+"-"+closest.getDate();
								}
								$('\
									<ul class="active_day" data-id="'+data.task[i].datetask+'">\
										<li>\
											<div class="todo">\
												<h3>Vos tâches<span class="compteur">(dev date : '+data.task[i].datetask+')</span></h3>\
												<ul>\
													<li>\
														<input name="shaker" type="checkbox"/>\
														<label class="todo_right" name="shaker" for="shaker">'+data.task[i].task+'</label>\
														<button class="supp" data-id="'+data.task[i].id+'">-</button>\
													</li>\
												</ul>\
											</div>\
										</li>\
									</ul>\
								').insertBefore('.phone ul[data-id='+sqldate+']');
							}
						} */
					}
				}
			}
		}
		countTasks();
	});
	
	$("#search").autocomplete(
	{
        source: tasks,
        minLength: 2,
		select : function(event, ui){
			$(this).attr("value", ui.item.value);
			/*Scroll to the correct task*/
		}
	});
	/* $('.phone ul').find("[data-id=2015-06-11]"); */
	function countTasks()
	{
		for(var i=0; i<$('.phone>ul.active_day').length; i++)
		{
			$('.phone>ul.active_day').eq(i).find('li .todo h3 span').text('('+($('.phone>ul.active_day').eq(i).find('li .todo ul li').length -1)+')');
		}
	}
});