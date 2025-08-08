# Retro Board

Team retrospective board built with Laravel 11, Jetstream, Inertia + Vue 3, Tailwind, MySQL, Redis, and Laravel Reverb for real-time updates. Everything can run in Docker; the only host tool you need beyond Docker is Node via `nvm`.

## Prerequisites
- Docker + Docker Compose
- `nvm` (uses the Node version pinned in `.nvmrc`, currently 20.11.0)

## Initial setup
1. Clone the repo and enter it.
2. Copy env vars and set local defaults for Sail:
```
cp .env.example .env
```
3. Install PHP dependencies using Sail’s Composer image (no local PHP required):
```
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs
```
4. Start the stack: `./vendor/bin/sail up -d`
5. Generate keys/links: `./vendor/bin/sail artisan key:generate && ./vendor/bin/sail artisan storage:link`
6. Prepare the database: `./vendor/bin/sail artisan migrate --seed`
   - Seeded users: `test@example.com` and `other@example.com` (password: `password`)
7. Run background workers needed for real-time updates:
   - Queue worker or Horizon: `./vendor/bin/sail artisan horizon` (or `queue:work`)
   - Reverb websocket server: `./vendor/bin/sail artisan reverb:start`
8. Set up Node and the Vite dev server on the host:
```
nvm install
npm install
npm run dev
```
   - Vite runs on port 5173 by default (published in `docker-compose.yml`); visit http://localhost.

## Useful commands
- Stop the stack: `./vendor/bin/sail down`
- Backend tests: `./vendor/bin/sail artisan test`
- Frontend tests: `npm test`
