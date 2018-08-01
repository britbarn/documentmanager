# Document Manager App

This is a Laravel app built for the purpose of creating, editing, deleting, and downloading documents.

## Installation

### Requirements

- Vagrant
- homestead (https://laravel.com/docs/5.6/homestead)
- Composer


When vagrant and homestead are installed and project is cloned, cd into the documentmanager
directory and run

```
vagrant up
```

After the site is up, the database needs to be built and seeded with test data:

```
vagrant ssh
php artisan migrate
php artisan db:seed
```
