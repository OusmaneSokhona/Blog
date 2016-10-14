<html>

<body>
	<h2>Commentaires</h2>
	<form method="post" action='commentaires.php'>
		<label for="pseudo">Pseudo: </label>
		<input type="text" name="pseudo" />

		<label for="message">Message: </label>
		<input type="text" name="message" />

		<label for="valider">Valider: </label>
		<input type="submit" name="Valider">



	</form>

	<?php
	$bdd=new PDO('mysql:host=localhost;dbname=test2;charset=utf8','root','');
	SELECT blog.ID, commentaires.id_titre FROM blog,commentaires WHERE blog.ID,commentaires.id_titre
	if(isset($_POST['pseudo']) AND isset($_POST['message'])){
	
		
	$ajout=$bdd->prepare('INSERT INTO commentaires(ID,pseudo,com,date)VALUES(ID,:pseudo,:com,NOW())');
	$ajout=$bdd->prepare('')
	$ajout->execute(array(
		'pseudo'=>$_POST['pseudo'],
		'com'=>$_POST['message']
	));
	
	
	$rep=$bdd->query('SELECT * FROM commentaires');
	
	while($comms=$rep->fetch()){
	
	?>
		<strong><?php 
		echo $comms['pseudo']; 
			?></strong>
		<?php 
			echo ':',$comms['com'],' a: ',$comms['date'],'<br>';
	}}; ?>
			<a href="index.php">Retour</a>
</body>

</html>