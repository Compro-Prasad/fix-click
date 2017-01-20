<html>
   <head>
      <meta charset="UTF-8">
      <?php foreach ($styles as $style) { ?>
         <link rel='stylesheet' href='<?php print($style); ?>' />
      <?php } ?>

      <?php foreach ($scripts as $script) { ?>
         <script type="text/javascript" src="<?php print($script); ?>"></script>
      <?php } ?>

      <title><?php print($title); ?></title>
   </head>
   <body>
      <?php require("nav_bar.php") ?>

      <?php print($page) ?>
   </body>
</html>
