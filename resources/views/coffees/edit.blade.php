@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Coffee: {{ $coffee->name }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('coffees.update', $coffee->coffeeId) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Coffee Name</label>
                <input type="text" name="name" value="{{ $coffee->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="size">Size</label>
                <input type="text" name="size" value="{{ $coffee->size }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price">Price ($)</label>
                <input type="number" name="price" value="{{ $coffee->price }}" step="0.01" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="stock">Stock</label>
                <input type="number" name="stock" value="{{ $coffee->stock }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Select Category --</option>
                    <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Ice</option>
                    <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Hot</option>
                    <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Cold Brew</option>
                    <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>Espresso</option>
                    <option value="5" {{ old('category_id') == 5 ? 'selected' : '' }}>Latte</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->categoryId }}"
                            {{ old('category_id') == $category->categoryId ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="supplier_id">Supplier</label>
                <select name="supplier_id" class="form-control" required>
                    <option value="">-- Select Supplier --</option>
                    <option value="1" {{ old('supplier_id') == 1 ? 'selected' : '' }}>Supplier 1</option>
                    <option value="2" {{ old('supplier_id') == 2 ? 'selected' : '' }}>Supplier 2</option>
                    <option value="3" {{ old('supplier_id') == 3 ? 'selected' : '' }}>Supplier 3</option>
                    <option value="4" {{ old('supplier_id') == 4 ? 'selected' : '' }}>Supplier 4</option>
                    <option value="5" {{ old('supplier_id') == 5 ? 'selected' : '' }}>Supplier 5</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->supplierId }}"
                            {{ old('supplier_id') == $supplier->supplierId ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Update Coffee</button>
        </form>
    </div>
@endsection
