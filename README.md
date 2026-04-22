# 🎓 UTS Pemrograman Web 2 - Sistem Akademik Sederhana

<p align="center">
  <img src="screenshots/dashboard.png" width="100%" alt="Dashboard Sistem Akademik" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
</p>

## 📝 Profil Mahasiswa
* **Nama:** Rosyad
* **NIM:** 23552011176
* **Kelas:** TIF K 23 A
* **Mata Kuliah:** Pemrograman Web 2
* **Dosen Pengampu:** Ipan Saepul Milal, S.Kom.

---

## 💻 Tentang Proyek
Proyek ini dikerjakan sebagai syarat penilaian **Ujian Tengah Semester (UTS)**. Aplikasi ini merupakan sistem manajemen data akademik sederhana yang dibangun menggunakan framework **Laravel 12** dan **My Sql**.

### 🛠️ Fitur Utama:
* **Dashboard Akademik:** Menampilkan antarmuka utama yang bersih dan informatif.
* **Manajemen Data (CRUD):**
    * 📂 **Data Jurusan:** Tambah, Lihat, Edit, dan Hapus data Jurusan.
    * 👨‍🎓 **Data Mahasiswa:** Pengelolaan data mahasiswa yang terelasi dengan Jurusan.
    * 📚 **Data Matakuliah:** Pengelolaan daftar mata kuliah berdasarkan Jurusan.
* **Fitur Pencarian:** Search bar dinamis pada header untuk mencari data Mahasiswa.
* **Sistem Keamanan & UX:**
    * Modal Konfirmasi Bootstrap untuk aksi **Hapus Data**.
    * Modal Konfirmasi Bootstrap untuk aksi **Logout**.
    * UI Konsisten dengan tombol aksi yang seragam (Success/Green untuk simpan).

---

### 🗄️ Arsitektur Database (Eloquent Relationship)
Proyek ini mengimplementasikan konsep relasi antar tabel (One-to-Many) untuk integritas data:
* **One-to-Many (Jurusan & Mahasiswa):** Satu Jurusan dapat menampung banyak Mahasiswa.
* **One-to-Many (Jurusan & Matakuliah):** Satu Jurusan memiliki berbagai macam Mata Kuliah.
* **Belongs To:** Mahasiswa dan Matakuliah secara otomatis merujuk ke ID Jurusan yang bersangkutan.

---

### ⚙️ Teknologi yang Digunakan
* **Framework:** Laravel 12
* **Frontend:** Bootstrap 5.3 & Bootstrap Icons
* **Library:** Laravel Breeze (Starter Kit)
* **Database:** MySQL

---

<p align="center">
  <i>Dibuat dengan penuh ketelitian oleh Rosyad - 23552011176 - Universitas Teknologi Bandung</i>
</p>
