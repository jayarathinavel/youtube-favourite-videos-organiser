<?php
  include('./database.php');
  $apiKeySql = "SELECT `value` from `ytfvo_credentials` WHERE name = 'apikey'";
  $apiKeyResult = $conn->query($apiKeySql);
  $result = $apiKeyResult->fetch_assoc();
  $apikey =  $result['value'];
?>