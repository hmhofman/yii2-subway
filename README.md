# Technical challenge Vontis
*See below for personal reflections...*

------------

> A fun technical challenge to find out how familiar you are with PHP, MySQL and Yii2 (and a
little frontend work).

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


------------



## Reflections

### Yii Project
This is my first Yii2 project. Switching from my experience in Laravel (5 - 8), I had to learn Yii from scratch.

This little project shows my learning curve as was as the way I would normally handle programmiung assignments. It's a fun project to start. Should not have to take too mutch time.

Whitch is exactly the problem: time. Or... the lack thereof.
This project is done in what little spare time I could offer. So it might take a bitr longer than usual...