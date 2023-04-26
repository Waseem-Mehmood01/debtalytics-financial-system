<?php
$account = 'vvb74485.us-east-1';
$database = 'snowflake';
$host = $account . ".snowflakecomputing.com";
$password = '';
$port = "443";
$protocol = 'https';
$role = 'PUBLIC';
$schema = 'PUBLIC';
$user = 'mansoor';
$warehouse = 'compute_wh';
 
$dsn = "snowflake:host=$host;port=$port;account=$account;database=$database;schema=$schema;warehouse=$warehouse;role=$role;protocol=$protocol";
$dbh = new PDO("$dsn;application=phptest;authenticator=snowflake_jwt;priv_key_file=/tmp/rsa_key.p8;priv_key_file_pwd=".'O$A[8EeC+Kjn{N('."", $user, "");
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  echo "Connected\n";

  $sth = $dbh->query("select current_version();");
  while ($row=$sth->fetch(PDO::FETCH_NUM)) {
      echo "RESULT: " . $row[0] . "\n";
  }
  $dbh = null;
  echo "OK\n";
?>