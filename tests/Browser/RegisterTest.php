<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCanGoToRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->assertSee('Register');
        });
    }

    public function testCanRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->assertSee('Register')
                ->value('#name', 'Joe')
                ->value('#email', 'joeloki@examddple.com')
                ->value('#password', '123456890')
                ->value('#password-confirm', '123456890')
                ->click('button[type="submit"]')
                ->assertPathIs('/home')
                ->assertSee("You are logged in!");
        });
    }
}
