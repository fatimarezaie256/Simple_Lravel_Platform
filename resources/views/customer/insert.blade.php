<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
    </style>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="h-screen w-full flex flex-col items-center justify-centers  ">
        @if($errors->count()>0)
        @foreach($errors->all() as $error)
        <div>
            <h1>{{$error}}</h1>
        </div>
        @endforeach
        @endif
        <h1 id="h1" class="text-3xl text-center text-blue-700 pb-10 font-bold">Create A cutomer Account</h1>
        <form action="{{URL('customer/create')}}" method="post"  class="form" enctype="multipart/form-data">
        @csrf    
        <input class="border py-2 w-full px-4 focus:outline-0 rounded-md" type="text" placeholder="Name" name="name">
            <input class="border py-2 w-full px-4 focus:outline-0 rounded-md" placeholder="lastName" type="text" name="lastName">
            <input class="border py-2 w-full px-4 focus:outline-0 rounded-md" placeholder="Email" type="email" name="email">
            <label for="" class="">Select profile picture<input class="border py-2 w-full px-4 focus:outline-0 rounded-md"  type="file" name="img_url"></label>
            <select name="gender" id="" class="border ">
                <option value="male">Male</option>
                <option value="female">female</option>
            </select>
            <button class="bg-blue-700 rounded-md py-2 px-4 block text-white">Save</button>
        </form>
    </div>
</body>
</html> 