<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BasicInfoType ;

class BasicInfoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['type_name' => 'ประวัติความเป็นมา'],
            ['type_name' => 'ข้อมูลสภาพทั่วไป'],
            ['type_name' => 'ข้อมูลชุมชน'],
            ['type_name' => 'ผลิตภัณฑ์ชุมชน'],
            ['type_name' => 'สถานที่สำคัญ'],
            ['type_name' => 'แกลอรี่ภาพถ่ายภูมิทัศน์'],
            ['type_name' => 'บริการขั้นพื้นฐาน'],
            ['type_name' => 'ยุทธศาสตร์การพัฒนา'],
        ];

        foreach ($data as $item) {
            BasicInfoType::firstOrCreate(
                ['type_name' => $item['type_name']],
                ['type_name' => $item['type_name']]
            );
        }
    }
}
