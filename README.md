# RewindBoard

## Local Setup

Prerequisites:
- nvm or the node version specified in `.nvmrc`
- Docker

Setup instructions

- Copy the env example
  - `cp .env.example .env`
- Install composer dependencies
  - `docker run --rm 
    -u "$(id -u):$(id -g)" 
    -v "$(pwd):/var/www/html" 
    -w /var/www/html 
    laravelsail/php83-composer:latest 
    composer install --ignore-platform-reqs`
- *Optional* - Alias sail in `bashrc` or equivalent
  - `alias sail=./vendor/bin/sail` TODO: Confirm
  - All commands listed below will assume this alias is set
- Build containers
  - `sail up -d`
- Generate an application key
  - `sail artisan key:generate`
- Install node dependencies (remember to `nvm use` if needed)
  - `npm ci`
- Setup database + seed testing records
  - `sail artisan migrate --seed`
- Run the application: run each of the following commands in separate terminals
  - `npm run dev`
  - `sail artisan queue:work`
  - `sail artisan reverb:start`

