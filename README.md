## Installation
Apres avoir cloné ou téléchargé le projet,modifier le nom du fichier .env.example en .env.
Ensuite créez une base de données dans phpmyadmin, mettez son nom dans le fichier .env 
exemple : DB_DATABASE=inventoryxbd.

Apres avoir lancé wampserver

Faites les commandes suivantes :

faites les commandes suivantes 
```TERMINAL

composer install
npm install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve

```

Si vous utiliser git

```TERMINAL

git clone https://github.com/juvpengele/inventorys.git

#pour les mises a jour, faites simplement

git pull origin master

composer install

npm install

php artisan migrate

php artisan db:seed

php artisan serve

```
### Identifiants

pour vous connecter au dashboard 

username : Olivier

password : 123456789


### Bugs
Pour tout bug trouvé, veuillez m'envoyer un e-mail à kouyatekarim02@gmail.com ou à pengeleglodiejuvenal@gmail.com ou enregistrer un problème sur  [issues] (https://github.com/juvpengele/inventorys/issues)
