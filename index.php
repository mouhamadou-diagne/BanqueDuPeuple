<?php 
	include_once 'header.php';
?>

<div class="bloc_center">

    <?php
        if(isset($_GET['connexion']) && $_GET['connexion'] == 0)
        {
            echo '<p class="echecConnexion">LOGIN OU MOT DE PASSE INCORRECT...</p>';
        }
    ?>
	<form method="post" action="controller/userController.php" class="indexForm">
					<input type="text" name="login" placeholder="LOGIN" class="inputForm"><br><br>
					<input type="password" name="mdp" placeholder="MOT DE PASSE" class="inputForm"><br><br>
					<input type="submit" name="connexion" value="Connexion" id="connexion" class="btnCon">
	</form>
</div>
