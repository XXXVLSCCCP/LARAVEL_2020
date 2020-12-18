<?php

namespace Tests\Browser\test;

use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * @test
     * @return void
     */
    public function admin_it_can_edit_news()
    {

        $news = factory(News::class)->states(['withCategory','withPrivateFalseState'])->create();

        $this->browse(function (Browser $browser) use ($news) {
            $browser->visit(route('admin.edit', $news))
                ->assertSee('Редактировать новость')
                ->screenshot('01-News');
        });

    }
}
