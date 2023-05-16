<!DOCTYPE html>
<html lang="en">
<div class="container">
    <!-- Untuk membuat tampilan judulnya -->
    <div class="row" style="margin:10px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Investasi Saham By Dewi Ika</h3>
                    <!-- Batas utnuk tampilan judul -->

                    <!-- Untuk membuat nama content saat membuka halaman ini -->
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                            <title>Saham Dewiika</title>
                                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                    </head>
                    <!-- Batas untuk membuat nama content saat membuka halaman ini -->

                    <body>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- Untuk membuat notifikasi -->
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    @if (session('error'))
                                    <div class="alert alert-error">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <!-- Batas untuk membuat notifikasi -->

                                    <!-- Membuat nama di tampilan -->
                                    <div class="card border-0 shadow rounded">
                                        <div class="card-body">
                                            <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah Data</a>
                                            <table class="table table-bordered mt-1">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Jenis Saham</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <!-- Untuk menampilkan data sesuai dengan nama di database -->
                                                @forelse ($posts as $post)
                                                    <tr>
                                                        <td>{{ $post->nama }}</td>
                                                        <td>{{ $post->jenis_saham }}</td>
                                                        <td>{{ $post->harga }}</td>
                                                        <td>{{ $post->keterangan }}</td>
                                                        <td class="text-center">
                                                            <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data Ini ?');"action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                                <a href="{{ route('post.edit', $post->id) }}"class="btn btn-sm btn-primary">EDIT</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <!-- Tampilan jika belom ada data yang dimasukan -->
                                                @empty
                                                <tr>
                                                    <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                                                </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
</html>