# Project Name: [E_NOTE]

Deskripsi singkat:  
API ini digunakan untuk [tujuan API, misal: aplikasi catatan, sistem login, pengelolaan data user, dll].  

---

## **Daftar Endpoint**

| Method | Endpoint           | Deskripsi                          | Body / Params                   |
|--------|------------------|-----------------------------------|--------------------------------|
| GET    | /users            | Mendapatkan semua user            | -                              |
| GET    | /users/{id}       | Mendapatkan detail user tertentu  | Path Param: id                 |
| POST   | /users            | Menambahkan user baru              | JSON Body: `{ "username": "", "password": "" }` |
| PUT    | /users/{id}       | Mengupdate user                    | Path Param: id, JSON Body      |
| DELETE | /users/{id}       | Menghapus user                     | Path Param: id                 |

---

## **Autentikasi**
- API ini menggunakan [misal: Bearer Token / API Key / JWT]  
- Contoh Header:


# Enote - Aplikasi Catatan Harian Industrial Engineering (IE) PYI

Enote adalah aplikasi berbasis web untuk membuat, melihat, mengedit, dan menghapus catatan harian kerja.  
Aplikasi ini dirancang khusus untuk Industrial Engineering (IE) di PT Pou Yuen Indonesia (PYI), membantu mencatat aktivitas harian, analisis efisiensi, dan quality control secara mudah.

//Aplikasi di gunakan untuk referensi kegiatan harian senior IE untuk mempermudah learning curve
1. Login menggunakan akun yang sudah terdaftar.  
2. Tambahkan, edit, atau hapus catatan kegiatan harian sesuai kebutuhan.  
3. Klik tombol **Logout** untuk keluar dari aplikasi.

---

## Catatan untuk Anggota Baru
- Pastikan **username dan password** diberikan oleh admin sebelum login.  
- Gunakan catatan ini sebagai referensi kegiatan harian senior IE untuk mempermudah learning curve.  
- Semua perubahan catatan tersimpan secara real-time di **Firebase Database**.

---

## Kontak / Bantuan
Jika mengalami kesulitan:
- Hubungi **Senior IE / Admin Project**
- Atau cek dokumentasi internal project terkait penggunaan Firebase dan PHP.

Aplikasi ini menggunakan:

- **PHP** untuk backend
- **Firebase Realtime Database** untuk penyimpanan data
- **Bootstrap 5** untuk tampilan responsif

---

## Fitur

- Menambahkan catatan harian dengan **judul, tanggal, dan isi catatan**.
- Melihat daftar catatan secara lengkap.
- Mengedit catatan yang sudah dibuat.
- Menghapus catatan.
- Tampilan rapi dan responsif menggunakan Bootstrap.

---

## Contoh Catatan Harian IE

### Catatan 1

**Judul:** Pemantauan Line Produksi Sepatu – Shift Pagi  
**Tanggal:** 23 November 2025  
**Isi:**

- Mengecek layout dan aliran material di Line 3.
- Memastikan operator mengikuti SOP.
- Mengukur waktu siklus produksi tiap workstation.
- Catatan: Line 3 butuh 2 operator tambahan di finishing, conveyor tray 2 perlu perbaikan minor.

---

# Project Name: Enote App

Aplikasi catatan berbasis web menggunakan **PHP**, **MySQL**, dan **Firebase**.  
Project ini memungkinkan user untuk **register, login**, dan **menyimpan catatan** baik secara lokal (MySQL) maupun realtime (Firebase).

---
//database MySQL
## **Fitur Utama**
- Register & login user
- CRUD (Create, Read, Update, Delete) catatan
- Menyimpan data catatan di MySQL
- Integrasi Firebase Realtime Database untuk sinkronisasi realtime
- Proteksi halaman berdasarkan session login

---

## **Teknologi**
- PHP 8.x
- MySQL / MariaDB
- Firebase Realtime Database
- Composer (untuk dependency Firebase PHP SDK)
- Bootstrap 5 (opsional untuk UI)

---

## **Database MySQL**
### Tabel `users`

```sql
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

[Firebase Project](https://notes-api-project-13c26-default-rtdb.asia-southeast1.firebasedatabase.app/)
