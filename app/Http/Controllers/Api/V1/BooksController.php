<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Validator;

class BooksController extends Controller
{
    /**
     * 書籍一覧取得
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();

        $validator = Validator::make($request->all(), [
            'count' => [ 'sometimes', 'bail', 'integer', 'min:1', ],
        ]);
        if ($validator->fails()) return response([], 400);

        $books = Book::select('id', 'title', 'is_rental')->take($request->count)->get();
        return response($books, 200);
    }

    /**
     * 書籍詳細取得
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function detail()
    {
        $request = request();

        $validator = Validator::make($request->all(), [
            'id' => [ 'bail', 'required', 'integer', 'min:1', ],
        ]);
        if ($validator->fails()) return response([], 400);

        $book = Book::where('id', $request->id)->first();
        return response($book, 200);
    }

    /**
     * 書籍追加
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function add()
    {
        $request = request();

        $validator = Validator::make($request->all(), [
            'title'         => [ 'required', 'string', ],
            'url'           => [ 'required', 'url', ],
            'img'           => [ 'required', 'url', ],
            'description'   => [ 'required', 'string', ],
            'isbn'          => [ 'required', 'string', 'regex:/^([0-9]{9}[0-9X]{1}|[0-9]{13})$/' ],
            'author'        => [ 'required', 'string', ],
            'publisher'     => [ 'required', 'string', ],
            'published_at'  => [ 'required', 'date', ],
            'is_rental'     => [ 'required', 'boolean', ],
        ]);
        if ($validator->fails()) return response([], 400);

        $book = Book::create([
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

        return response($book, 200);
    }

    /**
     * 書籍貸出/返却
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function rental()
    {
        $request = request();

        $book = Book::where('id', $request->id)->update([
            'is_rental' => $request->is_rental
        ]);

        return response($book, 200);
    }
}
