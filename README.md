# [Projet file rouge] Gen Carte

Ce projet est une application que nous avont proposer
au jury de notre examen pour la validation du diplome.
le projet est basé sur CodeIgniter pour ça simpliciter et rapidité à assimiler.

## CodeIgniter?

- [CodeIgniter](http://codeigniter.com).
- [MythAuth](https://github.com/lonnieezell/myth-auth).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Init DataBase

White command is terminale

`php spark migrate --all`

`php spark migrate create_carte_tables`

 Add user Admin

`php spark db:seed BaseSeeder`

Start server local dev

`php spark server`


### Login Admin

    login:admin
    pwd: Password123

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
