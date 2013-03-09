<?php

   include_once('../bootstrap.php');
   use Guzzle\Http\Client;
   
   echo "hello\n";

   // Create a client and provide a base URL
   $client = new Client('https://api.github.com');
   // Create a request with basic Auth
   $request = $client->get('/user')->setAuth('user', 'pass');
   // Send the request and get the response
   $response = $request->send();
   echo $response->getBody();
   // >>> {"type":"User", ...
   echo $response->getHeader('Content-Length');
   // >>> 792


?>
