<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * 書籍一覧取得
     *
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $request = request();
        return Book::select('id', 'title', 'is_rental')->take($request->count)->get();
    }

    /**
     * 書籍追加
     *
     * @return mixed
     */
    public function add()
    {
        $request = request();
        return Book::create([
            'title'         => $request->title,
            'url'           => $request->url,
            'img'           => $request->img,
            'description'   => $request->description,
            'isbn'          => $request->isbn,
            'author'        => $request->author,
            'publisher'     => $request->publisher,
            'published_at'  => $request->published_at,
            'is_rental'     => $request->is_rental,
        ]);
    }

    /**
     * 書籍詳細取得
     *
     * @return mixed
     */
    public function detail()
    {
        $request = request();
        return Book::where('id', $request->id)->first();
    }
}
