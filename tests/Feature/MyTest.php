<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = new User;
        $user->name = "山田";
        $user->email = "yamada@test.com";
        $user->password = \Hash::make('password');
        $user->save();

        $readUser = User::where('name', '山田')->first();
        $this->assertNotNull($readUser);            // データが取得できたかテスト
        $this->assertTrue(\Hash::check('password', $readUser->password)); // パスワードが一致しているかテスト

        User::where('email', 'yamada@test.com')->delete(); // テストデータの削除
        $readUser = User::where('name', '山田')->first();
        $this->assertNull($readUser);            // データが取得できたかテスト
    }

    public function testExample2()
    {
        $this->assertTrue(true);
        
    }


}
