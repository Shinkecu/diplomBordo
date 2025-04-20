<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Master;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::with(['master', 'service'])->get();
        $masters = Master::all();
        $services = Service::all();

        return view('admin.images.index', compact('images', 'masters', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'name' => 'required|string|max:255',
            'master_id' => 'nullable|exists:masters,id',
            'service_id' => 'nullable|exists:services,id',
            'description' => 'nullable|string'
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'path' => $path,
            'name' => $request->name,
            'master_id' => $request->master_id,
            'service_id' => $request->service_id,
            'description' => $request->description
        ]);

        return redirect()->route('images.index')->with('success', 'Изображение успешно загружено');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return redirect()->route('images.index')->with('success', 'Изображение удалено');
    }
}
