<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2em;
        }

        div {
            margin-bottom: 1em;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 300px;
            padding: 5px;
        }

        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <h1>Tambah Mahasiswa Baru</h1>
    @if ($errors->any())
        <div style="color: red;">
            <strong>Whoops! Ada masalah dengan input anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf <div>
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ old('nama') }}">
        </div>
        <div>
            <label>NIM:</label>
            <input type="text" name="nim" value="{{ old('nim') }}">
        </div>
        <div>
            <label>Jurusan:</label>
            <input type="text" name="jurusan" value="{{ old('jurusan') }}">
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>