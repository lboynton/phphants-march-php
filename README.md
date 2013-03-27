This is the PHP side of the demo app I created for my [presentation](http://www.slideshare.net/leeboynton/integrating-nodejs-with-php-march-2013-1) at the [PHPHants](http://www.phphants.co.uk/) March meet up.

Running Guide
---

1. Install nginx + php-fpm and configure with the nginx config file
2. Run the node.js app
3. Connect to the redis shell using the command `redis-cli` and push news items with `rpush news '{"content": "Testy test", "to": "theusername"}'`