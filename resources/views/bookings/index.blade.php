<h1>Data Booking Lapangan</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>User</th>
        <th>Lapangan</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Status</th>
    </tr>

    @foreach($bookings as $b)
    <tr>
        <td>{{ $b->user->name ?? '-' }}</td>
        <td>{{ $b->field->nama_lapangan ?? '-' }}</td>
        <td>{{ $b->tanggal }}</td>
        <td>{{ $b->jam_mulai }} - {{ $b->jam_selesai }}</td>
        <td>{{ $b->status }}</td>
    </tr>
    @endforeach
</table>