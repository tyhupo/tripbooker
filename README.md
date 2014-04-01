tripbooker
==========

Projet Symfony

Après un premier git pull, il faut faire :

php composer.phar update


Après un git pull qui affecte la base de données (les entités), n'oubliez pas de faire un : 

php app/console doctrine:schema:update --dump-sql

pour s'assurer que tout va bien, puis, pour appliquer les requêts, un 

php app/console doctrine:schema:update --force


Il faut aussi faire cette commande pour installer tout ce qui est style / images : 

php app/console assets:install web


Un petit php app/console cache:clear pour finir.

Et tout devrait rouler !

Peace.