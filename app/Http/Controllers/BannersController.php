<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    // Show all Banners details
    public function index()
    {
       $banners= Banners::all(); // Fetch all banners from the model
        return view('banner.index', compact('banners'));
    }


    // Show create form with banners
    public function create()
{
    $banners = Banners::all(); // Fetch all banners
    return view('banner.create', compact('banners'));
}


    // Validate and store new product
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'photopath' => 'required|image',
        ]);

        // Store picture
        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/bannerss'), $photoname);
        $data['photopath'] = $photoname;

        Banners::create($data); // Create a new details record
        return redirect()->route('banner.index')->with('success', 'Banners Inserted Successfully');
    }

    // Show edit form with product details and banners
    public function edit($id)
    {
        $banners = Banners::all(); // Collection for dropdown
        $banner = Banners::findOrFail($id); // The banner being edited
        $details = $banner; // If you're using a $details variable

        return view('banner.edit', compact('banners', 'banner', 'details'));
    }



    // Update details
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',// Ensure this matches with your create method
            'description' => 'required',
            'status' => 'required',
            'photopath' => 'nullable|image',
        ]);

       $banners= Banners::findOrFail($id); // Retrieve details by id
        $data['photopath'] = $banners->photopath; // Keep the existing photo path

        if ($request->hasFile('photopath')) {
            // Store new picture
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/bannerss'), $photoname);
            $data['photopath'] = $photoname;

            // Delete old photo
            $oldphoto = public_path('images/bannerss/' . $banners->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
        }

        $banners->update($data); // Update the details
        return redirect()->route('banner.index')->with('success', 'Banners Updated Successfully');
    }

    // Delete details
    public function destroy($id)
    {
        // Retrieve the banner by its ID
        $banners = Banners::findOrFail($id); // Make sure the model name is singular (Banner)

        // Delete the associated photo if it exists
        $photoPath = public_path('images/bannerss/' . $banners->photopath);
        if (file_exists($photoPath)) {
            unlink($photoPath); // Delete the photo
        }

        // Delete the banner record from the database
        $banners->delete();

        return redirect()->route('banner.index')->with('success', 'Banner Deleted Successfully');
    }
}

