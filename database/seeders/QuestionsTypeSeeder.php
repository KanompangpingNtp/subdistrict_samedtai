<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestionsType;

class QuestionsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'ด้านเจ้าหน้าที่ผู้ให้บริการ',
            'ด้านกระบวนการขั้นตอนการให้บริการ',
            'ด้านสิ่งอำนวยความสะดวก'
        ];

        foreach ($types as $typeName) {
            QuestionsType::firstOrCreate([
                'type_name' => $typeName
            ]);
        }
    }
}
