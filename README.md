# Github OAuth Example
This app shows an example of using OAuth 2.0 to authorize user with third-party auth provider like Github.

## Build
1. Clone this repository
    ```
    git clone https://github.com/goloburdaivan/GithubOAuthLaravel.git
    ```
2. Rename .env.example to .env
   ```
   cp .env.example .env
   ```
3. Configure your application
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE={your_db}
   DB_USERNAME={login}
   DB_PASSWORD={password}


   GITHUB_CLIENT_ID={client_id}
   GITHUB_CLIENT_SECRET={secret_id}
   ```
4. Generate app key
   ```
   php artisan key:generate
   ```
5. Run migrations
   ```
   php artisan migrate
   ```
6. Open home page and authorize
