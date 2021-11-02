# Technical challenge Vontis
*See below for personal reflections...*

------------

> A fun technical challenge to find out how familiar you are with PHP, MySQL and Yii2 (and a little frontend work).

## Summary

At the office we often order sandwiches at a local sandwich­shop. Right now everybody that wants to have a sandwich needs to write down their preferred choice.

We need a Yii2 application backed by a MySQL database to manage this (very complex) process.

A administrator should be able to add users (people that are going to eat the sandwich). The administrator should open up “registration” for a new meal. That stops people from ordering subway meals all the time. A meal has a status that can be controlled by the admin (open and closed).

Only one meal can be “open” at a single time. And only on a open meal users can register their choice. A meal also has a date (the date that we had the meal).

A meal should also have a unique link. This link can be opened on a mobile device (without a password) to check what the current order is.

Every user should have a unique code he can login with on a certain page. On that page the user can pick:

-  What bread (dropdown list, choices from database)
-  Size of the bread (dropdown, 15 or 30 cm)
-  If it should be oven baked or not
-  Taste of the sandwich (dropdown from database, for instance chicken fajita)
-  Extra’s (extra bacon, double meat or extra cheese)
-   What vegetables you want on the sandwich (dropdown, multiple possible values from the database)
-  What sauce (dropdown from the database)

Then the user can place his order (on the current open order). The user must be able to edit his order (but only when the order is still open).
The user should also be able to view his previous orders when he is “logged in” by his unique link.

## Steps

- Create a datamodel (using MySQL workbench)
- Install the datamodel in a MySQL database
- Install Yii2 with composer
- Generate model code and CRUD code with Gii
- Improve the code for user friendliness
- ????
- PROFIT!!!

## Bonuspoints 

- Whenever the user needs to place a new order, his previous order will automatically be prefilled in the form
- On the unique link of the admin, the GPS location of the mobile phone of the “subway retrieving user” should be tracked and available on the unique links of all the users (on a Google map)
- Users should be able to rate their experience with a meal, so they can see if they should order the same meal again
- A button on the “admin mobile page” can be pressed to call ahead using MessageBird to the subway restaurant, that a big order is coming their way ;)
- You unit-test and acceptance-test the “complex” application

------------


# Reflections

## Yii Project
This is my first Yii2 project. Switching from my experience in Laravel (5 - 8), I had to learn Yii from scratch.

This little project shows my learning curve as was as the way I would normally handle programmiung assignments. It's a fun project to start. Should not have to take too mutch time.

Whitch is exactly the problem: time. Or... the lack of time.
This project is done in what little spare time I could offer. So it might take a bitr longer than usual...

### What I think of Yii2
The demo's I've read all push the models into a single directory. Cluttering that same folder with models for forms. Personally, I'd like to destinguish more within the models, seperating them by namespace and/or file hierarchy. And I'm not sure the forms definitions belong with the models.I guess it would be easier to split form functionality from the database model, but If that's the way to go, maybe create e new namespace: user\forms?

## Methods

### Install scripts
- composer create-project --prefer-dist yiisoft/yii2-app-basic ./
- Using the docker setup I have for Laravel. That Database Server is open for the host, so I can run php on a different port:
- `cd /var/www/(...)/subway/ ; sudo php yii serve --port=888`

- [A simple example of fine-tuning Yii2 basic for authorization via the database, adding registration and resetting the password.](https://devreadwrite.com/posts/yii2-basic-authorization-and-registration-via-the-database "A simple example of fine-tuning Yii2 basic for authorization via the database, adding registration and resetting the password.")

I did checkout these scripts, but ended up reverting my changes, the reason in the link title:
- [How to Program With Yii2: Integrating User Registration](https://code.tutsplus.com/tutorials/how-to-program-with-yii2-integrating-user-registration--cms-22974 "ATTENTION: THIS PROJECT HAS BEEN ABANDONED!!!")

### Database setup
I set up the database using [DBeaver](https://dbeaver.io/ "Free Universal Database Tool"). While perhaps not as versitile as the MySQL Workbench, I had less trouble updating on my system running Arch Linux. (I also enjoyed working with [Valentina Studio](https://valentina-db.com/en/studio/download "Valentina Studio is the ultimate data management tool for database administrators.").)
Because this database is outside of version control ([GIT](https://wiki.archlinux.org/title/Git "git is a front-end to the AUR. :v:")) I added the creation script to [migrations](https://www.yiiframework.com/doc/guide/2.0/en/db-migrations#applying-migrations "Database Migration - Applying Migrations"). 
In order to run this setup on your own system, change the config/db.php file to have the desired values.

### Coding Aid
Normally I use [Atom](https://atom.io/ "A hackable text editor for the 21st Century") for coding the web. Because I have my projects set up for my day job, I tried different alternatives: 
- [Code - OSS](https://wiki.archlinux.org/title/Visual_Studio_Code "Visual Studio Code is a cross-platform, free and open source text editor developed by Microsoft, written in JavaScript and TypeScript"): This program works great over slow SSH/network drives. I use this when I need LIVE hacks. Have it set up in a color theme wich reflects warning.
- [PhpStorm](https://aur.archlinux.org/packages/phpstorm "The Lightning-Smart PHP IDE"): I hear it's great, but I have a thing about paying personally what I use professionally. 
- [Komodo Edit](https://aur.archlinux.org/packages/komodo-edit/ "Komodo Edit is a great editor if you’re looking for something powerful, yet simple."): I read about this one. Not on the top of my list, but a wanted a different editor than I use for my day-job, so why not try it? It will not replace my default (Atom), but it gets the job done.

Most of my GIT work, I do from the command line. I have met colleagues that simply do a `commit -a`, but I like to examen my changes. Try to create commit's containing all of the changes required for a feature. No more, no less.
That would require these commands: 
- `git status`, `git diff -w --color-words`, `git commit `, `git log`, etc
How about this one: 
`git log --all --graph --oneline --simplify-by-decoration --date=short --pretty=format:"%C(yellow)%h%Creset%C(red)%C(bold)%d%Creset%C(white)(%cd)%Creset %s"`
- When searching the history I use [smartGIT](https://www.syntevo.com/smartgit/ "Get your commit done") (no more then once a month). I hear PhpStorm has a great git utility build in.
- Have have grown fond of the setup I have in [Fish Shell](https://fishshell.com/ "fish is a smart and user-friendly command line shell for Linux, macOS, and the rest of the family."), though I can also work with [Zsh](https://www.howtogeek.com/362409/what-is-zsh-and-why-should-you-use-it-instead-of-bash/ "What is ZSH, and Why Should You Use It Instead of Bash?") and [Bash](https://www.gnu.org/software/bash/ "Bourne Again SHell"). 

And of course the default linters. Most editors have these, but some can be used 
- `php -l [filename]`  - automatic
- `phpcs` - not default in Komodo Edit. I have it setup in Atom, reading either a local (project) or a global settings file. You could even set up git to block updates that do not meet the Coding Standard.
- jshint - For some reason I can't use eslint on the terminal. So i use jshint there. Setup using `.jshintrc`.
- eslint - Most editors have eslint rules checks. Those can be setup in the `package.json` or `.eslintrc.js`.

