# Gleemer

**Code snippet repository web service.**



## 1. Idea

The idea behind this project is to create a robust code snippet hosting service.

Every snippet can have its' language or public visibility adjusted according to users' needs.

Additionally, every snippet can be rated, commented or favourited.



The portal used as a main driver is compact, responsive and written according to rules of SPA (somewhat).



## 2. Tools & Technologies

The following frameworks, libraries and technologies have been used:

- **Laravel** - main framework, ORM, microservice development, templating engine
- **Vue.js** - API containers, wrappers etc.
- **SASS** - stylesheet generation/development
- **HLJS** - syntax highlighting



## 3. Features

- **Microservices**
  - Permissions Middleware **[check]**
  - Public/Private API **[check]**
  - API Timeout
- **Snippets**
  - CRUD **[check]**
  - Commenting, rating, viewing, favouriting **[check]**
  - Syntax highlighting **[check]**
  - Visibility modes: public, private (posting user only), unlisted (only with link) **[check]**
- **Users**
  - Sign-up, sign-in **[check]**
  - 16x16 avatars, (image-rendering: pixelated) **[check]**
  - Display stats for user, like: total snippet rating **[check]**
- **Style**
  - Responsive **[check]**
  - Made as combination of AtomicCSS and functional programming **[check]**
  - Scalable **[check]**
  - Single palette **[check]**
- **Admin Panel:**
  - Snippet editting/deleting
  - Comment deleting
  - User banning
- **Misc**
  - URL Slugs - with alphanumeric generator for unlisted snippets **[check]**
  - Searching **[check]**
  - Permalinks with slugs **[check]**



## 4. Implementation

#### 4.1 Models

Models have a task of describing their fields and relations.

Following models are created and mapped to database:

- **[User]:**

  Mapped: {id, nickname, flags(bitmask), bio, login, password(hashed), email, date_registered}

  Not-mapped: {Slug, Relations}

  **Relations:**

  - 1 to n: User -> Ban
  - 1 to n: User -> Snippet
  - 1 to n: User -> Views
  - 1 to n: User -> Comments
  - 1 to n: User -> Ratings
  - 1 to n: User -> Favourites

- **[Ban]:**

  Mapped: {id, user_id, admin_id, reason, length, date_banned}

  Not-mapped: {Relations}

  **Relations:**

  - 1 to 1: Ban -> User
  - 1 to 1: Ban -> User (Admin)

- **[Snippet] :** 

  Mapped: {id, user_id, visibility_mode, title, contents, language_id, date_posted, date_updated}

  Not-mapped: {Slug, Relations}

  **Relations:**

  - 1 to 1: Snippet -> User
  - 1 to n: Snippet -> Views
  - 1 to n: Snippet -> Comments
  - 1 to n: Snippet -> Ratings
  - 1 to n: Snippet -> Favourites

- **[Comment]:**

  Mapped: {id, snippet_id, user_id, is_deleted, content, date_posted}

  Not-mapped: {Slug, Relations}

  **Relations:**

  - 1 to 1: Comment -> Snippet
  - 1 to 1: Comment -> User

- **[Rating]:**

  Mapped: {id, snippet_id, user_id, value, date_rated}

  Not-mapped: {Relations}

  **Relations:**

  - 1 to 1: Rating -> Snippet
  - 1 to 1: Rating -> User

- **[View]:**

  Mapped: {id, snippet_id, user_id, date_viewed}

  Not-mapped: {Relations}
  
  **Relations: **
  
  - 1 to 1: View -> Snippet
  - 1 to 1: View -> User
  
- **[Favourite]:**

  Mapped: {id, user_id, snippet_id, date_favourited}

  Not-mapped: {Relations}

  **Relations:**

  - 1 to 1: Favourite -> Snippet
  - 1 to 1: Favourite -> User



**Ruleset:**

**Controller: **Stores methods and rules for CRUD of data. Defines which models should be displayed (including relationships).

**Model:** Defines rules for a singular instance (like hiding fields when access is denied).

------

#### 4.2 Microservices

##### 4.2.1 API

Provides CRUD functionality to all models in the database.

##### 4.2.2 Permissions Middleware

Whenever a HTTP request is made to a private portion of API, the RM will check whether it should or shouldn't go through.

------

#### 4.3 Components

##### 4.3.1 Blade Components

Every unique or reusable chunk of code was turned into a component, as well as groups of elements to make code shorter and more readable.

- Nav
- Footer
- Panel
- Button
- Button Group
- ..

##### 4.3.2 Vue Asynchronous Containers

Responsible for fetching snippets, comments and ratings in real-time.

------

#### 4.4 Style

Files required to generate the style are as follows:

`main.scss` - output file, contains styling unique to one or few subpages like snippet.index or snippet.create

`variables.scss` - contains all variables used across the style

`palette.scss` - contains the main palette with multiple shades

`generics.scss` - contains generic (generated) properties

`functions.scss` - contains functions used across the style

`defaults.scss` - contains styling for default html tags

`components/*` - contains styling for reusable components like nav, footer, snippet, panel, button, button group

`vendor/*` - contains files related to styling third-party libraries

##### 4.4.1 Generic Properties

Every generic property or a set of properties was turned into a class.

**Example:**

`display: flex;`

Is now defined as:

`.display(flex)`



Properties with numeric values have classes generated for values from 1 to 128 (step being power of 2)

**Example:**

`margin-right: 16px;`

Is now defined as:

`.margin-right(16px)`

#### 4.5 Admin Panel

Admins are equipped with tools to edit and remove snippets, ban or unban users, delete comments and view logs. 
