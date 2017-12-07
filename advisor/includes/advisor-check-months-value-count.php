<?php

if ( !function_exists ( 'advisor_check_months_value_count' ) ) {
  function advisor_check_months_value_count( $months_value ){

    if ( !empty ( $months_value ) ) {

      $values_count = array();
      $month_arr[] = explode(',' , $months_value);

      for ($i = 0; $i < count($month_arr) ; $i++) {

        for ($j=0; $j < count( $month_arr[$i] ); $j++) {
            $values_count[] = $month_arr[$i][$j];
          }

        }

      if ( count ( $values_count ) != 2 ) {
        $months_value = '';
      } else {
        $months_value = $months_value;
      }

    } else {

      $months_value = '';

    }

    return $months_value;

  }
}
 ?>
