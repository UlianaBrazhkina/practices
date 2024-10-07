<!-- resources/views/products.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <div class="product-cards">
        @foreach ($products as $product)
            <x-product-card :name="$product['name']" :cost="$product['cost']" :amount="$product['amount']" />
        @endforeach
    </div>
</body>
</html>
