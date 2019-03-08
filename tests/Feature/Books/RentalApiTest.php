<?php

namespace Tests\Feature\Books;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * 書籍貸出API
 *
 * Class RentalApiTest
 * @package Tests\Feature\Books
 */
class RentalApiTest extends TestCase
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
        $response = $this->json('POST', '/api/v1/books/rental', [
            'id' => 1,
        ]);
        $response->assertStatus(200);
    }

    /**
     * 異常系
     */
    public function testFailure()
    {
        // IDが指定されていないパターン
        $response = $this->json('POST', '/api/v1/books/rental');
        $response->assertStatus(400);

        // IDが文字列のパターン
        $response = $this->json('POST', '/api/v1/books/rental', [
            'id' => 'hoge',
        ]);
        $response->assertStatus(400);

        // IDが1未満パターン
        $response = $this->json('POST', '/api/v1/books/rental', [
            'id' => 0,
        ]);
        $response->assertStatus(400);
    }
}
