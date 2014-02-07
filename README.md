tripbooker
==========

Projet Symfony

Après un premier git pull, il faut faire :
composer.phar update
Et il faut également configurer votre app/config/parameters.yml pour les accès à votre BDD.

Après un git pull qui affecte la base de données (les entités), n'oubliez pas de faire un : 
php app/console doctrine:schema:update --dump-sql
pour s'assurer que tout va bien, puis, pour appliquer les requêts, un 
php app/console doctrine:schema:update --dump-sql

Et tout devrait rouler !

Peace.