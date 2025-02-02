<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews')); // Передаем отзывы в представление
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id); // Находим отзыв по ID
        return view('admin.reviews.edit', compact('review')); // Передаем отзыв в представление для редактирования
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'content' => 'required|string|max:255',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Валидация для изображения
    ]);

    $review = Review::findOrFail($id); // Находим отзыв по ID
    $review->name = $request->input('name'); // Обновляем имя
    $review->content = $request->input('content'); // Обновляем содержимое отзыва
    $review->date = $request->input('date'); // Обновляем дату

    // Обработка изображения
    if ($request->hasFile('image')) {
        // Удаляем старое изображение, если оно есть
        if ($review->image) {
            Storage::delete($review->image);
        }
        // Сохраняем новое изображение
        $path = $request->file('image')->store('reviews'); // Сохраняем изображение в папку 'reviews'
        $review->image = $path; // Обновляем путь к изображению
    }

    $review->save(); // Сохраняем изменения

    return redirect()->route('reviews.index')->with('success', 'Отзыв успешно обновлен.'); // Перенаправляем с сообщением об успехе
}

    public function destroy($id)
    {
        $review = Review::findOrFail($id); // Находим отзыв по ID
        $review->delete(); // Удаляем отзыв

        return redirect()->route('admin.reviews.index')->with('success', 'Отзыв успешно удален.'); // Перенаправляем с сообщением об успехе
    }

    public function create(){
        return view('createReview');
    }
    public function store(Request $request)
{


    $review = new Review(); // Создаем новый экземпляр модели Review
    $review->name = $request->input('name'); // Устанавливаем имя
    $review->telephone = $request->input('phone'); // Устанавливаем телефон
    $review->content = $request->input('content'); // Устанавливаем содержимое отзыва


    // Обработка изображения
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('reviews'); // Сохраняем изображение в папку 'reviews'
        $review->image = $path; // Устанавливаем путь к изображению
    }

    $review->save(); // Сохраняем новый отзыв

    return redirect()->route('home')->with('success', 'Отзыв успешно создан.');
}
}
