<?php

use Illuminate\Support\Facades\Route;

/**
 * ____________________________________
 * Link active for sidebar and navbar
 */

function set_active($route)
{
  $active = 'active';
  if(is_array($route)){
    foreach($route as $r) {
      if(Route::is($r)){
          return $active;
      }
    }
  }else{
    if(Route::is($route)) {
      return $active;
    }
  }

}