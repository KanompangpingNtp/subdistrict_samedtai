<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EvaluationQuestion;
use App\Models\QuestionsType;

class EvaluationQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $StaffSide = QuestionsType::where('type_name', 'ด้านเจ้าหน้าที่ผู้ให้บริการ')->first();
        $ProcessSteps = QuestionsType::where('type_name', 'ด้านกระบวนการขั้นตอนการให้บริการ')->first();
        $Convenience = QuestionsType::where('type_name', 'ด้านสิ่งอำนวยความสะดวก')->first();

        // ตรวจสอบว่าไม่เป็น null
        abort_unless($StaffSide && $ProcessSteps && $Convenience, 500, 'One or more question types not found.');

        $questions = [
            ['type_id' => $StaffSide->id, 'questions_name' => 'เจ้าหน้าที่พูดจาสุภาพ อัธยาศัยดี แต่งกายสุภาพ การวางตัว เรียบร้อย'],
            ['type_id' => $StaffSide->id, 'questions_name' => 'เจ้าหน้าที่ให้บริการด้วยความเต็มใจ รวดเร็ว และเอาใจใส่'],
            ['type_id' => $StaffSide->id, 'questions_name' => 'เจ้าหน้าที่ให้คำแนะนำ ตอบข้อซักถามได้อย่างชัดเจน ถูกต้อง น่าเชื่อถือ'],
            ['type_id' => $StaffSide->id, 'questions_name' => 'เจ้าหน้าที่สามารถแก้ปัญหา อุปสรรค ที่เกิดขึ้นได้อย่างเหมาะสม'],

            ['type_id' => $ProcessSteps->id, 'questions_name' => 'มีช่องทางการให้บริการที่หลากหลาย'],
            ['type_id' => $ProcessSteps->id, 'questions_name' => 'ขั้นตอนการให้บริการมีระบบ ไม่ยุ่งยาก ซับซ้อน มีความชัดเจน'],
            ['type_id' => $ProcessSteps->id, 'questions_name' => 'ขั้นตอนการให้บริการแต่ละขั้นตอนมีความสะดวก รวดเร็ว'],
            ['type_id' => $ProcessSteps->id, 'questions_name' => 'มีผังลำดับขั้นตอนการและระยะเวลาการให้บริการอย่างชัดเจน'],

            ['type_id' => $Convenience->id, 'questions_name' => 'การจัดสิ่งอำนวยความสะดวกในสถานที่ให้บริการ เช่น ที่จอดรถ น้ำดื่ม'],
            ['type_id' => $Convenience->id, 'questions_name' => 'มีเครื่องมือ/อุปกรณ์/ระบบในการบริการข้อมูลสารสนเทศ'],
            ['type_id' => $Convenience->id, 'questions_name' => 'มีการจัดผังการให้บริการและการใช้อาคารไว้อย่างชัดเจนสะดวก เหมาะสม'],
            ['type_id' => $Convenience->id, 'questions_name' => 'อาคารสถานที่มีความสะอาด ปลอดภัย'],
        ];

        foreach ($questions as $item) {
            EvaluationQuestion::firstOrCreate($item);
        }
    }
}
