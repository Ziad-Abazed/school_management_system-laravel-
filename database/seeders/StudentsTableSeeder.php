<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('students')->delete();
        // $students = new Student();
        // $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        // $students->email = 'Ahmed_Ibrahim@yahoo.com';
        // $students->password = Hash::make('12345678');
        // $students->gender_id = 1;
        // $students->nationalitie_id = Nationalitie::all()->UNIQUEID()->random()->id;
        // $students->blood_id =Type_blood::all()->UNIQUEID()->random()->id;
        // $students->Date_Birth = date('1995-01-01');
        // $students->Grade_id = Grade::all()->UNIQUEID()->random()->id;
        // $students->Classroom_id =Classroom::all()->UNIQUEID()->random()->id;
        // $students->section_id = Section::all()->UNIQUEID()->random()->id;
        // $students->parent_id = My_Parent::all()->UNIQUEID()->random()->id;
        // $students->academic_year ='2021';
        // $students->save();
    }
}
