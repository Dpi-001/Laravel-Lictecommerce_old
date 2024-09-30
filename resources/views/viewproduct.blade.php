@extends('layouts.master')
@section('content')
<div class="mt-5 grid grid-cols-4 gap-6 px-16">
    <div>
        <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="h-84 w-full object-cover rounded-lg">
    </div>
    <div class="cols-span-2 border-x px-4">
        <h2 class="font-bold text-4xl">{{$product->name}} </h2>
        <p class="text-blue-900 font-bold text-2xl">
            @if ($product->discounted_price!='')Rs.{{$product->discounted_price}}
            <span class="line-through font-thin text-sm text-red-600">Rs. {{$product->price}}</span>
            @else
            Rs. {{$product->price}}
            @endif
        </p>
        <form action="{{route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="flex mt-10">
            <button class="bg-gray-200 px-4 py-2 cursor-pointer" onclick="return dec()">-</button>
                   <input type="text" id="qty" class="w-10 text-center border-none bg-gray-100" value="1" readonly name="qty">
                   <button class="bg-gray-200 px-4 py-2 cursor-pointer" onclick="return inc()">+</button>
        </div>

        <p class="text-gray-400">In Stock: {{$product->stock}}</p>
        <div class="flex gap-5">
        <button class="bg-blue-900 text-white px-4 py-2 mt-5 rounded ">Buy now</button>
        <button class="bg-blue-900 text-white px-4 py-2 mt-5 rounded ">Add to Cart</button>
    </div>
</form>
</div>
    <div class="text-gray-500 px-2">
          <p class="mb-2">Delivery within 5 days</p>
          <p class="mb-2">7 days return policy</p>
          <p class="mb-2">Cash on delivery available</p>

    </div>
    </div>
    <div class="mt-10 px-16">
     <h2 class="font-bold text-2xl">About Products</h2>
     <p class="text-gray-500">{{$product->description}}</p>
    </div>
    <div class="px-16">
        <div class="border-l-4 border-blue-900 pl-2">
            <h1 class="text-2xl font-blod">Related Products</h1>

        </div>
        <div class="grid grid-cols-4 gap-10 px-16 mt-5">


        @foreach ($relatedproducts as $rproduct )

            <a href="{{route('viewproduct',$rproduct->id)}}">
                <div class="border rounded-lg bg-gray-100 hover:-translate-y-2 duration-300 shadow-lg">
                <img src="{{ asset('images/products/'.$rproduct->photopath) }}"  alt="" class="h-64 w-full object-cover rounded-t-lg">
                <div class="p-4">
                    <h1 class="text-lg font-bold">{{$rproduct->name}}</h1>

                    @if ($rproduct->discounted_price !='')

                <p class="text-blue-900 font-bold text-lg">{{$rproduct->discounted_price}}
                    <span class="line-through font-thin text-sm text-red-600">{{$rproduct->price}}</span>
                </p>
                @else
                <p class="text-blue-900 font-bold text-lg">{{$rproduct-price}}
                @endif
                </div>
                </div>
            </a>

            @endforeach
        </div>
        </div>

<script>
    function inc()
    {
        let qty=document.getElementById('qty');
        if(parseInt(qty.value)<{{$product->stock}})
        qty.value = parseInt(qty.value)+1;
    return false;
    }
    function dec()
    {
        let qty=document.getElementById('qty');
        if(parseInt(qty.value)>1)
        qty.value = parseInt(qty.value)-1;
        return false;
    }
</script>
@endsection
