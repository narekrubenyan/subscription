This project is a simple subscription platform built using Laravel.
It provides RESTful APIs to allow users to subscribe to websites and receive email notifications whenever a new post is published on a subscribed website.

Here is how to run this application.
1. Clone the repository: https://github.com/narekrubenyan/subscription.git
2. Install dependencies: 'composer install'
3. Configure .env file: 
    key:generete
    db configs
    and set queue to database
        QUEUE_CONNECTION=database
4. Run migrations to create the necessary tables: 'php artisan migrate'
5. seed data: 'php artisan db:seed'
6. create posts with 'post/create' route
7. subscribe user with 'user/attach' route
8. Start the queue worker to process queued jobs: 'php artisan queue:work'
9. Use command to send emails with queue when new posts were added: 'php artisan app:send-new-post-mails'
