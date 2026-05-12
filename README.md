# PHP Laboratoriya Ishlari

## Talaba Ma'lumotlari
- Ism: Sadullayev Jaxongir
- Guruh: 172_23
- Shahar: Jizzax
- Ta'lim dargohi: O'ZMU JF

## Bajarilgan Laboratoriya Ishlari

### Laboratoriya 6.1 - Asosiy Tushunchalar
- Birinchi PHP dasturi ("Salom Dunyo")
- O'zgaruvchilar va ma'lumot turlari
- Arifmetik operatorlar
- Taqqoslash va mantiqiy operatorlar

### Laboratoriya 6.2 - Massivlar
- Oddiy massivlar bilan ishlash
- Assosiativ massivlar
- Ko'p o'lchovli massivlar (2D, 3D)
- Massiv funksiyalari
- Amaliy loyiha: Talabalar boshqaruv tizimi

### Laboratoriya 6.3 - Formalar va Ma'lumot Yuborish
- GET usuli bilan forma yaratish
- POST usuli va server-side validatsiya
- Checkbox va Radio buttonlar bilan ishlash
- Fayl yuklash (Image Upload)

## Lab 6.5 - Sessiyalar, Cookie, Headers, AJAX
Files: `lab_6_5/common.php`, `task1.php`, `task2.php`, `task3.php`, `task5.php`, `task5_redirect.php`, `task5_test.html`

Highlights:
- `task1.php` — Login form with "Remember me" cookie. If checkbox checked, username stored in `remember_user` cookie.
- `task2.php` — Session visit counter (`$_SESSION['visits']++`).
- `task3.php` — Simple cart using `$_SESSION['cart']` (add/remove product IDs).
- `task5.php` — API that requires `?token=secret123`; sends custom header `X-Lab-Owner: Sadullayev Jaxongi` and `Cache-Control: max-age=300`.
- `task5_test.html` — AJAX live-search demo (fetches `lab_6_5/task5.php?token=secret123`).

How to run lab_6_5 locally:
```powershell
php -S localhost:8000 -t .
# Open http://localhost:8000/lab_6_5/index.php
```

## Lab 6.6 - SQLite, Auth, Products, Posts
Files: `lab_6_6/init_db.php`, `db.php`, `register.php`, `login.php`, `task5.php`, `posts.php`, `change_password.php`, `stats.php`, `schema.sql`, `create_database_py.py`

Highlights:
- `init_db.php` and `create_database_py.py` / `schema.sql` create and seed the SQLite DB. `schema.sql` contains DROP/CREATE/INSERT statements and a hashed password for the seed user.
- `db.php` prefers `database.db` and falls back to `lab6.db`.
- `task5.php` supports CSV export (`?export=csv`), category filter (`?category=`) and soft-delete (`deleted_at` timestamp).
- `posts.php` implements a simple posts+comments system.

Creating `database.db` locally (choose one):
- Using sqlite3 CLI:
```powershell
sqlite3 lab_6_6\database.db < lab_6_6\schema.sql
```
- Using Python (included):
```powershell
python lab_6_6\create_database_py.py
```
- Using PHP (if PDO_SQLITE or SQLite3 enabled):
```powershell
php lab_6_6\init_db.php
```

Verify:
```powershell
php lab_6_6\test_db.php
```

## Technologies
- PHP
- HTML
- SQLite (for lab_6_6)
- Superglobals (`$_GET`, `$_POST`, `$_SESSION`, `$_COOKIE`)

## Notes
- Seeded user: `student@example.com` / password `password123` (password stored as hash in `schema.sql`).
- If PHP reports "could not find driver", enable `pdo_sqlite` or use the Python method to create `database.db` and upload it to your server.

---

Open `index.php` to navigate to lab files.
