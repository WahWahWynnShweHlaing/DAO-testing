<?php

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            [
                'title' => 'The AI magically removes moving objects from videos.',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.',
                'public_flag' => '1',
                'user_id' => '1',
            ],
            [
                'title' => 'The AI magically removes moving objects from videos.',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.',
                'public_flag' => '0',
                'user_id' => '1',
            ],
            [
                'title' => 'The AI magically removes moving objects from videos.',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.',
                'public_flag' => '1',
                'user_id' => '1',
            ],
            [
                'title' => 'The AI magically removes moving objects from videos.',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.',
                'public_flag' => '0',
                'user_id' => '1',
            ],
            [
                'title' => 'The AI magically removes moving objects from videos.',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.',
                'public_flag' => '1',
                'user_id' => '2',
            ]
        ];

        foreach($news as $new){
            News::create($new);
        }
    }
}
