<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminNewsTest extends TestCase
{

    //use DatabaseTransactions;
    use DatabaseMigrations;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function it_can_get_edit_form()
    {
        $response = $this->get('/admin/news/add');

        $response->assertStatus(200);
        $response->assertSeeText('Добавить новость');

    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function it_can_post_create_form()
    {

        $data = [
            'category_id' => 1,
            'image'       => '',
            'is_private'  => rand(0,1),
            'title'       => $this->faker->sentence(rand(3,10)),
            'text'        => $this->faker->text(rand(100,3000)),
        ];


        $response = $this->post( route('admin.news.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('news',$data);

    }


   /**
    * A basic feature test example.
    * @test
    * @return void
    */

    public function it_can_post_edit_form()
    {
        #0. Тест на пустой БД (trait DatabaseMigrations)
        #1. Создаём новость с помощью фабрики
        #2. Отправляем данные на форму редактирования
        #3. Проверяем, что в БД данне по новости изменились

        $user = factory(User::class)->state('withAdminRole')->create();
        $news = factory(News::class)->states(['withCategory','withPrivateFalseState'])->create();

        $this->actingAs($user);

        $newTitle = $this->faker->sentence(rand(3,10));
        $newSpoiler = $this->faker->text(rand(100,300));

        $data = [
            'category_id' => 1,
            'image'       => '',
            'is_private'  => rand(0,1),
            'title'       => $newTitle,
            'text'        => $news->text,
        ];

        $response = $this->patch( route('admin.news.update',$news), $data);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('news',$news->toArray());
        $this->assertDatabaseHas('news',$data);

    }

}
