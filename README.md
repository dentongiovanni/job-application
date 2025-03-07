Job Application Web App

Installation Guide

1. Install Docker

Download and install Docker Desktop from:
🔗 https://www.docker.com/products/docker-desktop/

Ensure Docker is running before proceeding.

2. Set Up Environment Variables

Rename .env.example to .env in the project root directory.

mv .env.example .env

3. Start the Application

Run the following command inside the directory where the docker-compose.yml file is located:

docker-compose up -d; docker exec -it jobapp_php sh -c "composer install --no-dev --optimize-autoloader && php artisan migrate --force && php artisan db:seed && npm install && npm run build"

🔹 Note:Ensure ports 3306 (MySQL) and 80 (NGINX/Apache) are not in use before running the command.

📌 Example Directory Structure:

C:\Users\Lenovo\Documents\products\job-application> docker-compose up -d; docker exec -it jobapp_php sh -c "composer install --no-dev --optimize-autoloader && php artisan migrate --force && php artisan db:seed && npm install && npm run build"

What this command does:

✅ Downloads all dependencies✅ Runs database migrations✅ Seeds data from an Excel file✅ Creates authentication credentials✅ Builds the web app

4. Login Credentials

Once the setup is complete, you can log in with:

Email: admin@dswd.gov

Password: (as defined in the seeder)

5. (Optional) Run Unit Tests

To verify functionality, run the unit test for ApplicantService:
