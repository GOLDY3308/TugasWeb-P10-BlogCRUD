@extends('layouts.app')
@section('title', 'Tong Sampah (Soft Delete)')

@section('content')
<h1 class="text-2xl font-bold mb-6">🗑️ Tong Sampah (Soft Deleted Posts)</h1>

@if ($posts->count())
    <div class="space-y-4">
        @foreach ($posts as $post)
            <div class="bg-slate-800 border border-slate-700 rounded-xl p-5 flex justify-between items-center">
                <div>
                    <h2 class="font-bold text-lg">{{ $post->title }}</h2>
                    <p class="text-xs text-slate-400">Dihapus pada: {{ $post->deleted_at->format('d M Y, H:i') }}</p>
                </div>
                <div class="flex gap-2">
                    <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 px-3 py-1.5 rounded text-xs font-medium">Pulihkan</button>
                    </form>
                    <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" onsubmit="return confirm('Hapus permanen? Data tidak bisa kembali!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-500 px-3 py-1.5 rounded text-xs font-medium">Hapus Permanen</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-slate-800 border border-slate-700 rounded-xl p-12 text-center text-slate-400">
        Tong sampah kosong.
    </div>
@endif
@endsection