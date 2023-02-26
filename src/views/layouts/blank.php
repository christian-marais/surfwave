<!DOCTYPE html>
<html>
    <head>
        <?= HEAD?>
        <link rel="stylesheet" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/src/assets/css/style.css">
    </head>
    <body>
        <header>
            <?=NAVBAR?>
        </header>
        <main class="blank">
            <?= $content?>     
        </main>
        
        <footer>
            <?=FOOTER?>
        </footer>
    </body>
</html>
