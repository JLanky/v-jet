#Task
Hey! Here is a test task for you.
If you succeed and you will complete it, we are glad to see you at the next stage of interviewing.
Good luck!

**Stack:**
Lumen
PostgreSQL

**Task:**
Create RESTFull API.

Description:
Create the API to share the company's information for the logged users.


**Details:**

Create DB migrations for the tables: users, companies, etc.
Suggest the DB structure. Fill the DB with the test data.

**Endpoints:**
- https://domain.com/api/user/register
  — method POST
  — fields: first_name [string], last_name [string], email [string], password [string], phone [string]

- https://domain.com/api/user/sign-in
  — method POST
  — fields: email [string], password [string]

- https://domain.com/api/user/recover-password
  — method POST/PATCH
  — fields: email [string] // allow to update the password via email token

- https://domain.com/api/user/companies
  — method GET
  — fields: title [string], phone [string], description [string]
  — show the companies, associated with the user (by the relation)

- https://domain.com/api/user/companies
  — method POST
  — fields: title [string], phone [string], description [string]
  — add the companies, associated with the user (by the relation)

**Unit tests are optional.**


###Deploy description

>git clone git@github.com:JLanky/v-jet.git

>cd v-jet

>composer install
 
>mv .env.example .env 

Set credentials for database and mail services in the .env file

>php artisan migrate

> php artisan db:seed

**Test user credentials:**

email: admin@i.ua

pass: 12345678

**Link to Postman documentation**
https://documenter.getpostman.com/view/8223351/UVyvuDtC
