<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Сидеры для мастеров
        DB::table('masters')->insert([
            [
                'name' => 'Анна Иванова',
                'phone' => '+7 (900) 123-45-67',
                'position' => 'Парикмахер',
                'experience' => 5,
                'education' => 'Курсы парикмахеров',
                'image' => 'img/master-1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Сергей Петров',
                'phone' => '+7 (900) 765-43-21',
                'position' => 'Мастер маникюра',
                'experience' => 5,
                'education' => 'Курсы маникюра',
                'image' => 'img/master-2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Григорий Норманенко',
                'phone' => '+7 (456) 398-27-63',
                'position' => 'Мастер маникюра',
                'experience' => 4,
                'education' => 'Курсы маникюра',
                'image' => 'img/master-3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Елена Павловна',
                'phone' => '+7 (909) 964-63-23',
                'position' => 'Массажер',
                'experience' => 17,
                'education' => 'Курсы массажа',
                'image' => 'img/master-4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Елена Павловна',
                'phone' => '+7 (967) 546-32-41',
                'position' => 'Мастер маникюра',
                'experience' => 17,
                'education' => 'Курсы маникюра',
                'image' => 'img/master-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Сидеры для категорий
        DB::table('categories')->insert([
            [
                'name' => 'Парикмахерские услуги',
                'description' => 'Все виды парикмахерских услуг',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Маникюр',
                'description' => 'Услуги по маникюру и педикюру',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Массаж',
                'description' => 'Услуги массажа',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Сидеры для услуг
        DB::table('services')->insert([
            [
                'name' => 'Мужская Стрижка',
                'description' => 'Классическая стрижка',
                'price' => 800,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Стрижка',
                'description' => 'Классическая стрижка',
                'price' => 1800,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Маникюр',
                'description' => 'Классический маникюр',
                'price' => 1500,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Педикюр',
                'description' => 'Классический педикюр',
                'price' => 2000,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Массаж шеи',
                'description' => 'Классический массаж шеи',
                'price' => 800,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Массаж тела',
                'description' => 'Классический массаж тела',
                'price' => 2000,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Массаж ног',
                'description' => 'Классический массаж ног',
                'price' => 1400,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Сидеры для изображений
        DB::table('images')->insert([
            [
                'path' => 'img/image-1.png',
                'master-id' => 2,
                'service-id' => 3,
                'name' => 'Маникюр',

            ],
            [
                'path' => 'img/image-1.png',
                'master-id' => 3,
                'service-id' => 3,
                'name' => 'Маникюр',

            ],
            [
                'path' => 'img/image-1.png',
                'master-id' => 5,
                'service-id' => 3,
                'name' => 'Маникюр',

            ],
        ]);

        // Сидеры для связи мастеров и услуг
        DB::table('master_service')->insert([
            [
                'master_id' => 1,
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_id' => 2,
                'service_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_id' => 3,
                'service_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_id' => 5,
                'service_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_id' => 4,
                'service_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_id' => 4,
                'service_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'master_id' => 2,
                'service_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Сидеры для заказов
        DB::table('orders')->insert([
            [
                'customer_name' => 'Елена Смирнова',
                'service_id' => 1,
                'master_id' => 1,
                'date' => '2023-10-01',
                'time' => '10:00:00',
                'customer_telephone' => '89001234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_name' => 'Мария Кузнецова',
                'service_id' => 2,
                'master_id' => 2,
                'date' => '2023-10-02',
                'time' => '11:00:00',
                'customer_telephone' => '89007654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'login' => 'admin',
                'email_verified_at' => null,
                'password' => '$2y$12$diAEVEAaAqMPIW9/u.l7/.Y6EiyNkNF2KXoXuBJkY.EkR8wKMxBFW',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
