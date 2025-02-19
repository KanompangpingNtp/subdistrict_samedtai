<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostType;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['type_name' => 'ข่าวประชาสัมพันธ์'],
            ['type_name' => 'กิจกรรม'],

            ['type_name' => 'ประกาศจัดซื้อจัดจ้าง'],
            ['type_name' => 'ผลจัดซื้อจัดจ้าง'],
            ['type_name' => 'ประกาศราคากลาง'],
            ['type_name' => 'งานเก็บรายได้'],

            ['type_name' => 'จุดเช็คอินกินเที่ยว'],
            ['type_name' => 'ป้ายประกาศ'],
        ];

        foreach ($data as $item) {
            PostType::firstOrCreate(
                ['type_name' => $item['type_name']],
                ['type_name' => $item['type_name']]
            );
        }
    }
}
