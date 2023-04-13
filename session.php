<?php

if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();

  if (!isset($_SESSION['accounts'])) {
    $dummy_accounts_json = file_get_contents('../dummy/accounts.json');
    $dummy_accounts = json_decode($dummy_accounts_json, true);
    $_SESSION['accounts'] = $dummy_accounts;
  }
}
