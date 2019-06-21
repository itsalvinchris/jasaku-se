# JASAKU

JASAKU is a Project for  COMP6100 - Software Engineering LA08 Class in Bina Nusantara University.

JASAKU adalah perusahaan yang bergerak dibidang teknologi e-commerce yang didirikan pada tahun 2019 oleh lima mahasiswa BINA NUSANTARA. 

Berawal dari semakin kecilnya peluang mendapatkan pekerjaan di marketplace dan sulitnya mencari tenaga ahli yang terpercaya, maka dikembangkanlah e-commerce yang menghubungkan penyedia suatu jasa dengan pencari jasa.

[jasaku.christopheralvin.xyz](https://jasaku.christopheralvin.xyz)

## Teams
* Christopher Alvin (2101626683)
* Emilda (2101655393)
* Megga Eunike (2101643545)
* Natasya (2101696102)
* Nathan Priyasadie (2101705694)

## System Requirements

* PHP >= 7.1.3
* BCMath PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension


## Installation

1. Use the package manager [composer](https://getcomposer.org/download/) to install Jasaku.

```bash
composer install
```

You might want to look at .env to configure the database
2. If .env not exist copy .env.example and rename it to .env 
3. If APP_KEY not generated run
```bash
php artisan key:generate
```
4. Example
```bash
DB_DATABASE=xxx
DB_USERNAME=xxx
DB_PASSWORD=xxx
```
5. Migrate the database and seed the data
```bash
php artisan migrate:fresh --seed
```
6. You might want to look at DatabaseSeeder.php to edit seed data

7. Don't forget to link storage/app folder to public folder wit
```bash
php artisan storage:link
```

## Technologies
Project is created with:
* Laravel PHP Framework: 5.8.7
* Bootstrap: 4.31
* jQuery: 3.3.1
* DataTables : 1.10.18