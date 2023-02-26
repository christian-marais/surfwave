<!DOCTYPE html>
<html>
    <head>
        <?= HEAD?>
    </head>
    <body>
        <header>
            <?=NAVBAR?><!-- contient la navbar qui sera intégré-->
        </header>
        <main>
            <?=PUB?> <!-- contient la bannière de pub qui sera intégré-->
            <?= $content?>  <!-- contient la vue qui sera intégré-->      
        </main>
        
        <footer>
            <?=FOOTER?>
        </footer>
    </body>
</html>

