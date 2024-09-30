@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-black">Banner's</h1>
<hr class="h-1 bg-red-500">


<div class="text-right my-5">
    <a href="{{route('banner.create')}}" class="bg-blue-900 text-white px-5  py-3 rounded-lg">Add Banners</a>
</div>
<table class="w-full mt-5">
    <tr>
        <th class="border p-2 bg-gray-200">S.No</th>
        <th class="border p-2 bg-gray-200">Banner image</th>
        <th class="border p-2 bg-gray-200">Banner Titles</th>
        <th class="border p-2 bg-gray-200">Descriptions</th>
        <th class="border p-2 bg-gray-200">Status</th>
        <th class="border p-2 bg-gray-200">Actions</th>
    </tr>
    @foreach ($banners as $banner)
    <tr>
        {{-- //had to show 1...... --}}
        <td class="border p-2">{{$loop->iteration}}</td>
        <td class="border p-2">
            <img src="{{asset('images/bannerss/' . $banner->photopath) }}" alt="" class="w-16 h-16 mx-auto object-cover">
        </td>
        <td class="border p-2">{{$banner ->name }}</td>
        <td class="border p-2">{{$banner->description }}</td>
        <td class="border p-2">{{$banner ->status }}</td>
        <td class="border p-2">
            <a href="{{route('banner.edit',$banner->id)}}" class="bg-blue-900 text-white px-3 py-1 rounded">Edit</a>
            <a href="{{route('banner.destroy',$banner->id)}}" class="bg-red-600 text-white px-3 py-1 rounded onclick="return confirm(' Are you sure to Delete?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
