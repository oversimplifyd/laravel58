<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{

    public function testCanSeeLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->assertSee('Login');
        });
    }

    public function testCanLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->assertSee('Login')
                ->value('#email', 'joeloki@example.com')
                ->value('#password', '123456890')
                ->click('button[type="submit"]')
                ->assertPathIs('/home')
                ->assertSee("You are logged in!");
        });
    }
}
