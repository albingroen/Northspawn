# Northspawn

## Initializing boilerplate

```
mkdir northspawn && cd northspawn && mkdir incs &&
mkdir imgs && mkdir styles && touch index.php && cd styles && touch styles.scss
```

## Tools and methods

* 😅 PHP
* :metal: SASS
* :sparkles: CSS
* :camel: VSCode
* :octocat: Github Desktop
* 🖥 Iterm 2
* 🔨 SQLite Studio

## Project status

* [x] Create ideas
* [x] Idea feedback from mentors
* [x] Project plan
* [x] Start building
* [ ] Finish build
* [ ] Review of project

## Ideas & features

* Start page w/ news feed and comments
* Register form for showing interest in joining event
* All texts should be database sources for easy editing
* Admin page for creating news

## Notes

---

## 2018-05-04

Today I started the day by building on the functionalities with user accounts. I finished my register and login pages so I could begin with the functionalities. I realized the best way of making the flow was to make a user register and sign in on their account before actually being able to place and order. I added a user_passwrod column into my users table in SQLite Studio.

Adding an user to the database was no problem, with a few sql injections and if-statements. Our teacher also decided to have a class in hashing and salting passwords using B-crypt. This made encrypting the password for a user before storing it in the datebase for each user a breeze. The problems starting occuring though when I had to sign in a user on the page over at the login page. My knowledge of SESSION was quite weak, so I googled a little bit and asked for a good explanation from my teacher. I soon realized it was not that complicated, you just had to start the session at some place, and than store for example the email which the user would sign in with in a SESSION variable.

I also decided to create a functionality for being able to load in pages dynamically. For doing this you need something called a page-controller. I created one of these, where i also set `session_start()` and some other variables that need to be globally aplied through out the site. Now I could simply go to pages by doing `index.php?pageid=login` were `index.php` then also would contain header and footer. I think doing this was a good choise and will help me in the future of building the website.

---
