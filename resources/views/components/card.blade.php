@props(['post'])

<div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-md flex flex-col justify-between">
    <div>
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-slate-700 flex items-center justify-center text-slate-400 text-sm">
                Tidak ada gambar
            </div>
        @endif

        <div class="p-5">
            <span class="bg-red-500/20 text-red-400 text-xs font-semibold px-2.5 py-1 rounded-full">
                {{ $post->category }}
            </span>
            <h2 class="text-xl font-bold mt-3 text-white line-clamp-1">{{ $post->title }}</h2>
            <p class="text-slate-400 text-sm mt-2 line-clamp-3">{{ $post->body }}</p>
        </div>
    </div>

    <div class="px-5 py-3 bg-slate-900/60 border-t border-slate-700 flex justify-between items-center">
        <a href="{{ route('posts.show', $post) }}" class="text-sm text-blue-400 hover:underline font-medium">Baca Selengkapnya →</a>
        <div class="flex gap-2">
            <a href="{{ route('posts.edit', $post) }}" class="text-xs bg-amber-600 hover:bg-amber-500 text-white px-2.5 py-1 rounded">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Pindahkan artikel ini ke tong sampah?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs bg-red-600 hover:bg-red-500 text-white px-2.5 py-1 rounded">Hapus</button>
            </form>
        </div>
    </div>
</div>