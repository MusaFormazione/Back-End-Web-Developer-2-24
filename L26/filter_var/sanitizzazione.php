<?php

//sanitizzazione email
$email = "esempio@miosito.it<script>alert('XSS')</script>";
$result = filter_var($email, FILTER_SANITIZE_EMAIL);
var_dump($result);

echo "<br>";

//sanititzzazione int
$integer = "123abc456";
$result = filter_var($integer, FILTER_SANITIZE_NUMBER_INT);
echo "$integer => $result";//123456
echo "<br>";

//sanitizzazione float
$float = "123.25";
$result = filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT,  FILTER_FLAG_ALLOW_FRACTION);
echo "$float => $result";