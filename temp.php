<div class="phone">
				<?php
					$sql= "SELECT * FROM events WHERE events.from >=NOW() ORDER BY events.from ASC";
					$statement = $dbh->prepare($sql);
					$statement->execute();
					$events = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($events as $keys=>$e)
					{
						$event_date = explode(" ", $e['from'], 2);/*Get the date only*/
						/*convert datetime ton string*/
						$date_from = new DateTime($e['from']);
						$date_to = new DateTime($e['to']);
						
						
						if(!in_array((date_translate($date_from->format('l d m Y'))), $days_already_exist, true))
						{
						?>
						<!--<ul <?php// if($event_date[0] == date('Y-m-d')){ echo 'class="active_day"';} ?>>-->
						<ul class="active_day">
							<li>
								<h3 class="date"><?php echo date_translate($date_from->format('l d m Y')); ?>
									<?php
									if($event_date[0] == date('Y-m-d'))
									{
										?>
										<span>(Aujourd'hui)</span>
										<?php
									}
									?>
								</h3>
							</li>
							<li>
								<ul class="planning">
									<li class="wafel">
										<ul>
											<li class="clock"><?php echo $date_from->format('H:i'). " ".$date_to->format('H:i') ?></li>
											<li>
												<ul class="event">
													<li class="rdv"><?php echo $e['event']?></li>
													<li class="localisation"><?php echo $e['location']?></li>
												</ul>
											</li>
										</ul>
									</li>
									<?php
									/*Add the day that exist to the array*/
									if(!in_array(date_translate($date_from->format('l d m Y')), $days_already_exist, true))
									{
										array_push($days_already_exist, date_translate($date_from->format('l d m Y')));
									}
									
									/*Push into array tasks already displayed*/
									if(!in_array($e['uid'], $uid_already_exist, true))
									{
										array_push($uid_already_exist, $e['uid']);
									}
									
									foreach($events as $keys_bis=>$r)
									{
										$date_from_bis = new DateTime($r['from']);
										$date_to_bis = new DateTime($r['to']);
										if(in_array((date_translate($date_from_bis->format('l d m Y'))), $days_already_exist, true) && !in_array($r['uid'], $uid_already_exist, true))
										{
											?>
												<li class="wafel">
													<ul>
														<li class="clock"><?php echo $date_from_bis->format('H:i'). " ".$date_to_bis->format('H:i') ?></li>
														<li>
															<ul class="event">
																<li class="rdv"><?php echo $r['event']?></li>
																<li class="localisation"><?php echo $r['location']?></li>
															</ul>
														</li>
													</ul>
												</li>
											<?php
										}
									}
									?>
								</ul>
							</li>
							<?php
							$request_tasks = "SELECT * FROM tasks WHERE tasks.datetask BETWEEN CONCAT(:date_task, ' 00:00:00') AND CONCAT(:date_task, ' 23:59:59')";
							$task_statement = $dbh->prepare($request_tasks);
							$task_statement->bindParam(":date_task", $date_from->format('Y-m-d'));
							$task_statement->execute();
							$tasks = $task_statement->fetchAll(PDO::FETCH_ASSOC);
							?>
							<li>
								<div class="todo">
								  <h3>Vos tâches<span class="compteur">(<?php echo count($tasks); ?>)</span></h3>
								  <ul>
										<?php
											foreach ($tasks as $keys=>$t)
											{
												?>
												<li>
													<input name="shaker" type="checkbox"/>
													<label class="todo_right" name="shaker" for="shaker"><?php echo $t['task']; ?></label>
													<button class="supp" data-id="<?php echo $t['id']; ?>">-</button>
												</li>
												<?php
											}
										?>
								  </ul>
									<form class="more" method="post" action="post_task.php">
										<ul>
											<li>
												<input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/>
												<input id="datetask" class="disappear" name="datetask" type="text" value="<?php echo date_translate($date_from->format('Y-m-d')); ?>"/>
												<input id="timetask" class="disappear" name="timetask" type="text" value="<?php echo date_translate($date_from->format('H:i:s')); ?>"/>
												<input class="ok" type="submit" value="OK"/>
											</li>
										</ul>
									</form>
								</div>
							</li>
						</ul>
						<?php
						}
					}
				?>
				</div>