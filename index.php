<?php

/*
    Plugin Name: plugin_soda_ux
    Description: Intégration du graphe de jauge
    Version: 1.0
    Author: Gladys Akela
*/

function plugin_soda_ux_graphs(){// fonction pour initialiser le graphe
  echo ' 
  <div id="chartDiv" style="max-width: 400px;height: 400px;position:absolute;top:-2%;left:-2%"></div>  

    <div id="chartD" style="max-width: 400px;height: 400px;position:absolute;top:-2%;left:45%"></div>
    <div class=graphs>
      <h3>Interprétation des données</h3>
    </div>
  ';

  
wp_enqueue_script('var php_var  = <?php echo json_encode($query); ?>');// appel des scripts necessaire pour le fonctionnement du graphe
 
wp_enqueue_script("http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js");
wp_enqueue_script('jscharting', 'https://code.jscharting.com/latest/jscharting.js');
wp_enqueue_script('jscharting','https://code.jscharting.com/latest/modules/types.js');
wp_enqueue_script("text/javascript");
wp_enqueue_script('plugin_soda_ux_graphs', WP_PLUGIN_URL .'/plugin_soda_ux/js/graphs.js');
 
wp_localize_script('plugin_soda_ux_graphs', 'myScript', array(
  'script_directory' => WP_PLUGIN_URL,
  'home_url' => home_url()
));
}

add_shortcode( 'plugin_soda_ux_graphs', 'plugin_soda_ux_graphs');

//custom shortcodes ajout de champs de profils de granularité //

function responsable ($atts) {
    if ( is_user_logged_in() ) {
   $user_id = bp_loggedin_user_id();
   $Name = xprofile_get_field_data( 'RP' ,$user_id);
   return $Name;
} 
}

add_shortcode( 'RP', 'responsable' ); 

function spv ($atts) { // shortcode pour l ajout des roles
    if ( is_user_logged_in() ) {
   $user_id = bp_loggedin_user_id();
   $Name = xprofile_get_field_data( 'Superviseur' ,$user_id);
   return $Name;
} 
}

add_shortcode( 'Superviseur','spv' ); 

function site ($atts) {
    if ( is_user_logged_in() ) {
   $user_id = bp_loggedin_user_id();
   $Name = xprofile_get_field_data( 'Site' ,$user_id);
   return $Name;
} 
}

add_shortcode( 'Site', 'meta_site' ); 

function pole ($atts) {
    if ( is_user_logged_in() ) {
   $user_id = bp_loggedin_user_id();
   $Name = xprofile_get_field_data( 'Pole' ,$user_id);
   return $Name;
} 
}

add_shortcode( 'Pole', 'pole' ); 


function userid ($atts) {
    if ( is_user_logged_in() ) {
   $user_id = bp_loggedin_user_id();
   return $user_id;
} 
}
add_shortcode('userid','userid');


?>
















