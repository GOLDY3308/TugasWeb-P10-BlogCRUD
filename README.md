Tugas Rutin 10 - Blog CRUD Laravel

Tugas mata kuliah Pemrograman Web Pertemuan 10 mengenai pembuatan aplikasi CRUD Blog menggunakan Laravel 12.

Identitas Mahasiswa:
- Nama: Farhan Zuhairi Harahap
- NIM: 4253550027
- Kelas: PSIK 25 B
- Dosen Pengampu: Adidtya Perdana, S.T., M.Kom

Daftar Pengerjaan Tugas

Bagian yang sudah dikerjakan sesuai instruksi Tugas Rutin 10:
1. Routing menggunakan `Route::resource('posts')` dan named routes di `routes/web.php`.
2. `PostController` dengan 7 method resource (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`).
3. Master layout Blade di `resources/views/layouts/app.blade.php` menggunakan `@extends` dan `@yield`.
4. Penggunaan 2 komponen Blade yaitu `Alert` dan `Card`.
5. Validasi form, menampilkan pesan error di tiap field (`@error`), serta `old()` input.
6. Flash message untuk notifikasi berhasil/gagal setelah aksi CRUD.
7. Proteksi `@csrf` di semua form serta method spoofing `@method('PUT')` dan `@method('DELETE')`.
8. Route Model Binding pada controller dan fitur pagination di halaman utama.

**Fitur Tambahan (Bonus):**
- Pencarian artikel berdasarkan judul, kategori, atau isi.
- Soft delete (tong sampah, restore data, dan hapus permanen).
- Upload gambar cover artikel ke storage public.

Cara Menjalankan Project

1. Clone repository ini ke dalam folder `laragon/www` atau `xampp/htdocs`.
2. Buka terminal di folder project lalu jalankan:
   ```bash
   composer install