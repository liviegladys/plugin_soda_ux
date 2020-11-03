<?php
//The included Includes/DataEngine.php contains
//functions to help easily embed the charts and connect to a database.
//charge la configuration de la base de données

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);//charger le wp-load.php
include($path.'wp-load.php');

//se connecter à la base de données
global $wpdb;


//$wpdb->get_var = retourne une simple variable à partir de la BD
//SUM() = calcule la somme totale d'une colonne contenant des valeurs numériques.
//WHERE MONTH(date) = MONTH(CURDATE()) = là où le mois correspond au moins actuel
//AS = je donne un nom à cette variable

$omgaz = $wpdb->get_var( "SELECT  (SUM(omgaz))/ ((sum(typo = 'acquisition')) + (sum(typo = 'resiliation')) + (sum(typo = 'facturation'))) FROM dgp_declaratif");


$fel = $wpdb->get_var("SELECT  (SUM(fel))/((sum(typo = 'acquisition'))+(sum(typo = 'resiliation'))+(sum(typo = 'facturation'))+(sum(typo = 'easycare'))+(sum(typo = 'activation'))) FROM dgp_declaratif");


$elec = $wpdb->get_var("SELECT (SUM(elec))/((sum(typo = 'acquisition'))+(sum(typo = 'resiliation')))FROM dgp_declaratif" );


$serenite = $wpdb->get_var( "SELECT (((SUM(packchaudiere))+(SUM(essentiel)) + (SUM(serenite))) / ((sum(typo = 'acquisition')) + (sum(typo = 'resiliation')) + (sum(typo = 'facturation')) + (sum(typo = 'easycare')) + (sum(typo = 'activation')))) FROM dgp_declaratif");


$af = $wpdb->get_var( "SELECT (((SUM(af)) + (SUM(depannage)) + (SUM(gem))) / ((sum(typo = 'acquisition')) + (sum(typo = 'resiliation')) + (sum(typo = 'facturation')) + (sum(typo = 'easycare')) + (sum(typo = 'activation')))) FROM dgp_declaratif " );


$cpvgaz = $wpdb->get_var( "SELECT  ((SUM(cpvgaz))/((sum(typo = 'acquisition'))+(sum(typo = 'resiliation'))+(sum(typo = 'facturation'))+(sum(typo = 'easycare'))+(sum(typo = 'activation'))+(sum(typo = 'hotline')))) FROM dgp_declaratif" );


$cpvelec = $wpdb->get_var( "SELECT  ((SUM(cpvelec))/((sum(typo = 'acquisition'))+(sum(typo = 'resiliation'))+(sum(typo = 'facturation'))+(sum(typo = 'easycare'))+(sum(typo = 'activation'))+(sum(typo = 'hotline')))) FROM dgp_declaratif" );

// Dans un tableau, je récupère tout ces variables

 $query []= array('OMGAZ'=>$omgaz,'FEL'=>$fel, 'ELEC'=>$elec, 'SERENITE'=>$serenite,'AF'=>$af,'CPVGAZ'=>$cpvgaz,'CPVELEC'=>$cpvelec); 

  
//Je transforme ce tableau php en tableau JSON dans le but dans l'envoyer au JS. 
echo json_encode($query);

?>


