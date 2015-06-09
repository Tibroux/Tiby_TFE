<?php
	require_once('config.inc.php');
	require_once('trad.inc.php');
	
	if($_POST)
	{
		$tasks = array(
			'task'=>array()
		);
		/*Sanitization*/
		$action = htmlspecialchars(strip_tags(trim($_POST['action'])));
		$user_id = $_SESSION['user'][0]['id'];
		
		/*if action = getTasks*/
		if($action=="getTasks")
		{
			/*Get all tasks not yet checked OR all tasks checked but not older than today*/
			$query = "SELECT * FROM `tasks` WHERE user_id = :user_id AND tasks.checked = '0' OR tasks.checked ='1' AND tasks.datetask >= CURDATE() ORDER BY tasks.datetask";
			$preparedStatement = $dbh->prepare($query);
			$preparedStatement->bindParam(':user_id', $user_id);
			$preparedStatement->execute();
			$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($result as $keys=>$t)
			{
				$tasks['task'][] = array(
					'id'=>$t['id'],
					'checked'=>$t['checked'],
					'datetask'=>$t['datetask'],
					'task'=>$t['task'],
					'user'=>$t['user_id']
				);
			}
			echo json_encode($tasks);
		}
		
		if($action == "check-task")
		{
			$value = htmlspecialchars(strip_tags(trim($_POST['value'])));
			$id = htmlspecialchars(strip_tags(trim($_POST['id'])));
			$query = "UPDATE tasks SET checked = $value WHERE id = $id";
			$preparedStatement = $dbh->prepare($query);
			$preparedStatement->execute();
		}
	}
?>