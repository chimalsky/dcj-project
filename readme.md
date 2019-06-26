## The During Conflict Justice Project
DCJ is built with Laravel and tries to follow  modern web application standards to the best of its abilities in order to make future contributions and modifications frictionlessly as possible. Because Laravel is so well documented, most of the DCJ project's documentation will simply link to relevant parts of the Laravel docs.

## Installation
https://laravel.com/docs/5.8/installation

## Configuration
The important file to note is the `.env` file in the root directory. This is where you set values pertaining to database connection/credentials, Web URL, the Key that is used for encryption, and API Keys for external services. If a `.env` file does not exist, copy the `.env.example' file and create one named `.env`

One important thing to configure in the `.env` file for this project is the queue settings. For downloads we must configure the queue connection to not default to the 'sync' method. I have gone with the `QUEUE_CONNECTION=database` configuration. I recommend this as you won't need an extra service like Redis.

https://laravel.com/docs/5.8/configuration

## Database
Because I'm sending you a mysqldump, you won't need to run migrations like you normally would with Laravel projects. You simply need to create a database, and restore from the sql file.

## External APIs
The DCJ project requires a mailing service for password-resets and job-completetion-notification. Currently, I use a service called Mailgun. However, you can use any mailing service you desire. You simply need to configure it in the `.env` file. I prefer to use Mailgun, because of it's HTTP based nature, which allows me to obviate the setting up of an SMTP server. Your hosting provider will most likely have their own mailing service that they offer.

https://laravel.com/docs/5.8/mail
