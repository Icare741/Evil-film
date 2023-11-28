# Introduction

Ce projet consiste à créer un site web qui répertorie des films. Le site permettra aux utilisateurs de rechercher des films par titre, genre, année de sortie, etc. Les utilisateurs pourront également ajouter, modifier ou supprimer des films.

## Technologies utilisées

- [Angular](https://angular.io/)
- [Laravel](https://laravel.com/)
- [MariaDB](https://mariadb.org/)
- [Docker](https://www.docker.com/)

## Installation

### Prérequis

- [Docker](https://www.docker.com/)
- [Node.js](https://nodejs.org/en/)
- [Composer](https://getcomposer.org/)
- [Angular CLI](https://cli.angular.io/)
- [Yarn](https://yarnpkg.com/)

### Mise en place

#### Environment

1. Se rendre dans le dossier `racine` et exécuter la commande `docker-compose up -d`
2. Une base de données MariaDB est maintenant accessible sur le port `3306`

#### Server

1. Se rendre dans le dossier `api` et exécuter la commande `composer install`
2. Copier le fichier `.env.example` et le renommer en `.env`
3. Modifier les variables d'environnement dans le fichier `.env` (si nécessaire)
4. Exécuter la commande `php artisan key:generate`
5. Exécuter la commande `php artisan migrate:refresh`
6. Exécuter la commande `php artisan db:seed`
7. Exécuter la commande `php artisan serve`

#### Client

1. Se rendre dans le dossier `client` et exécuter la commande `yarn install`
2. Exécuter la commande `ng serve`
