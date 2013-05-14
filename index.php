<?php

// set up autoloading using composer
require 'vendor/autoload.php';

// create connection to memcached
$memcached = new Memcached();
$memcached->addServer('localhost', 11211);

// register handler (PHP 5.3 compatible)
$handler = new Lboy\Session\SaveHandler\Memcached($memcached);

session_set_save_handler(
    array($handler, 'open'),    
    array($handler, 'close'),
    array($handler, 'read'),
    array($handler, 'write'),
    array($handler, 'destroy'),
    array($handler, 'gc')
);

// the following prevents unexpected effects when using objects as save handlers
register_shutdown_function('session_write_close');

session_start();

// start using the session
$_SESSION['user']['username'] = $_GET['username'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PHP-Node Demo</title>
    <link href="components/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="/components/jquery/jquery.js"></script>
    <script src="/components/underscore/underscore.js"></script>
    <script src="/socket.io/socket.io.js"></script>
    <script>
      $(document).ready(function()
      {
        var socket = io.connect();
        var template = _.template($('#js-news-template').html());
        socket.on('news', function (news) {
          element = template({news: news});
          $(element).hide().prependTo('#js-news-container').slideDown();
        });
      });
    </script>
    <script type="text/template" id="js-news-template">
      <p class="well"><%- news %></p>
    </script>
  </head>
  <body>
    <div class="container">
      <h1>Latest News</h1>
      <div id="js-news-container"></div>
      <h2>Session</h2>
      <?php var_dump($_SESSION); ?>
    </div>
  </body>
</html>


