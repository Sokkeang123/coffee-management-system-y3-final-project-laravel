@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Coffee List</h2>
        <a href="{{ route('coffees.create') }}" class="btn btn-primary mb-3">Add New Coffee</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coffees as $coffee)
                    <tr>
                        <td>{{ $coffee->name }}</td>
                        <td>{{ $coffee->size }}</td>
                        <td>${{ $coffee->price }}</td>
                        <td>{{ $coffee->stock }}</td>
                        <td>
                            @if ($coffee->category)
                                {{ $coffee->category->name }} (ID: {{ $coffee->category_id }})
                            @else
                                N/A (ID: {{ $coffee->category_id }})
                            @endif
                        </td>
                        <td>
                            @if ($coffee->supplier)
                                {{ $coffee->supplier->name }} (ID: {{ $coffee->supplier_id }})
                            @else
                                N/A (ID: {{ $coffee->supplier_id }})
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('coffees.edit', $coffee->coffeeId) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('coffees.destroy', $coffee->coffeeId) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
