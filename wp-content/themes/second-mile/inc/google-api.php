<?php

function secondmile_acf_google_map_api( $api ){
  $key = get_field( 'secondmile_google_api_key', 'options' );
  acf_update_setting( 'google_api_key', $key );
}
add_action( 'acf/init', 'secondmile_acf_google_map_api' );
