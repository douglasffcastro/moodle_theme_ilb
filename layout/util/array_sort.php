<?php

function array_sort($array, $on) {
  $new_array = array();
  $sortable_array = array();

  if (count($array) > 0) {
      foreach ($array as $k => $v) {
        foreach ($v as $k2 => $v2) {
          if ($k2 == $on) {
            $sortable_array[$k] = $v2;
          }
        }
      }

      asort($sortable_array);

      $i = 0;
      
      foreach ($sortable_array as $k => $v) {
          $new_array[$i] = $array[$k];
          $i++;
      }
  }

  return $new_array;
}