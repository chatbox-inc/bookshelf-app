<?php

namespace Tests\Feature\Books;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Faker;
use Carbon\Carbon;

/**
 * 書籍追加API
 *
 * Class AddApiTest
 * @package Tests\Feature\Books
 */
class AddApiTest extends TestCase
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
        $faker = Faker\Factory::create('en_US');
        $response = $this->json('POST', '/api/v1/books/add', [
            'title'         => $faker->word,
            'url'           => $faker->url,
            'img'           => $faker->url,
            'description'   => $faker->text,
            'isbn'          => $faker->isbn10,
            'author'        => $faker->name,
            'publisher'     => $faker->company,
            'published_at'  => Carbon::parse($faker->dateTimeThisDecade),
            'is_rental'     => $faker->boolean,
        ]);
        $response->assertStatus(200);
    }

    /**
     * 異常系
     */
    public function testFailure()
    {
        $faker = Faker\Factory::create('en_US');

        // リクエストボディが空のパターン
        $response = $this->json('POST', '/api/v1/books/add');
        $response->assertStatus(400);

        // 必須項目が足りないパターン
        $response = $this->json('POST', '/api/v1/books/add', [
            'title'         => $faker->word,
            'url'           => $faker->url,
            'img'           => $faker->url,
            'description'   => $faker->text,
            'isbn'          => $faker->isbn10,
            'author'        => $faker->name,
            'publisher'     => $faker->company,
            'published_at'  => Carbon::parse($faker->dateTimeThisDecade),
            // 'is_rental'     => $faker->boolean,
        ]);
        $response->assertStatus(400);

        // データの型がおかしいパターン
        $response = $this->json('POST', '/api/v1/books/add', [
            'title'         => $faker->word,
            'url'           => $faker->text, // <-
            'img'           => $faker->url,
            'description'   => $faker->text,
            'isbn'          => $faker->isbn10,
            'author'        => $faker->name,
            'publisher'     => $faker->company,
            'published_at'  => Carbon::parse($faker->dateTimeThisDecade),
            // 'is_rental'     => $faker->boolean,
        ]);
        $response->assertStatus(400);
    }
}
