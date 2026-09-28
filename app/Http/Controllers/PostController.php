<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // 1. INDEX: Menampilkan daftar post + Bonus Pencarian + Requirement 8 Pagination
    public function index(Request $request)
    {
        $search = $request->query('search');

        $posts = Post::when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                             ->orWhere('body', 'like', "%{$search}%")
                             ->orWhere('category', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('posts.index', compact('posts', 'search'));
    }

    // 2. CREATE: Menampilkan form tambah post
    public function create()
    {
        return view('posts.create');
    }

    // 3. STORE: Validasi + Upload Gambar + Simpan + Flash Message
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'body'     => 'required|string|min:10',
            'image'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    // 4. SHOW: Detail post dengan Route Model Binding (Requirement 8)
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 5. EDIT: Form edit post dengan Route Model Binding
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 6. UPDATE: Validasi + Update Gambar + Flash Message
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'body'     => 'required|string|min:10',
            'image'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    // 7. DESTROY: Hapus post (Soft Delete) + Flash Message
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Artikel dipindahkan ke Tong Sampah (Soft Delete)!');
    }

    // --- FITUR BONUS SOFT DELETE: TRASH, RESTORE, FORCE DELETE ---
    public function trash()
    {
        $posts = Post::onlyTrashed()->latest()->paginate(6);
        return view('posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('posts.trash')
            ->with('success', 'Artikel berhasil dipulihkan!');
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $post->forceDelete();

        return redirect()->route('posts.trash')
            ->with('success', 'Artikel dihapus secara permanen!');
    }
}