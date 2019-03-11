<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * 書籍一覧取得API
 *
 * Class IndexApiTest
 * @package Tests\Feature
 */
class IndexApiTest extends TestCase
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
        // レコード件数指定なし
        $response = $this->json('GET', '/api/v1/books');
        $response->assertStatus(200);

        // レコード件数指定あり
        $response = $this->json('GET', '/api/v1/books?count=10');
        $response->assertStatus(200);

        // レコード件数指定あり(超過)
        $response = $this->json('GET', '/api/v1/books?count=100');
        $response->assertStatus(200);
    }

    /**
     * 異常系
     */
    public function testFailure()
    {
        // レコード件数が数値でない
        $response = $this->json('GET', '/api/v1/books?count=hoge');
        $response->assertStatus(400);

        // レコード件数が1未満である
        $response = $this->json('GET', '/api/v1/books?count=0');
        $response->assertStatus(400);
    }
}
