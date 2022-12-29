<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.books.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $data = DB::table('books')
            ->where('id', $id)
            ->where('state', 1)
            ->select('*')
            ->first();
        // dd($data);
        return view('admin.books.edit', [
            'books' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $booksName = preg_replace('/\s+/', ' ', $data['books']);
        $booksDescription = preg_replace('/\s+/', ' ', $data['books-detail']);
        
        DB::table('books')
            ->where('id', $id)
            ->where('state', 1)
            ->update([
                'name' => $booksName,
                'description' => $booksDescription,
                'modified' => time(),
            ]);
        return redirect()->route('admin.books.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listWoodblocks(Request $request, $id) {
        if (empty($request->all()['search'])) {
            return view('admin.woodblock.index', [
                'data' => $this->getDataLimit(),
            ]);
        } else {
            // dd($this->searchWoodblock($this->getDataLimit(), $request->all()['search']));
            return view('admin.woodblock.index', [
                'data' => $this->searchWoodblock($this->getDataLimit(), $request->all()['search']),
            ]);
        }
    }
}
