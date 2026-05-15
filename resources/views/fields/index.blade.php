<h1>Data Lapangan</h1>

<a href="{{ route('fields.create') }}">+ Tambah Lapangan</a>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    @foreach($fields as $field)
    <tr>
        <td>{{ $field->nama_lapangan }}</td>
        <td>{{ $field->harga }}</td>
        <td>
            <a href="{{ route('fields.edit', $field->id) }}">Edit</a>

            <form action="{{ route('fields.destroy', $field->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>