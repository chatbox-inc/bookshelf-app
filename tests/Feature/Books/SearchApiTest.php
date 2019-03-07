<?php

namespace Tests\Feature\Books;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * 書籍検索API
 *
 * Class SearchApiTest
 * @package Tests\Feature\Books
 */
class SearchApiTest extends TestCase
{
    /**
     * テーブル初期化処理
     */
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    // TODO: 書籍検索APIのPRがマージされたらやる
}
