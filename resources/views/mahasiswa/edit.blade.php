<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Mahasiswa</title>
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
            background-color: #ffc107;
            color: black;
            border: none;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <h1>Edit Data Mahasiswa</h1>
    @if ($errors->eny())
        <div style="color: red;">
            <strong>Whoops! Ada Masalah dengan input anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf @method('PUT') <div>
            <label for="">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
        </div>
        <div>
            <label for="">NIM:</label>
            <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
        </div>
        <div>
            <label for="">Jurusan:</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
        </div>
        <div>
            <label for="">Nama:</label>
            <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}">
        </div>
        <button type="submit">update Data</button>
    </form>
</body>

</html>