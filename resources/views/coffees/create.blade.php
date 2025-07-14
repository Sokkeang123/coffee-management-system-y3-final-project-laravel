@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Coffee</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('coffees.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name">Coffee Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="size">Size</label>
                <input type="text" name="size" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price">Price ($)</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Select Category --</option>

                    <!-- Fixed categories if needed -->
                    <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Ice</option>
                    <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Hot</option>
                    <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Cold Brew</option>
                    <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>Espresso</option>
                    <option value="5" {{ old('category_id') == 5 ? 'selected' : '' }}>Latte</option>
                    <option value="6" {{ old('category_id') == 6 ? 'selected' : '' }}>Mocha</option>
                    <option value="7" {{ old('category_id') == 7 ? 'selected' : '' }}>Iced Coffee</option>
                    <option value="8" {{ old('category_id') == 8 ? 'selected' : '' }}>Arabica</option>

                    <!-- Dynamic categories -->
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

                    <!-- Fixed suppliers if needed -->
                    <option value="1" {{ old('supplier_id') == 1 ? 'selected' : '' }}>Kampong Speu</option>
                    <option value="2" {{ old('supplier_id') == 2 ? 'selected' : '' }}>Stung Treng</option>
                    <option value="3" {{ old('supplier_id') == 3 ? 'selected' : '' }}>Kampot</option>
                    <option value="4" {{ old('supplier_id') == 4 ? 'selected' : '' }}>Mondulkiri</option>
                    <option value="5" {{ old('supplier_id') == 5 ? 'selected' : '' }}>Ratanakiri</option>

                    <!-- Dynamic suppliers -->
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->supplierId }}"
                            {{ old('supplier_id') == $supplier->supplierId ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <button class="btn btn-success">Create Coffee</button>
        </form>
    </div>
@endsection
