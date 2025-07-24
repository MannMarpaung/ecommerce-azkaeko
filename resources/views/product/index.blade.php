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

    <table>
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>Action</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
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
