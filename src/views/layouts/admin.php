<!DOCTYPE html>
<html lang="en">
  <head>
    <?=HEAD?>
    <link rel="stylesheet" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/src/assets/css/style.css">
  </head>

 <body>
   <header>
      <?= NAVBAR?>
   </header>

   <main>
      <?=$content?>
   </main>
  
    <?=FOOTER?>
  </body>
</html>