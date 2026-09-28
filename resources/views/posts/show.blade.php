@extends('layouts.app')
@section('title', $post->title)

@section('content')
<div class="max-w-3xl mx-auto bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-lg">
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-72 object-cover">
    @endif

    <div class="p-8">
        <span class="bg-red-500/20 text-red-400 text-xs font-semibold px-3 py-1 rounded-full">{{ $post->category }}</span>
        <h1 class="text-3xl font-bold mt-3">{{ $post->title }}</h1>
        <p class="text-xs text-slate-400 mt-1">Dibuat: {{ $post->created_at->format('d M Y, H:i') }}</p>

        <div class="mt-6 text-slate-200 leading-relaxed whitespace-pre-line">
            {{ $post->body }}
        </div>

        <div class="mt-8 pt-6 border-t border-slate-700 flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="text-sm text-slate-400 hover:text-white">← Kembali ke Daftar</a>
            <div class="flex gap-2">
                <a href="{{ route('posts.edit', $post) }}" class="bg-amber-600 hover:bg-amber-500 px-4 py-2 rounded-lg text-sm font-medium">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded-lg text-sm font-medium">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection