<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include __DIR__ . "/header-links.php" ?> 
</head>
<body>
<header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <?php include __DIR__ . "/nav.php" ?> 
      </ul>
</header>

<?php if(hasSuccessMessage()):?>
  
  <div class="alert alert-success">
    <?=$_GET['message']?>
  </div>
  
  <?php endif; ?>
  
  <?php if(hasErrorMessage()):?>
    
    <div class="alert alert-danger">
      <?=$_GET['message']?>
    </div>
  
<?php endif; ?>