<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="content-type" content="text/html; charset="UTF-8">
      <title><?php echo $title; ?></title>
      <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css"/>
  </head>
  <body>
    <div id="wrapper">

      <div id="banner">
      </div>

      <nav id="navigation">
        <ul id="nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="room.php">Room Data</a></li>
      </nav>

      <div id="content_area">
        <?php echo '<span style = "font-size: 16pt">' . $content . '</span>'; ?>
        <?php echo '<span style = "font-size: 16pt">' . $content1 . '</span>'; ?>
      </div>

      <div id="sidebar">
      </div>

    </div>
  </body>
</html>
