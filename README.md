### 1. Install Docker

Download and install Docker Desktop from:  
🔗 [Docker Desktop](https://www.docker.com/products/docker-desktop/)

Ensure Docker is running before proceeding.

### 2. Set Up Environment Variables

Rename `.env.example` to `.env`:

```sh
mv .env.example .env
```

### 3. Start the Application

Run the following command inside the directory where `docker-compose.yml` is located:

```sh
docker-compose up -d; docker exec -it jobapp_php sh -c "composer install --no-dev --optimize-autoloader && php artisan migrate --force && php artisan db:seed && npm install && npm run build"
```

###  Use Tables for Features (Optional)**  

```md
| ✅ Feature                     | Description                           |
|--------------------------------|---------------------------------------|
| 📦 **Dependency Install**      | Installs all necessary dependencies  |
| 🗄️ **Database Migration**      | Runs `php artisan migrate --force`   |
| 📊 **Seeding Data**            | Seeds data from an Excel file        |
| 🔑 **Authentication Setup**    | Creates default credentials          |
| 🌐 **Frontend Build**          | Runs `npm install && npm run build`  |
```


### 4. Login Credentials

- **Email:** `admin@dswd.gov`
- **Password:** _(Defined in the seeder)_


### 5. (Optional) Run Unit Tests

Run the unit test for `ApplicantService`:

```sh
docker exec -it jobapp_php sh -c "php artisan test --filter=ApplicantServiceTest"
```


---

### 🎯 You're All Set! 🚀
```md
Your job application web app should now be running. Let me know if you need any modifications!


