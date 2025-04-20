<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $review = Review::findOrFail($id);
        $review->name = $request->input('name');
        $review->content = $request->input('content');
        $review->created_at = $request->input('date');
        $review->updated_at = $request->input('date');

        // Обработка изображения
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            if ($review->image) {
                Storage::disk('public')->delete($review->image);
            }
            // Сохраняем новое изображение в storage/app/public/reviews
            $path = $request->file('image')->store('images', 'public');
            $review->image = $path;
        }

        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно обновлен.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Удаляем изображение, если оно есть
        if ($review->image) {
            Storage::disk('public')->delete($review->image);
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно удален.');
    }

    public function create()
    {
        return view('createReview');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $review = new Review();
        $review->name = $request->input('name');
        $review->telephone = $request->input('phone');
        $review->content = $request->input('content');

        // Обработка изображения
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $review->image = $path;
        }

        $review->save();

        return redirect()->route('home')->with('success', 'Отзыв успешно создан.');
    }
}
