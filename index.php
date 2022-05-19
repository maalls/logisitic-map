<?php 

  include __DIR__ . '/backend.php';

?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Logisitic Map</title>
  <meta name="description" content="A simple HTML5 Template for new projects.">
  <meta name="author" content="SitePoint">

  <meta property="og:title" content="A Basic HTML5 Template">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.sitepoint.com/a-basic-html5-template/">
  <meta property="og:description" content="A simple HTML5 Template for new projects.">
  <meta property="og:image" content="image.png">

  <link rel="icon" href="/favicon.ico">
  <link rel="icon" href="/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>
<style>
  .scroll {
    overflow: scroll;
  }
</style>
<body>
  <div> 
    <form>
      r = <input type="text" name='r' id='resource' /> x = <span id='xValue'></span>
      
    </form>
  </div>
  <div class="scroll" id='scroll'>
    <img id='map' src='data/<?php echo basename($filename) ?>' style='' />
  </div>

  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>


  <script
  src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"
  integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY="
  crossorigin="anonymous"></script>


  <script src="script.js"></script>
</body>
</html>