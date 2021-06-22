<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Book as GlobalBook;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Book;


class BookController extends Controller
{
    public function index(){
        $current_books = Books::all();
        return view('book.index', compact('current_books'));
    }

    public function create(){
        $book = Books::all();

        return view('book.create', compact('book'));
    }

    public function store(Request $request){
        $nameBook = $request->input('nameBook');
        $author = $request->input('author');

        $book = Books::create([
            'id' => Auth::user()->id,
            'nameBook' => $nameBook,
            'author' => $author
        ]);

        return redirect()->route('book.index', $book);
    }

    public function edit(Request $request){
        $edit = Books::find($request->id);
        $edit->nameBook = $request->nameBook;
        $edit->author = $request->author;
        return view('book.edit', compact('Edit'));
    }
}
