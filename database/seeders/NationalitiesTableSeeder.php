<?php

namespace Database\Seeders;

use App\Models\Nationalitie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('nationalities')->delete();

        $nationals = [
            
            [

                'en'=> 'Algerian',
                'ar'=> 'جزائري'
            ],
           
            [

                'en'=> 'Egyptian',
                'ar'=> 'مصري'
            ],
          
            [

                'en'=> 'Gibraltar',
                'ar'=> 'جبل طارق'
            ],
        
            [

                'en'=> 'Jordanian',
                'ar'=> 'أردني'
            ],
          
            [

                'en'=> 'Kuwaiti',
                'ar'=> 'كويتي'
            ],
          
            [

                'en'=> 'Lebanese',
                'ar'=> 'لبناني'
            ],
           
            [

                'en'=> 'Libyan',
                'ar'=> 'ليبي'
            ],
           
            [

                'en'=> 'Sri Lankian',
                'ar'=> 'سريلانكي'
            ],
          
            [

                'en'=> 'Malaysian',
                'ar'=> 'ماليزي'
            ],
            [

                'en'=> 'Moroccan',
                'ar'=> 'مغربي'
            ],
          
            [

                'en'=> 'Palestinian',
                'ar'=> 'فلسطيني'
            ],
           
            [

                'en'=> 'Saudi Arabian',
                'ar'=> 'سعودي'
            ],
          
            [

                'en'=> 'Syrian',
                'ar'=> 'سوري'
            ],
          
            [

                'en'=> 'Turkish',
                'ar'=> 'تركي'
            ],
            [

                'en'=> 'Yemeni',
                'ar'=> 'يمني'
            ],
           
        ];

        foreach ($nationals as $n) {
            Nationalitie::create(['Name' => $n]);
        }
    }
}
