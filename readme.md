________________________________________________________________
Tools and Environment

- Prefer to use Laragon as IDE and Sublime Text as Text Editor
- Prefer to use TortoiseGit as Git Management Tools

- download laragon at https://laragon.org/download/
select Laragon Full

- download Sublime Text 3 at https://www.sublimetext.com/3

- download TortoiseGit at https://tortoisegit.org/download/

once downloaded

- Install Sublime Text 
- Install Laragon IDE
- Install TortoiseGit (once tortoisegit have finished installation select Git.exe file, directory inside laragon /laragon/bin/git/bin/git.exe)
- Restart PC
________________________________________________________________

This quickstart will use

- PHP Version 7.2.11 / 7.3
- Laravel Framework 5.8
- MySQL (MariaDB 10.3.12) / MySQL 8.0

and will cover below module

- SRBAC (System Role Based Access Control)
- User Management
- System Configuration (Quick Template Change)
- Announcement
- Notification Management
- Holiday Management
- FAQ Management
- Signature Management
- Language Library (code example : @lang('sidebar.home') , library stored in /quickstart/resources/lang/en for english /quickstart/resources/lang/my for malay )
________________________________________________________________

Step To Install Quickstart

Open Laragon Terminal
- git clone https://github.com/developer-unijaya/quickstart.git
- composer install
- cp .env.example .env (this process will copy .env.example file into .env file)

AT file .env
- line 14 to 19 at .env file configure database

At Terminal
- php artisan migrate:fresh --seed
- php artisan key:generate
- php artisan passport:install
- php artisan storage:link

__________________________________________________________
Step Untuk Replicate Quickstart Ke New GitHub Repo

First Git Clone Repo Quickstart ni, type command bawah ni
- git clone https://github.com/developer-unijaya/quickstart_laravel_5.8.git NAMA_FOLDER_APA2_SAHAJA_PUN_BOLEH
- git remote rm origin
- rm -rf .git

Then
- create new repo di developer-unijaya
- contoh nama repo : spa9
- add anda as collaborator ke repo dicreate atas ni

Then masuk ke dalam folder diclone tadi
- git init
- git remote add origin https://github.com/developer-unijaya/spa9.git
- git add .
- git commit -m "first commit" .
- git push -u origin master

__________________________________________________________

CREATE DATABASE 
- name of database : quickstart (with character set utf8mb4_unicode_ci)

OPEN LARAGON TERMINAL
- php artisan migrate:fresh --seed && php artisan passport:install --force && php artisan storage:link


// Nota Pengguna Akses

Bagi Penggunaan Akses Pengguna boleh dikontrol dynamically Mengikut State dan City

lihat pada kod di 

```
\quickstart\app\Http\Controllers\Admin\AccessController.php@insert

line 178

```

masukkan nama route yang mana borang akan digunakan dynamically control pengguna mengikut state dan city

di dalam koding proses menarik borang boleh dibuat seperti contoh koding berikut


forma-state-1
forma-city-1

1 adalah primary key bagi negeri / daerah

sample kod untuk dapatkan array state mengikut role pegawai

```
$state_list = array();

for($i=0;$<16;$i++){
	if(auth()->user()->hasPermissionTo('forma-state-'.$i)){
		$state_list[] = $i;
	}
}

$city_list = array();

for($i=0;$<127;$i++){
	if(auth()->user()->hasPermissionTo('forma-city-'.$i)){
		$city_list[] = $i;
	}
}

FormB::whereIn('state_id',$state_list )

FormB::whereIn('city_id ',$city_list )
```


```
User::permission($access->name)

// dapatkan semua user dengan access $access->name

User::hasPermissionTo($string)

// check jika user mempunyai permission berikut atau tidak, akan return booelan value

User::hasAnyPermission($array)

// check jika user mempunyai mane2 salah satu permission dinyatakan, akan return boolean value

```

sekiranya hasPermisionTo atau hasAnyPermission masih return false walaupun permission telah ada sila run command berikut di terminal untuk clear cache


```
php artisan cache:forget spatie.permission.cache
php artisan cache:clear

```




