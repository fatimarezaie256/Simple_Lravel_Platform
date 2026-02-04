<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>

    <style>
        body {
            font-family: Arial;
            background: black;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            justify-content:center;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow:2px 2px gainsboro;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
               font-weight:bold;
        }

        .card-body h3 {
            margin: 0 0 10px;
            font-size: 20px;
            font-weight:bold;
            color: #333;
        }

        .card-body p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
               font-weight:bold;
        }

        .price {
            color: #2e7d32;
            font-weight: bold;
            font-size: 16px;
               font-weight:bold;
        }

        .badge {
            display: inline-block;
            background: gray;
               font-weight:bold;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-top: 8px;
        }
        .h1{
   color:white;
        }
    </style>
</head>
<body>

<h1 class="h1">All Products</h1>
<!-- <div style="box-shadow:2px 2px 2px 2px gray;height:150px;width:fit-content;padding:6px 10px;border-radius:4px;margin-right:0px;">
    <h2 style="font-size:20px;">Users Informations</h2>
    <h2>
        @if(Auth::user())
        <label for="" style="padding:19px;font-size:16px;">User Name:{{Auth::user()->name}}</label><br>
        <label for="" style="font-size:16px;">Email:{{Auth::user()->email}}</label>
        @endif
    </h2>
</div>    -->
<div class="product-container" style="">
    @foreach($products as $product)
        @foreach($product->product_details as $productDtl)
            <div class="card">
                <img src="/storage/{{ $productDtl->img_url }}">

                <div class="card-body">
                    <h3>{{ $product->name }}</h3>

                    <p class="price"> {{ $productDtl->price }} Afg</p>
                    <p>Quantity: {{ $productDtl->quantity }}</p>
                    <p>{{ $productDtl->description }}</p>

                    <span class="badge">
                        Made in {{ $productDtl->madeIn }}
                    </span>
                </div>
               <form action="{{URL('cart/add',[$product->id,$productDtl->price])}}" method="post">
                @csrf
                <button>
                    Add to cart
                </button>
               </form>
            </div>
        @endforeach
    @endforeach
</div>
</div>
</body>
</html>
