# Gleemer

**Code snippet repository web service.**



## 1. Idea

The idea behind this project is to create a robust code snippet hosting service.

Every snippet can have its' language or visibility adjusted according to users' needs.

Additionally, every snippet can be rated, commented or favourited.



The portal used as a main driver is compact, responsive and written according to rules of SPA (somewhat).



## 2. Tools & Technologies

The following frameworks, libraries and technologies have been used:

- **Laravel** - main framework, ORM, microservice development, templating engine
- **Vue.js** - asynchronous containers
- **SASS** - stylesheet generation/development
- **HLJS** - syntax highlighting



## 3. Features

- **Microservices**
  - Permissions Middleware
  - Logs Middleware
  - Public/Private API
- **Snippets**
  - CRUD
  - Commenting, rating, viewing, favouriting
  - Syntax highlighting
  - Visibility modes: public, private (posting user only), unlisted (only with link)
- **Users**
  - Sign-up, sign-in
  - 16x16 avatars, (image-rendering: pixelated)
  - Display stats for user, like: total snippet rating
- **Style**
  - Responsive
  - Made as combination of AtomicCSS and functional programming
  - Scalable
  - Broken into modules
- **Admin Panel:**
  - Snippet editting/deleting
  - Comment deleting
  - User banning
  - 
- **Misc**
  - URL Slugs - with alphanumeric generator for unlisted snippets
  - Searching
  - Permalinks with slugs



## 4. Implementation

#### 4.1 Models

Following models are created and mapped to database:

- **[User]:**

  Mapped: {Id, Nickname, Flags(bitmask), Bio, Login, Password(hashed), E-mail, DateRegistered}

  Not-mapped: {Slug, Relations}

- **[Ban]:**

  Mapped: {Id, UserId, AdminId, Reason, Length, DateBanned}

  Not-mapped: {Relations}

- **[Snippet] :** 

  Mapped: {Id, UserId, IsPrivate, Title, Contents, LanguageId, DatePosted, DateUpdated}

  Not-mapped: {Slug, Relations}

- **[Comment]:**

  Mapped: {Id, SnippetId, UserId, IsDeleted, Content, DatePosted}

  Not-mapped: {Slug, Relations}

- **[Rating]:**

  Mapped: {Id, SnippetId, UserId, Modifier, DateRated, DateUpdated}

  Not-mapped: {Relations}

- **[View]:**

  Mapped: {Id, SnippetId, UserId, DateViewed}

  Not-mapped: {Relations}

------

#### 4.2 Microservices

##### 4.2.1 API

Provides CRUD functionality to all models in the database.

##### 4.2.2 Permissions Middleware

Whenever a HTTP request is made to a private portion of API, the RM will check whether it should or shouldn't go through.

##### 4.2.3 Logs Middleware

Logs every user, snippet, comment, rating and ban.

------

#### 4.3 Components

##### 4.3.1 Blade Components

Every unique or reusable chunk of code was turned into a component, as well as groups of elements to make code shorter and more readable.

- Nav
- Footer
- Snippet Panel
- Panel
- Button
- Button Group
- ..

##### 4.3.2 Vue Asynchronous Containers

Responsible for fetching snippets, comments and ratings in real-time.

------

#### 4.4 Style

Style files have been broken-down and stored in folders named after their categories:

`main` - stores: imports (s.e), palette (s.e), defaults (font-families ..), tags (styling for default tags)

`generics` - stores: margins, paddings, displays ..

`components` - stores: components and uniques (like logo, nav, footer, inputs (buttons), snippet panel, etc.)

`vendor` - stores: third party styles

##### 4.4.1 Generic Properties

Every generic property or a set of properties was turned into a class.

**Example:**

`display: flex;`

Is now defined as:

`.display(flex)`



Properties with numeric value have classes generated for values from 2 to 256, with step equal to 2.

**Example:**

`margin-right: 16px;`

Is now defined as:

`.margin-right(16px)`

#### 4.5 Admin Panel

Admins are equipped with tools to edit and remove snippets, ban or unban users, delete comments and view logs. 



## To-Do's:

## Tasks:

<https://app.clickup.com/2187943/d/t?p=2285400&c=2825717>