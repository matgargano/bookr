<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class BooksController
 * @package App\Http\Controllers
 */
class BooksController {

	public function index() {
		return Book::all();
	}

	public function show( $id ) {
		try {
			return Book::findOrFail( $id );
		} catch ( ModelNotFoundException $ex ) {
			return response()->json( [
				'error' => [
					'message' => 'Book not found'
				]
			], 404 );
		}
	}

	public function store( Request $request ) {

		$book = Book::create( $request->all() );

		return response()->json( [ 'created' => true, 'id' => $book->id ], 201, [
			'Location' => route( 'books.show', [ 'id' => $book->id ] )
		] );

	}

	public function update( Request $request, $id ) {

		try {
			$book = Book::findOrFail( $id );

		} catch ( ModelNotFoundException $ex ) {
			return response()->json( [
				'error' => [
					'message' => 'Book not found'
				]
			], 404 );
		}

		$book->fill( $request->all() );
		$book->save();

		return $book;


	}

	public function destroy( $id ) {

		try {
			$book = Book::findOrFail( $id );
		} catch ( ModelNotFoundException $ex ) {
			return response()->json( [
				'error' => [
					'message' => 'Book not found'
				]
			], 404 );
		}
		$book->delete();

		return response( null, 204 );

	}

}