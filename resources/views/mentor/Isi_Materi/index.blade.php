@extends('layouts.app')

@section('content')

<h2>Daftar Isi Materi</h2>

<a href="{{ route('mentor.isi-materi.create') }}">
    <button>Tambah Isi Materi</button>
</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Materi</th>
        <th>Judul Isi</th>
        <th>Tipe</th>
        <th>Konten</th>
        <th>Aksi</th>
    </tr>

    @foreach($isi as $i)
    <tr>
        <td>{{ $i->materi->judul_materi }}</td>
        <td>{{ $i->judul }}</td>
        <td>{{ $i->tipe }}</td>

        <td>
            @if($i->tipe == 'text')
                {{ Str::limit($i->konten, 80) }}

            @elseif($i->tipe == 'video')
                <iframe width="250" height="150"
                    src="{{ $i->konten }}"
                    frameborder="0"
                    allowfullscreen>
                </iframe>

            @elseif($i->tipe == 'file')
                <a href="{{ asset('storage/'.$i->file_path) }}" target="_blank">
                {{ basename($i->file_path) }}
            </a>
            @endif
        </td>

        <td>
            <a href="{{ route('mentor.isi-materi.edit', $i->id) }}">Edit</a>

            <form action="{{ route('mentor.isi-materi.destroy', $i->id) }}"
                  method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit"
                    onclick="return confirm('Yakin ingin menghapus?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
