# 🎓 UTS Pemrograman Web 2 - Sistem Informasi Akademik

<p align="center">
  <img src="https://github.com/Chads90/uts-akademik/blob/main/dashboard.png?raw=true" width="100%" alt="Dashboard Sistem Akademik">
</p>

## 📝 Keterangan Proyek
Proyek ini dikerjakan oleh **Rosyad** sebagai syarat penilaian UTS Mata Kuliah Pemrograman Web 2. Aplikasi ini mengelola data akademik dasar dengan fitur CRUD (Create, Read, Update, Delete) yang dinamis.

### 🛠️ Fitur yang Terselesaikan:
* **Manajemen Data:** CRUD Jurusan, Mahasiswa, dan Matakuliah.
* **Relasi Database:** Implementasi *Eloquent Relationship* (One-to-Many).
* **UI/UX:** Desain responsif menggunakan Bootstrap 5 dengan penyesuaian navigasi yang konsisten.
* **Fitur Tambahan:** Search Bar Mahasiswa di header dan Modal Konfirmasi (Logout & Hapus).

### 🗄️ Struktur Relasi Tabel
* **Jurusan** memiliki banyak **Mahasiswa**.
* **Jurusan** memiliki banyak **Matakuliah**.
* **Mahasiswa** & **Matakuliah** terhubung secara otomatis ke data **Jurusan**.
