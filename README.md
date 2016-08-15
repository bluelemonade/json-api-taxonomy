# json-api-taxonomy
Extend json-api plugin to query post based on custom taxonomy in wordpress

## how to install
* copy file controllers/taxonomy.php into plugins/json-api/controller/taxonomy.php
* activate function on Setting > JSON API > taxonomy

## how to use
http(s)://yoursite.com/?json=taxonomy.get&taxonomy=yourcustomtaxonomy&slug=yourslug
