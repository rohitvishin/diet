<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories_question', function (Blueprint $table) {
            $table->id();
            $table->longText("question");
        });
        $data=[
            [
                'question' => 'Do you have any other medical problems that are not covered above? Please give us the details.',
            ],
            [
                'question' => 'Do you have any food allergies? If you do, please name the foods and the reactions they cause in your body.',
            ],
            [
                'question' => 'Have you ever been hospitalised? If yes, please write down when and for what reason.',
            ],
            [
                'question' => 'Have you undergone surgery in the past? If you have, please mention when and for what.',
            ],
            [
                'question' => 'Certain health problems such as diabetes, high blood pressure, cancer, heart ailments, thyroid, asthma, high cholesterol, rheumatoid arthritis, thalassemia minor run in our families. Please take a moment to think about whether any of these are present in yours. This will help us analyse your case more accurately.',
            ],
            [
                'question' => 'How often do you suffer from cold, cough or flu?',
            ],
            [
                'question' => 'What’s the name of your family doctor/GP/īendocrinologist?',
            ],
            [
                'question' => 'do you have children? if you do, please mention the year(s) of delivery.',
            ],
            [
                'question' => 'are you a breastfeeding mother? if yes, please mention how many months you have been nursing your child for.',
            ],
            [
                'question' => 'have you menopaused?',
            ],
            [
                'question' => 'if you haven’t menopaused, do you have regular periods?',
            ],
            [
                'question' => 'please tell us the name of your gynaecologist.',
            ]
        ];
        DB::table('medical_histories_question')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories_question');
    }
};
