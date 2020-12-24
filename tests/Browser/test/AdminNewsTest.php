<?php

namespace Tests\Browser\test;
use App\User;
use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{



    /**
     * @test
     * @return void
     */
    public function admin_it_can_edit_news()
    {
        $user = factory(User::class)->states('withAdminRole')->create();
        $news = factory(News::class)->states(['withCategory','withPrivateFalseState'])->create();

        $this->browse(function (Browser $browser) use ($news, $user) {
            $browser->loginAs($user)->
            visit(route('admin.edit', $news))
                ->assertSee('Редактировать новость')
                ->screenshot('03-News');
        });

    }
}
