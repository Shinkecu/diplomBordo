<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Master;
use App\Models\Image;
use App\Models\Category;
use App\Models\Service;
use App\Models\Review;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function master($master_id)
    {
        $master = Master::findOrFail($master_id);
        $images = Image::where('master-id', $master->id)->get();

        return view('master',compact('master', 'images'));
    }
    public function home()
    {
        $masters = Master::all();
        $categories = Category::all();
        $reviews = Review::all();
        return view('home', compact('masters', 'categories', 'reviews'));
    }


    public function indexMaster($master_id){
    $master = Master::with('services.category')->findOrFail($master_id);
    $images = Image::where('master_id', $master->id)->get();

    return view('master', compact('master', 'images'));
    }
    public function editMasters()
    {
        $masters = Master::all();
        return view('admin.editMasters', compact('masters'));
    }

    public function updateMaster(Request $request, $master_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'position' => 'required|string|max:255',
            'experience' => 'required|integer',
            'education' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048', // если вы хотите загружать изображение
        ]);

        $master = Master::findOrFail($master_id);
        $master->name = $request->name;
        $master->phone = $request->phone;
        $master->position = $request->position;
        $master->experience = $request->experience;
        $master->education = $request->education;

        // Обработка загрузки изображения
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $master->image = $path;
        }

        $master->save();

        return redirect()->route('home')->with('success', 'Мастер успешно обновлен!');
    }

    public function storeMaster(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'position' => 'required|string|max:255',
            'experience' => 'required|integer',
            'education' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $master = new Master();
        $master->name = $request->name;
        $master->phone = $request->phone;
        $master->position = $request->position;
        $master->experience = $request->experience;
        $master->education = $request->education;

        // Обработка загрузки изображения
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img');
            $master->image = $path;
        }

        $master->save();

        return redirect()->route('home')->with('success', 'Мастер успешно добавлен!');
    }
    public function destroyMaster($master_id)
    {
        $master = Master::findOrFail($master_id);
        $master->delete();

        return redirect()->route('home')->with('success', 'Мастер успешно удален!');
    }
}
