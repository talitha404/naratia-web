## 📚 Naratia

**“Kenapa kamu selalu jadi penonton di cerita orang lain?”**

**“Bagaimana kalau kamu bukan cuma pembaca… tapi bagian dari cerita?”**

Di Naratia, karakter utama adalah kamu.

Setiap dialog terasa lebih dekat.
Setiap konflik terasa lebih nyata.

Karena cerita terbaik…
adalah cerita di mana kamu ada di dalamnya.

✨ Masuk ke ceritamu sendiri.


---

## 📑Deskripsi

Naratia adalah platform digital untuk menulis dan membaca cerita berbasis web.

Yang membuat Naratia berbeda adalah fitur self insert, yaitu kemampuan untuk *menyesuaikan nama karakter utama* dalam cerita menjadi nama pembaca. Dengan begitu, cerita terasa lebih personal karena pembaca seolah menjadi bagian langsung dari alur yang dibaca.

---

## 🚀 Fitur yang Berhasil Dikembangkan

* 🔐 Autentikasi (Register & Login)
* 👤 Manajemen Profil Pengguna
* ✍️ CRUD Cerita (Create, Read, Update, Delete)
* 🔥 Fitur Self-Insert
* 📊 Chart Analitik
* 📄 Report Excel

---

## 🛠️ Teknologi yang Digunakan

* **Laravel** (PHP Framework)
* **MySQL** (Database)

---

## 📂 Struktur Project (Simplified)

```
app
├── Http
│   ├── Controllers
│   │   ├── AuthController.php
│   │   ├── ChapterController.php
│   │   ├── Controller.php
│   │   ├── DashboardController.php
│   │   ├── LandingController.php
│   │   ├── LibraryController.php
│   │   ├── PreviewController.php
│   │   ├── ProfilController.php
│   │   ├── SearchController.php
│   │   ├── StatisticsController.php
│   │   ├── WebController.php
│   │   └── WriteController.php
│   └── Middleware
│       └── CheckLogin.php
└── Models
    ├── Chapter.php
    ├── Genre.php
    ├── Library.php
    ├── Story.php
    ├── StoryView.php
    └── User.php

routes
├── console.php
└── web.php

```

---

# ✅ Alur Lengkap Setup Naratia (via XAMPP)

## 🧩 1. Siapkan XAMPP

* Nyalakan:

  * ✅ Apache
  * ✅ MySQL

* Buka:

  ```
  http://localhost/phpmyadmin
  ```

---

## 🗄️ 2. Buat Database Kosong

Di phpMyAdmin:

* Klik **New**
* Nama database:

  ```
  db_naratia
  ```
* Klik **Create**

❗ Jangan buat tabel manual — Laravel yang akan isi

---

## 📥 3. Clone Repository

```bash
git clone https://github.com/talitha404/naratia-web.git
cd naratia-web
```

---

## 📦 4. Install Dependency

```bash
composer install
npm install tailwindcss @tailwindcss/vite
```

---

## ⚙️ 5. Setup Environment (INI PENTING ⚠️)

```bash
cp .env.example .env
php artisan key:generate
```

---

## 🛠️ 6. Konfigurasi Database

Buka `.env`, ubah:

```env
DB_DATABASE=db_naratia
DB_USERNAME=root
DB_PASSWORD=
```

(XAMPP default biasanya kosong passwordnya)

---

## 🧱 7. Migrasi Database

```bash
php artisan migrate
```

---

## 🚀 8. Jalankan Server

```bash
php artisan serve
npm run dev
```

Akan muncul:

```
http://127.0.0.1:8000
```

---

## 👥 Tim Pengembang
Aplikasi ini dikembangkan oleh kelompok mahasiswa dengan pembagian tugas sebagai berikut:

| Nama Lengkap | NPM |

| :--- | :--- |

| **An Nisa' Fatmawati** | 24082010053 |

| **Talitha Nabila Candra** | 24082010061 |

| **Rindi Antika Qumalasari** | 24082010064 | 

---


## 📌 Catatan Pengembangan

* Belum ada