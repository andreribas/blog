# blog
A simple blog system made with Laravel.

Access a running example [here](http://andreribas-blog.herokuapp.com/)

# Features
- User registration
- User must be authenticated to create a new post
- A user can only edit or delete his or hers own posts
- Viewers can comment on posts

# Runnning locally
- **Clone this repo:** `git clone https://github.com/andreribas/blog.git`
- **Enter the cloned repo directory:** `cd blog`
- **Install composer dependencies:** `composer install`
- **Copy sample env file:** `cp .env.example .env`
- **Configure your envs:** Edit the file `.env` to suit your local environment. The key configs are the `APP_NAME` and all `DB_*` configs.
- **Generate Laravel's `APP_KEY`:** `php artisan key:generate`
- **Run all migrations:** `php artisan migrate`
- **Serve your application:** `php artisan serve`
- **Access your local blog in your browser through the address:** `http://localhost:8000/`
