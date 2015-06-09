$(document).ready(function(){
	$("#delete-account").click(function(){
		if(confirm('Votre compte sera supprimé définitivement ! Le supprimer ?'))
		{
			window.location = 'supp_user.php';
		}
	});
});