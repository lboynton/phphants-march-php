This is the PHP side of the demo app I created for my [presentation](http://www.slideshare.net/leeboynton/integrating-nodejs-with-php-march-2013-1) at the [PHPHants](http://www.phphants.co.uk/) March 2013 meet up.

There is also a corresponding [Node.js application](https://github.com/lboynton/phphants-march-node).

Running Guide
---

1. Install nginx + php-fpm and configure with the nginx config file
2. Install [bower](http://twitter.github.com/bower/)
3. Install assets with `bower install`
4. Run the [node.js app](https://github.com/lboynton/phphants-march-node)
5. Connect to the redis shell using the command `redis-cli` and push news items with `rpush news '{"content": "Testy test", "to": "theusername"}'`
