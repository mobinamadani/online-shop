<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Index</title>
</head>
<body>
    <main>
        <h1>These are our products</h1>
        <hr>
        @foreach($products as $product)
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->cost }}</p>
        <p>{{ $product->count }}</p>
        <p>{{ $product->description }}</p>
        <hr>
        @endforeach
    </main>
</body>
</html>