<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BooksExport;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $pageTitle = 'Admin Page';

        // ELOQUENT
        $books = Book::all();

        confirmDelete();

        return view('admin.dashboard', [
            'pageTitle' => $pageTitle,
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Book';

        return view('admin.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'copies' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->copies_in_circulation = $request->copies;

        $book->save();

        Alert::success('Added Successfully', 'Book Data Added Successfully.');

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Book Detail';

        // ELOQUENT
        $book = Book::find($id);

        return view('admin.show', compact('pageTitle', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Book';

        $book = Book::find($id);

        //render view with post
        return view('admin.edit', compact('pageTitle', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'copies' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = Book::find($id);

        // ELOQUENT
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->copies_in_circulation = $request->copies;

        $book->save();

        Alert::success('Updated Successfully', 'Book Data Updated Successfully.');

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $book = Book::findOrFail($id);

        $book->delete();

        Alert::success('Deleted Successfully', 'Book Data Deleted Successfully.');

        return redirect()->route('admin.dashboard');
    }

    public function getData(Request $request)
    {
        $books = Book::all();

        if ($request->ajax()) {
            return datatables()->of($books)
                ->addIndexColumn()
                ->addColumn('actions', function($book) {
                    return view('admin.actions', compact('book'));
                })
                ->toJson();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }

    public function exportPdf()
    {
        $books = Book::all();

        $pdf = PDF::loadView('admin.export_pdf', compact('books'));

        return $pdf->download('books.pdf');
    }
}
