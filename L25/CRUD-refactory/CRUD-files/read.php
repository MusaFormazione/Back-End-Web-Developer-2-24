<?php
require_once __DIR__ . "/../utils/QueryHandler.php";

$qh = new QueryHandler();

$qh->getAll('pizze','gusto');