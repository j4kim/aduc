<?php

$aduc_id = @$_COOKIE["aduc_id"];

if (!$aduc_id) {
  $aduc_id = uniqid();
  setcookie("aduc_id", $aduc_id, time()+60*60*24*365);
}

echo $aduc_id;