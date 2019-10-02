# Gleemer

**Code snippet repository web service.**

## 1. Idea

The idea behind this project was to create a robust code snippet hosting service, while utilizing the technologies I'm more or less used to.

Each and every feature was added due to either of two reasons:

- the feature was essential to the project.
- the feature provided educational value.

## 2. Installation

- Connect to your server and open shell.
- Clone repo via `git clone https://github.com/JTinkers/Gleemer.git` command.
- Move nested `Gleemer` folder to an appropriate location.
- Navigate to the inside of moved folder.
- Run `install_me.sh`.
- Edit .env to suit your needs.
- Run `php artisan migrate:fresh` command.
- Done.

## 3. Features

Gleemer comes with a multitude of features meant to make the website enjoyable, responsive, efficient and accessible to third-party apps.

Describing every feature implemented into the project would make this readme incredibly incomprehensible, so instead I'll give a brief explanation of how the core parts work.



**Main Page**

Main page displays a list of public snippets sorted by their post date (asc).

Snippets displayed on the page are paginated and load asynchronously as soon as user reaches bottom of the list (infinite scrolling).



**Snippets**

Snippets are bits of code that can be rated, favourited, commented on and posted by signed-in users.

Whenever a snippet is posted, one of three visibility modes can be applied:

- public: listed on main page, can be viewed by anyone
- private: not listed on main page, can only be viewed by author
- unlisted: not listed on main page, can only be viewed through direct link

Code stored in a snippet has its' syntax highlighted based on the language used (Gleemer supports up to 150 programming languages.)

Each snippet can be accessed via url that contains its' `Id` or via slug url containing its' title (`/snippet/show/slug/an_example_snippet`)

When browsing a snippet, one can easily copy the code by clicking 'copy' or copy slug url by clicking 'share'.



**Users**

Each user has a user page consisting of:

- a list of snippets posted by the user
- a list of favourited snippets
- a user bio
- a panel of statistics

Being a user also grants you ability to access private api using a unique user-asigned api key that can be generated from the 'edit' page.

Each user has a customizable avatar, limited to size of 16x16.



**Moderation**

Every user has a column called `flags` which defines his access to admin tools.

A user with maximum power (an admin) can access admin toolbar, view list of user's snippets, view list of user's favourites, view user's private snippets, delete comments, delete and edit snippets, ban and unban users.



**Search Service**

Users can easily find public snippets and users by simply typing a portion of the snippets title or user's name into the search bar.



**Locale**

Gleemer supports 2 languages: English and Polish.
Switching between the two can be done from the bottom of the page.



**Design**

Style used on the website is a combination of AtomicCSS and functional programming paradigms.

Thanks to extensive usage of grids and flexboxes, website is responsibe, scalable and clean.



## 4. Technologies

Technologies used in this project are as follows:

- [Laravel](https://laravel.com/)
- [Vue.js](https://vuejs.org/)
- [VueObserveVisibility](https://github.com/Akryum/vue-observe-visibility)
- [SASS](https://sass-lang.com/)
- [HLJS](https://highlightjs.org](https://highlightjs.org/)



## 5. Images

Sign-in/Sign-up page.

![README-Images\2.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/2.png)

User edit page.

![README-Images\4.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/4.png)

API documentation page.

![README-Images\3.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/3.png)

Snippet submission page.

![README-Images\8.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/8.png)

Main page.

![README-Images\11.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/11.png)

Viewing a snippet.

![README-Images\10.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/10.png)

Toolbar that admin sees when browsing snippets.

![README-Images\9.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/9.png)

User page.

![README-Images\7.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/7.png)

Panel that admin sees when banning user.

![README-Images\1.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/1.png)

How other users see a banned user.

![README-Images\6.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/6.png)

The 'You Are Banned' page.

![README-Images\5.png](https://github.com/JTinkers/Gleemer/blob/master/README-Images/5.png)
