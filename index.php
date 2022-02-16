<?php
require_once("config.php");
require_once("auth.php");
require_once("CURL.php");

$access_token = set_token($code, $client_id, $client_secret, $redirect_uri, $grant_type);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="CSS/json.css" rel="stylesheet" type="text/css" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
<table>
<thead>

    <tr>
        <th>id</th>
        <th>name</th>
    </tr>
</thead>
<tbody>
<?php

// $access_token = "1000.d9755be737bbefd483f03d7fdd6cdcd4.2b3aacc5fb919bafca83f918cc05037d";


$url = "https://books.zoho.com/api/v3/contacts?organization_id=$organization_id";

$method = 'GET';

$header = array(
    'Authorization: Bearer '.$access_token,
  );


$respone = send_Request_curl($url, $method, $header);


foreach ($respone->contacts as $contact) {
      echo '<tr>';
      echo '<td>'.$contact->contact_id.'</td>';
      echo '<td>'.$contact->contact_name.'</td>';
      echo '</tr>';
}

?>
</tbody>
</table>
</body>
</html>
