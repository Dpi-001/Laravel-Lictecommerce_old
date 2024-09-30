@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-black">Create Banners</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('banner.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder="Enter Priority" name="priority" class="w-full rounded-lg my-2" value="{{old('priority')}}">
    @error('priority')
    <p class="text-red-500 -mt-2">{{$message}}</p>
@enderror
    <input type="text" placeholder="Enter Banners Name" name="name" class="w-full rounded-lg my-2" value="{{old('name')}}">
    @error('name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Description" class="w-full rounded-lg my-2">{{old('description')}}</textarea>
    @error('description')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

     <select name="status" id="" class="w-full rounded-lg my-2">
        <option value="Show">Show</option>
        <option value="Hide">Hide</option>
     </select>

    <input type="file" name="photopath" class="w-full rounded-lg my-2">
    @error('photopath')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Create Banner</button>
        <a href="{{route('banner.index')}}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
    </div>
</form>
@endsection
