@extends('layouts.app')
@section('title', 'Edit Artikel')

@section('content')
<div class="max-w-2xl mx-auto bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Edit Artikel</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Judul Artikel</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white">
            @error('title') <small class="text-red-400">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <input type="text" name="category" value="{{ old('category', $post->category) }}"
                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white">
            @error('category') <small class="text-red-400">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Ganti Gambar (Biarkan kosong jika tidak diubah)</label>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-32 h-20 object-cover rounded mb-2">
            @endif
            <input type="file" name="image" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-sm text-slate-300">
            @error('image') <small class="text-red-400">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Isi Artikel</label>
            <textarea name="body" rows="6" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white">{{ old('body', $post->body) }}</textarea>
            @error('body') <small class="text-red-400">{{ $message }}</small> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('posts.show', $post) }}" class="bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-lg text-sm">Batal</a>
            <button type="submit" class="bg-amber-600 hover:bg-amber-500 px-5 py-2 rounded-lg text-sm font-semibold">Perbarui Artikel</button>
        </div>
    </form>
</div>
@endsection