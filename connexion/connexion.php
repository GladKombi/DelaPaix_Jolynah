<?php
	#Demarer la session
	session_start();
	try {
		$connexion=new PDO('mysql:dbname=gestion_venco_shop; host=localhost', 'root', '');
		} catch (Exception $e) {
			echo $e->getMessage();
		}

