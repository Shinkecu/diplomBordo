<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasterController extends Controller
{
    // Отображение списка мастеров
    public function index()
    {
        $masters = Master::all();
        return view('admin.masters.index', compact('masters'));
    }

    // Форма создания мастера
    public function create()
    {
        $categories = Category::with('services')->get();
        return view('admin.masters.create', compact('categories'));
    }

    // Сохранение нового мастера
    public function store(Request $request)
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

        if ($request->hasFile('image')) {
            $master->image = $request->file('image')->store('images', 'public'); // Сохраняем публичный URL
        }

        $master->save();

        return redirect()->route('masters.index')->with('success', 'Мастер успешно добавлен!');
    }

    // Форма редактирования мастера
    public function edit($master_id)
    {
        $master = Master::findOrFail($master_id);
        $categories = Category::with('services')->get();
        return view('admin.masters.edit', compact('master', 'categories'));
    }

    // Обновление мастера
    public function update(Request $request, $master_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'position' => 'required|string|max:255',
            'experience' => 'required|integer',
            'education' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $master = Master::findOrFail($master_id);
        $master->name = $request->name;
        $master->phone = $request->phone;
        $master->position = $request->position;
        $master->experience = $request->experience;
        $master->education = $request->education;

        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            if ($master->image) {
                Storage::delete(str_replace('/storage', 'public', $master->image));
            }
            $path = $request->file('image')->store('public/images');
            $master->image = Storage::url($path);
        }

        $master->save();

        return redirect()->route('masters.index')->with('success', 'Мастер успешно обновлен!');
    }

    // Удаление мастера
    public function destroy($master_id)
    {
        $master = Master::findOrFail($master_id);
        if ($master->image) {
            Storage::delete(str_replace('/storage', 'public', $master->image));
        }
        $master->delete();

        return redirect()->route('masters.index')->with('success', 'Мастер успешно удален!');
    }

    // Прикрепление услуги к мастеру
    public function attachService(Request $request, $master_id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        $master = Master::findOrFail($master_id);
        $master->services()->attach($request->service_id);

        return redirect()->back()->with('success', 'Услуга успешно добавлена мастеру!');
    }

    // Открепление услуги от мастера
    public function detachService($master_id, $service_id)
    {
        $master = Master::findOrFail($master_id);
        $master->services()->detach($service_id);

        return redirect()->back()->with('success', 'Услуга успешно удалена у мастера!');
    }
}
