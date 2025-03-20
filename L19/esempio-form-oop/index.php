<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    include "./FormBuilder.php";

    $formFieldsData = [
        [
            "type" => "password",
            "placeholder" => "Scrivi la tua password",
            "name"=>"password"
        ],
        [
            "type" => "text",
            "placeholder" => "Scrivi il tuo nome",
            "name"=>"nome"
        ]
    ];

    $form = new FormBuilder('altro-foglio.php');

    foreach($formFieldsData as $field){
        $form->addInputField($field);
    }


    $form->render();
?>


<!-- <form action="altro-foglio.php">
    <input type="text" placeholder="Scrivi il tuo nome">
</form> -->

</body>
</html>