<?php

use Illuminate\Database\Seeder;
use App\Pregunta;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pregunta::class)->times(60)->create([
            'id_cuest_eval' => 1, 
        ]); 
        factory(Pregunta::class)->times(21)->create([
            'id_cuest_eval' => 2, 
        ]); 
        factory(Pregunta::class)->times(120)->create([
            'id_cuest_eval' => 3, 
        ]); 
        factory(Pregunta::class)->times(180)->create([
            'id_cuest_eval' => 4, 
        ]); 
    }
}
