# currencyAdmin

lien de mon projet git Coté client "currencyAdmin"
https://github.com/CKankou04/currencyAdmin.git

lien de mon projet git Coté server "currencyApi"
https://github.com/CKankou04/currencyApi.git

## Pour installer les dependances du projet

```sh
npm install
```
### Ensuite pour lancer le coté client

```sh
npm run dev
```

### builder le projet

```sh
npm run build
```

### Pour installer [ESLint](https://eslint.org/)

```sh
npm run lint
```

Pour la connexion de l'utilisateur coté client :

```sh
User: philippe@gmail.com
mdp: password
```

A faire coté server :

```sh
Creer une BD appélé "currency"
Creer le fichier .env et associer à la BD
```
Pour remplir les seeders :

```sh
$php artisan migrate:fresh --seed
```
### Ensuite pour lancer le coté server

```sh
$php artisan serve
```

