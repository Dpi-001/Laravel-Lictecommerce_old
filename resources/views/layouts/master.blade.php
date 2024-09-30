<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LICT Ecommerce</title>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="shortcut icon" href="{{asset('images/lictlogo.png')}}" type="image/x-icon">
      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.alert')
<div class="flex justify-between items-centre px-16 py-2 bg-blue-900 text-white">
    <p>
        <i class="ri-facebook-box-fill"></i>
        <i class="ri-instagram-fill"></i>
        <i class="ri-twitter-fill"></i>
    </p>
    <p><i class="ri-customer-service-2-line">
        </i>: 111111111</p>
</div>
<nav class="shadow bg-white px-16 py-4 flex justify-between items-center mb-10 sticky top-0 z-40">
    <img src="{{asset('images/lictlogo.png')}}" alt="" class="h-16">


    <form action="">
        <input type="search" class="border border-gray-300 rounded-lg px-3 py-2" placeholder="Search" name="search">
        <button type="submit" class="bg-blue-900 text-white rounded-lg px-4 py-2">Search</button>
    </form>


    <div class="flex gap-4">
        <a href="{{route('home')}}" class="hover:text-blue-900">Home</a>
        @php
            $categories = App\Models\Category::orderBy('priority')->get();
        @endphp
        @foreach ( $categories as $category )
{{-- //dashboard wala --}}

        <a href="{{route('categoryproduct' ,$category->id)}}" class="hover:text-blue-900">{{$category->name}}</a>

        @endforeach
        {{-- //forlogin wala --}}
        @auth
            <div class="group relative">
                <i class="ri-admin-fill text-xl bg-gray-200 p-2 rounded-full cursor-pointer"></i>
                <div class="absolute hidden  group-hover:block top-8 -right-11 lbg-white shadow w-32 rounded-md border">
                    <a href="{{route('mycart')}}" class="block py-2 hover:bg-gray-200 p-4 rounded-lg">My Cart</a>
                    <a href="" class="block py-2 hover:bg-gray-200 p-4 rounded-lg">My Orders</a>
                    <a href="" class="block py-2 hover:bg-gray-200 p-4 rounded-lg">My Profile</a>


                   <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="block py-2 hover:bg-gray-200 p-4 rounded-md w-full text-left">LogOut
                    </button>
                   </form>
                </div>

            </div>
        @else
        <a href="{{route('login')}}" class="hover:text-blue-900">Login</a>
     @endauth

    </div>

</nav>
@yield('content')
<footer class="bg-blue-900 text-white px-16 py-4 mt-10">
    <div class="grid grid-cols-3 gap-4">
        <div>
            <h1 class="text-2xl">LictEcommerce</h1>
            <p>
                LictEcommerce is an innovative online platform designed to simplify the buying and selling process for users. With a user-friendly interface, the site offers a seamless shopping experience, allowing customers to browse a wide range of products, make secure purchases, and manage their accounts effortlessly.
            </p>
        </div>

        <div>
            <h1 class="text-2xl">Quick Links</h1>
            <ul>
                <li><i class="ri-home-smile-line"></i>Home</li>
                <li><i class="ri-ram-fill"></i>Electronics</li>
                <li><i class="ri-product-hunt-line"></i>Groceries</li>
                <li><i class="ri-handbag-fill"></i>Fashion</li>
                <li><i class="ri-device-line"></i>Accessories</li>
            </ul>

        </div>
        <div>
            <h1 class="text-2xl">Contact Us</h1>
            <p><i class="ri-crosshair-line"></i>Address: 9800 Fredericksburg Road, San Antonio, TX .</p>
            <p><i class="ri-smartphone-fill"></i>Phone: 9877374563</p>
            <p><i class="ri-mail-fill"></i>Email: info@info.com</p>
        </div>
    </div>

</footer>
{{-- Homepage design --}}
</body>
</html>
