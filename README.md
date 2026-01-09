# Backend Web Project (Laravel)

Laravel project voor **Backend Web**.

## Requirements

- **PHP**: 8.2+ (project gebruikt Laravel 12)
- **Composer**
- **Node.js + npm** (voor Vite/Tailwind build)
- Database:
  - **SQLite** (default, geen database server nodig)
  - of MySQL/MariaDB

### PHP & Composer installeren (Windows)

Aanrader: **Laravel Herd** (installeert PHP + Composer + handige tooling)
- https://herd.laravel.com

Alternatief: manuele installatie
- PHP: https://windows.php.net/download/
- Composer: https://getcomposer.org/download/

Verifiëren:

```powershell
php -v
composer -V
node -v
npm -v
```

---

## Setup

### 1) Repo clonen

```powershell
git clone <repository-url>
cd laravelbackendproject
```

### 2) PHP dependencies installeren

```powershell
composer install
```

### 3) `.env` maken + app key genereren

```powershell
copy .env.example .env
php artisan key:generate
```

### 4) Database (SQLite quick start)

In `.env.example` staat standaard:

- `DB_CONNECTION=sqlite`

Laravel gebruikt de SQLite file `database/database.sqlite`.

Maak de file aan (indien nodig):

```powershell
if (!(Test-Path database\database.sqlite)) { New-Item -Path database\database.sqlite -ItemType File | Out-Null }
```

### 5) Migraties + seed

```powershell
php artisan migrate:fresh --seed
```

### 6) Storage symlink (voor avatars/uploads)

```powershell
php artisan storage:link
```

### 7) Frontend build (Tailwind/Vite)

```powershell
npm install
npm run build
```

### 8) Server starten

```powershell
php artisan serve
```

Open daarna:
- http://127.0.0.1:8000

---

## Quick start (voor evaluatie)

Onderstaande is voldoende om alles te runnen met SQLite:

```powershell
copy .env.example .env
php artisan key:generate
if (!(Test-Path database\database.sqlite)) { New-Item -Path database\database.sqlite -ItemType File | Out-Null }
php artisan migrate:fresh --seed
php artisan storage:link
npm install
npm run build
php artisan serve
```

---

## Default accounts (na `--seed`)

### Admin (verplicht)
- **Email**: `admin@ehb.be`
- **Username**: `admin`
- **Password**: `Password!321`

### Test user
- **Email**: `test@example.com`
- **Password**: `Password!321`

> De admin user wordt aangemaakt door `database/seeders/DatabaseSeeder.php`.

---

## Belangrijke routes

- Home: `/`
- Dashboard: `/dashboard`
- Auth: `/login`, `/register`, `/forgot-password`
- Forum: `/forum`
- News: `/news`
- FAQ: `/faq`
- Contact: `/contact`
- **My contact messages**: `/contacts` (ingelogd)
- Admin panel (CRUD): onder `/admin/*`
  - voorbeeld: `/admin/news`, `/admin/workouts`, `/admin/contacts`

---

## Features

### Authenticatie
- Register / Login / Logout
- Password reset (MAIL_MAILER=log → zie logs)

### Rollen
- User / Admin (`users.is_admin`)
- Admin middleware blokkeert niet-admins op admin routes

### Forum
- Threads bekijken + aanmaken
- Posts plaatsen
- **User kan eigen post editen en deleten**
- **Admin kan elke post deleten**

### News
- Publieke news lijst + detail
- Comments (auth)
- Admin beheer (CRUD)

### FAQ
- Publieke FAQ pagina
- Admin beheer (CRUD)

### Contact
- Publiek contactformulier
- Contactmessages worden gelinkt aan ingelogde user (`contact_messages.user_id`)
- User kan eigen contact thread bekijken + replies zien
- Admin kan replies sturen

### Profile
- Profiel aanpassen (naam/email/username/birthday/about)
- Profielfoto upload (avatar)

---

## Mail / password reset testen

In `.env.example` staat:

- `MAIL_MAILER=log`

Reset emails worden dan geschreven naar:
- `storage/logs/laravel.log`

Werkwijze:
1. Vraag password reset aan via `/forgot-password`
2. Open `storage/logs/laravel.log`
3. Kopieer de reset link

---

## Troubleshooting

### "vendor/autoload.php" missing
Je hebt `composer install` nog niet uitgevoerd.

### SQLite driver ontbreekt ("could not find driver")
Zet in `php.ini` deze extensions aan:
- `pdo_sqlite`
- `sqlite3`

Verifiëren:

```powershell
php -m | findstr sqlite
```

### Uploads/avatars niet zichtbaar

```powershell
php artisan storage:link
```

### Config cache issues

```powershell
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## Testing

```powershell
php artisan test
```

---

## License

Educational project.
