@extends('parts.app')

@section('content')
<div>
    <h1>Part Master Registry</h1>
    <a href="{{ route('parts.create') }}">Add New Part</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Make</th>
                <th>Unit Of Measurement</th>
                <th>Price</th>
                <th>HSN Code</th>
                <th>GST Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parts as $part)
            <tr>
                <td>{{ $part->part_number }}</td>
                <td>{{ $part->part_description }}</td>
                <td>{{ $part->make }}</td>
                <td>{{ $part->uom }}</td>
                <td>${{ number_format($part->price, 2) }}</td>
                <td>{{ $part->hsn_code }}</td>
                <td>${{ number_format($part->gst_rate, 2) }}</td>
                <td>
                    <a href="{{ route('parts.edit', $part->part_number) }}">Edit</a> | 
                    <form action="{{ route('parts.destroy', $part->part_number) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $parts->links() }}
</div>
@endsection
