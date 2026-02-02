<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       @vite(['resources/css/app.css','resources/js/app.js'])
       <style>
        .h1{
            color:blue;
            text-align:center;
            font-size:28px;
            font-weight:bold;
            width: fit-content;
            margin-bottom:20px;
        }
        .div{
            height: 100vh;
            width: 100%;
            /* background-color:gainsboro; */
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        .form{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            padding: 10px 60px;
            gap:10px;
            border:1px solid gray;
            border-radius:4px;
            background-color:white;
        }
        .btn{
            background-color:blue;
            color:white; 
            padding: 10px 16px;
            border-radius:3px;
            width: 100%;
            font-weight:bold;
            font-size:18px;
            margin-bottom:20px;
        }
        #input{
            margin: 5px;
            width: 100%;
            border-radius:4px;
        }
       </style>
</head>
<body>
    <div class="div">
        <form action="{{URL('products/insert')}}" class="form" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <h1 class="h1">Add a new product</h1>
            <input class="border py-2 px-4" id="input" type="text" placeholder="Product Name" name="name">
            <input class="border py-2 px-4" id="input" type="number" placeholder="Product Price" name="price">
            <input class="border py-2 px-4" id="input" type="number" name="quantity" placeholder="quantity">
            <input class="border py-2 px-4" id="input" type="text" name="madein" placeholder="ex:Afghanistan,Iran">
            <input class="border py-2 px-4" id="input" type="file" accept="image/*" name="photo">
            <textarea  class="border py-2 px-4" id="input" name="desc" id="" placeholder="description"></textarea>
          <button type="submit" class="btn">Save</button>
        </form>
    </div>
</body>
</html>