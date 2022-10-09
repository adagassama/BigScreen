<p align="center"><a href="#" target="_blank"><img src="https://bigscreenvr.com/assets/img/bigscreen_logo_black.png" width="400"></a>
</p>

# PROJET FINAL

### Côté server
- Créer une Base de données appelée "survey"
- Créer le ficher .env et associer la BD

## Installation dépendances

```sh
$cd Back && composer install
$cd Front && npm install
```

### Migrations et Seeders

```sh
php artisan migrate:fresh --seed
```

### Lancement côté server

```sh
$cd Back/php artisan serve
```

### Lancement côté Front

```sh
$cd Front/npm run dev
```
### Identifiants de Connexion Administrateur
```sh
- User: admin@gmail.com
- Mdp: password
```