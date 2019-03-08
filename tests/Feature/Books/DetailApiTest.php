<?php

namespace Tests\Feature\Books;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * 書籍詳細取得API
 *
 * Class DetailApiTest
 * @package Tests\Feature\Books
 */
class DetailApiTest extends TestCase
{
    /**
     * テーブル初期化処理
     */
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * 正常系
     */
    public function testSuccess()
    {
        $response = $this->json('GET', '/api/v1/books/detail?id=1');
        $response->assertStatus(200);
    }

    /**
     * 異常系
     */
    public function testFailure()
    {
        // パラメーターが指定されていない
        $response = $this->json('GET', '/api/v1/books/detail');
        $response->assertStatus(400);

        // IDが指定されていない
        $response = $this->json('GET', '/api/v1/books/detail?id=');
        $response->assertStatus(400);

        // IDが文字列である
        $response = $this->json('GET', '/api/v1/books/detail?id=hoge');
        $response->assertStatus(400);

        // IDが1未満である
        $response = $this->json('GET', '/api/v1/books/detail?id=0');
        $response->assertStatus(400);
    }
}
