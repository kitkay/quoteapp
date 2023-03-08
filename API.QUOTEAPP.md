# API.QuoteApp design

## This document solely focuses on creating the QuoteApp Restful API

### Architecture

+ MVC Approach in creation of RestAPI
+ Usage of sanctum for auths
+ Leveraging Repository Pattern

### Project Structure

+ app/Http/Controllers/API - handles all the API endpoints that would be served.


### Technicalities
Migrate and seed
+ php artisan migrate:fresh --seed --seeder=QuoteSeeder

Install personal passport client
+ php artisan passport:client --personal
+ 
# WIP
