<html>

<head>
	<title>BLOG</title>
	<meta charset="utf-8" />
</head>

<body>
	<h1>Samsung</h1>

	<h2>Les derniers article:<br/></h2>

	<form method="post" action="index.php">
		<label for="titre">Titre: </label>
		<input type="text" name="titre">

		<label for="contenu">Nouveau: </label>
		<textarea name="contenu" id="contenu"></textarea>
		<input type="submit" name="publier"> </form>


	<?php
	$bdd=new PDO('mysql:host=localhost;dbname=test2;charset=utf8','root','');
	
	if(isset($_POST['titre']) AND isset($_POST['contenu'])){ 
		$ajout=$bdd->prepare('INSERT INTO blog(titre,date,contenu)VALUES(:titre,NOW(),:contenu)');
		
		$ajout->execute(array(
			'titre'=>$_POST['titre'],
			'contenu'=>$_POST['contenu'],
			
		));
	};
	
	$rep=$bdd->query('SELECT * FROM blog');
	$plus=$bdd->query('SELECT * FROM commentaires');
		
	while($donnees=$rep->fetch()){
		
		echo $donnees['titre'], ' ! le ' ,$donnees['date'], '<br/>', $donnees['contenu'], '<br/>';		
	
	echo ('<a href="commentaires.php">Commentaires</a><br/>'); 
	
	};
	?>;






</body>

</html>