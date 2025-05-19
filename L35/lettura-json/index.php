<?php

$contenutoFile = file_get_contents('./prodotti.json');

$json = json_decode($contenutoFile, true);

var_dump($json);