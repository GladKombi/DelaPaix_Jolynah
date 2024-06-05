<?php
	#Demarer la session
	session_start();
	try {
		$connexion=new PDO('mysql:dbname=gestion_dela_paix; host=localhost', 'root', '');
		} catch (Exception $e) {
			echo $e->getMessage();
		}

