<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CART INDEX</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @foreach ($carts as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }}</td>
                <td><button>Order Now</button></td>
            </tr>
        @endforeach
    </table>
</body>
</html>