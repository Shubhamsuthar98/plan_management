Step to SetUP Project ::

Run the following command to clone the repository to your local machine:
	git clone https://github.com/Shubhamsuthar98/plan_management.git

Navigate into the project directory:
	cd plan_management

Install Dependencies:
	composer install

Install JavaScript dependencies (if applicable):
	npm install

Compile assets (if applicable):
	npm run dev
----------------------------------------------------

Set Up Environment Variables
Copy the .env.example file to .env:
	cp .env.example .env

Update the .env file with your local environment settings, such as:

Database credentials (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
Application URL (APP_URL)

Generate Application Key
	php artisan key:generate

Set Up the Database: 
	php artisan migrate

(Optional) Seed the database with test data:
	php artisan db:seed

----------------------------------------------------

Start the Development Server
	php artisan serve

	
