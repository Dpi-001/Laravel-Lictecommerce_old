@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-black">Edit Details</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('banner.update', $banner->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Required for updating -->

    <!-- Dropdown to select banner -->
    <select name="banner_id" id="" class="w-full rounded-lg my-2">
        @foreach ($banners as $b)
            <option value="{{ $b->id }}" @if ($banner->banner_id == $b->id) selected @endif>
                {{ $b->name }}
            </option>
        @endforeach
    </select>

    <!-- Banner Title -->
    <input type="text" placeholder="Enter Banner Titles" name="name" class="w-full rounded-lg my-2" value="{{ $details->name }}">
    @error('name')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <!-- Description -->
    <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Description" class="w-full rounded-lg my-2">{{ $details->description }}</textarea>
    @error('description')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <!-- Status -->
    <select name="status" id="" class="w-full rounded-lg my-2">
        <option value="Show" @if ($banner->status == 'Show') selected @endif>Show</option>
        <option value="Hide" @if ($banner->status == 'Hide') selected @endif>Hide</option>
    </select>

    <!-- Photo Upload -->
    <input type="file" name="photopath" class="w-full rounded-lg my-2">
    @error('photopath')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <!-- Current Picture Display -->
    <p>Current Picture:</p>
    <img src="{{ asset('images/bannerss/' . $banner->photopath) }}" alt="Current Banner Image" class="w-44">

    <!-- Submit and Cancel buttons -->
    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Banner</button>
        <a href="{{ route('banner.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
    </div>
</form>
@endsection
