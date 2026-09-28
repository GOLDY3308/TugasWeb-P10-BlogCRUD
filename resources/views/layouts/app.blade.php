<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog CRUD Laravel 12')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col">
    <nav class="bg-slate-800 border-b border-slate-700 px-6 py-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="font-bold text-xl text-red-500">BlogCRUD P10</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('posts.index') }}" class="text-slate-300 hover:text-white text-sm">Semua Post</a>
                <a href="{{ route('posts.trash') }}" class="text-slate-300 hover:text-white text-sm">🗑️ Tong Sampah</a>
                <a href="{{ route('posts.create') }}" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-semibold">+ Tulis Artikel</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-8 flex-1 w-full">
        {{-- Requirement 6: Flash Message Sukses / Gagal --}}
        @if (session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif

        @if ($errors->any())
            <x-alert type="danger">Terdapat kesalahan pada input form. Silakan periksa kembali!</x-alert>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-slate-800 text-center py-4 text-xs text-slate-500">
        Tugas Rutin 10 — Pemrograman Web FMIPA UNIMED
    </footer>
</body>
</html>