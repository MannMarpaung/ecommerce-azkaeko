<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>PRODUCT INDEX</h1>
    <form id="filterForm" action="{{ route('product.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">

        <select name="sort" onchange="document.getElementById('filterForm').submit()">
            <option value="">Urutkan</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Termurah</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Termahal</option>
            <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>Rating Tertinggi
            </option>
        </select>
    </form>
    <table>
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>Rating</td>
            <td>Action</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->rating }}</td>
                <td>
                    <form action="{{ route('cart.store', $product->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit">Add to Cart</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
