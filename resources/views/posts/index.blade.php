@extends('layouts.app')
@section('title', 'Daftar Artikel')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <h1 class="text-2xl font-bold">Daftar Artikel Blog</h1>

    {{-- Bonus: Form Pencarian --}}
    <form action="{{ route('posts.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul/kategori..."
               class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-red-500 w-full md:w-64">
        <button type="submit" class="bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-lg text-sm font-medium">Cari</button>
        @if ($search)
            <a href="{{ route('posts.index') }}" class="bg-red-600/30 text-red-300 px-3 py-2 rounded-lg text-sm">Reset</a>
        @endif
    </form>
</div>

@if ($posts->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <x-card :post="$post" />
        @endforeach
    </div>

    {{-- Requirement 8: Pagination --}}
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
@else
    <div class="bg-slate-800 border border-slate-700 rounded-xl p-12 text-center text-slate-400">
        Belum ada artikel yang ditemukan.
    </div>
@endif
@endsection