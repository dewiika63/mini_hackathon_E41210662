<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //memberikan validasi sesuai yang kita tentukan
        $this->validate($request, [
            'nama' => 'required|string|max:50',
            'jenis_saham' => 'required|string|max:100',
            'harga' => 'required|string|max:13',
            'keterangan' => 'required|string|max:100'
        ]);

        //digunakan untuk melakukan insert data ke dalam databse
        $post = Post::create([
            'nama' => $request->nama,
            'jenis_saham' => $request->jenis_saham,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan
        ]);


        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Data Berhasil Di Tambah' //notifikasi saat berhasil menambah data 
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Di Tambah' //notifikasi saat gagal menambah data 
                ]);
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        //memberikan validasi sesuai yang kita tentukan
        $this->validate($request, [
            'nama' => 'required|string|max:50',
            'jenis_saham' => 'required|string|max:50',
            'harga' => 'required|string|max:13',
            'keterangan' => 'required|string|max:100'
        ]);

        $post = Post::findOrFail($id);

        //digunakan untuk melakukan edit
        $post->update([
            'nama' => $request->nama,
            'jenis_saham' => $request->jenis_saham,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Data Berhasil Di Edit' //notifikasi saat berhasil edit data
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Di Edit' //notifikasi saat gagal edit data
                ]);
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Data Berhasil Di Hapus' //notifikasi saat berhasil hapus data
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Data Gagal Di HApus' //notifikasi saat gagal hapus data
                ]);
        }
    }
}
