# Blog Example Project using Laravel 10

This is an example project for a blog. Laravel 10 is used as framework.


# The Tasks

### You need to create a personal blog with just three pages:

- Homepage: List of articles
- Article page
- Some static text page like "About me"

### Also, there should be a Login mechanism (but no Register) for the author to write articles:

- Manage (meaning, create/update/delete) categories
- Manage tags
- Manage articles
- For Auth Starter Kit, use Laravel Breeze (Tailwind) or Laravel UI (Bootstrap) - that starter kit will have some design, which is enough: the design is irrelevant for accomplishing the task

### DB Structure

- Article has title (required), full text (required) and image to upload (optional)
- Article may have only one category, but may have multiple tags

# Features to implement

Here's the list of Roadmap features you need to try to implement in your code:

## Routing and Controllers: Basics

- Callback Functions and Route::view()
- Routing to a Single Controller Method
- Route Parameters
- Route Naming
- Route Groups

## Blade Basics

- Displaying Variables in Blade
- Blade If-Else and Loop Structures
- Blade Loops
- Layout: @include, @extends, @section, @yield
- Blade Components

## Auth Basics

- Default Auth Model and Access its Fields from Anywhere
- Check Auth in Controller / Blade
- Auth Middleware

## Database Basics

- Database Migrations
- Basic Eloquent Model and MVC: Controller -> Model -> View
- Eloquent Relationships: belongsTo / hasMany / belongsToMany
- Eager Loading and N+1 Query Problem

## Full Simple CRUD

- Route Resource and Resourceful Controllers
- Forms, Validation and Form Requests
- File Uploads and Storage Folder Basics
- Table Pagination

- - - - -

## How to use without Docker/WSL

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` (it has some seeded data for your testing)
- Run `npm install`
- Run `npm run build` or `npm run dev`
- Launch `http://localhost:8000` in your browser
- You can register as regular user or login as admin to manage data with default credentials `admin@admin.com` - `password`

## How to use with Docker+WSL

- Clone the repository with `git clone` in a WSL directory
- Copy `.env.example` file to `.env`
- Run `./dock composer install`
- Run `./dock npm install`
- Run `./dock artisan key:generate`
- Run `./dock artisan migrate --seed` (it has some seeded data for your testing)
- Run `./dock start`
- Launch `http://localhost:8000` in your browser
- You can register as regular user or login as admin to manage data with default credentials `admin@admin.com` - `password`
