<?php

namespace App\Http\Controllers\Admin;

use App\Models\Books;
use App\Models\Dynasty;
use App\Models\Woodblocks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WoodblockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.woodblock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = DB::table('books')->select(['name', 'id'])->where('state', 1)->get()->all();
        $dynasty = DB::table('dynasty')->select(['name', 'id'])->where('state', 1)->get()->all();
        // dd($books[0]);
        // dd($this->getDataLimit());

        return view('admin.woodblock.create', [
            'books' => $books,
            'dynasty' => $dynasty,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);
        $data = $request->all();
        $checkIfExists = DB::table('woodblocks')
            ->join('books', 'books.id', '=', 'woodblocks.books_id')
            ->join('dynasty', 'dynasty.id', '=', 'woodblocks.dynasty_id')
            ->select('woodblocks.*', 'books.*', 'dynasty.*')
            ->where('books.state', 1)
            ->where('woodblocks.state', 1)
            ->where('woodblocks.code', $data['code'])
            ->first();
        // dd($data);

        // check if exists code

        // if (!empty(DB::table('woodblocks')->select('code')->where('code', $data['code'])->first())) {
        //     dd('Mã đã tồn tại!');
        // }
        if (!empty($checkIfExists)) {
            dd('Mã đã tồn tại!');
        }

        $checkBooks = false;
        $chekcDynasty = false;

        $book = new Books();
        if (!empty($data['books'])) {
            $str_books_temp = mb_strtolower(preg_replace('/\s+/', ' ', $data['books']), 'utf-8');
            $db_books = DB::table('books')->select('name')
                ->where('state', 1)
                ->where('name', $str_books_temp)
                ->get()->all();
            if (!empty($db_books)) {
                dd('Bộ sách đã tồn tại!');
            }
            $book->name = preg_replace('/\s+/', ' ', $data['books']);
            $book->description = preg_replace('/\s+/', ' ', $data['books-detail']);
            $book->save();
            $checkBooks = true;
        }
        $dynasty = new Dynasty();
        if (!empty($data['dynasty'])) {
            $str_dynasty_temp = mb_strtolower(preg_replace('/\s+/', ' ', $data['dynasty']), 'utf-8');
            $db_dynasty = DB::table('dynasty')->select('name')
                ->where('state', 1)
                ->where('name', $str_dynasty_temp)
                ->get()->all();
            if (!empty($db_dynasty)) {
                dd('Triều đại đã tồn tại!');
            }
            $dynasty->name = preg_replace('/\s+/', ' ', $data['dynasty']);
            $dynasty->description = preg_replace('/\s+/', ' ', $data['dynasty-detail']);
            $dynasty->save();
            $chekcDynasty = true;
        }

        $woodblock = new Woodblocks();
        $position1 = [];
        array_push($position1, preg_replace('/\s+/', ' ', $data['front-notebook']));
        if (!empty($data['back-notebook'])) {
            array_push($position1, preg_replace('/\s+/', ' ', $data['back-notebook']));
        }
        $woodblock->quyen = json_encode($position1);

        $position2 = [];
        array_push($position2, preg_replace('/\s+/', ' ', $data['front-engraved-face']));
        if (!empty($data['back-notebook'])) {
            array_push($position2, preg_replace('/\s+/', ' ', $data['back-engraved-face']));
        }
        $woodblock->engraved_face = json_encode($position2);
        $woodblock->code = preg_replace('/\s+/', ' ', $data['code']);
        $woodblock->description = preg_replace('/\s+/', ' ', $data['woodblock-detail']);

        if ($checkBooks) {
            $woodblock->books_id = $book->id;
        } else {
            $woodblock->books_id = (int) $data['books1'];
        }
        if ($chekcDynasty) {
            $woodblock->dynasty_id = $dynasty->id;
        } else {
            $woodblock->dynasty_id = (int) $data['dyns'];
        }

        if ($request->hasFile('front-img')) {
            $file1 = $request->file('front-img');
            $fileNameFront = $file1->getClientOriginalName();
            $file1->storeAs('public/images/', $fileNameFront);
            $woodblock->front_image = 'storage/images/' . $fileNameFront;
        }
        if ($request->hasFile('back-img')) {
            $file2 = $request->file('back-img');
            $fileNameBack = $file2->getClientOriginalName();
            $file2->storeAs('public/images/', $fileNameBack);
            $woodblock->back_image = 'storage/images/' . $fileNameBack;
        }
        if ($request->hasFile('detail-images')) {
            $tmpArray = [];
            $filesImage = $request->file('detail-images');
            foreach ($filesImage as &$file) {
                array_push($tmpArray, 'storage/images/' . $file->getClientOriginalName());
                $file->storeAs('public/images/', $file->getClientOriginalName());
            }
            $woodblock->detail_images = json_encode($tmpArray);
            // dd($filesImage[1]->getClientOriginalName());
        }
        if (!empty($data['link'])) {
            $woodblock->link = $data['link'];
        }

        $woodblock->save();
        // dd($data);

        return redirect()->route('woodblocks.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        // dd($code);
        $result = null;
        foreach ($this->getDataLimit() as $w) {
            if ($w['code'] === $code) {
                $result = $w;
                break;
            }
        }
        // dd($result);
        return view('admin.woodblock.detail', [
            'woodblock' => $result,
        ]);
    }

    public function list(Request $request)
    {
        // dd($request->all());
        // dd($this->getDataLimit());
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

    // public function search(Request $request) {
    //     $data = $request->all();
    //     dd($data['search']);
    //     $result = $this->searchWoodblock($this->getDataLimit(), $data['search']);
    //     // dd($result);
    //     // dd($this->getDataLimit());
    //     return view('admin.woodblock.index', [
    //         'data' => $result,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        // dd($code);
        $data = $this->getDataLimit();
        // dd($data); 
        $result = null;
        foreach ($data as $w) {
            if ($w['code'] === $code) {
                $result = $w;
                break;
            }
        }
        // dd($result);
        $books = DB::table('books')->select(['name', 'id'])->where('state', 1)->get()->all();
        $dynasty = DB::table('dynasty')->select(['name', 'id'])->where('state', 1)->get()->all();

        return view('admin.woodblock.edit', [
            'woodblock' => $result,
            'books' => $books,
            'dynasty' => $dynasty,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $data = $request->all();
        // dd($data);
        $woodblock = DB::table('woodblocks')->select('*')
            ->where('state', 1)
            ->where('code', $code)
            ->first();
        // dd((array) $woodblock);

        $checkBooks = false;
        $checkDynasty = false;

        $book = new Books();
        if (!empty($data['books'])) {
            $book->name = preg_replace('/\s+/', ' ', $data['books']);
            $book->description = preg_replace('/\s+/', ' ', $data['books-detail']);
            $book->save();
            $checkBooks = true;
        } else {
            DB::table('woodblocks')
                ->where('id', $woodblock->id)
                ->update([
                    'books_id' => preg_replace('/\s+/', ' ', $data['books1']),
                ]);
            if (!empty($data['books-detail'])) {
                DB::table('books')
                    ->where('id', preg_replace('/\s+/', ' ', $data['books1']))
                    ->update([
                        'description' => preg_replace('/\s+/', ' ', $data['books-detail']),
                    ]);
            }
        }

        $dynasty = new Dynasty();
        if (!empty($data['dynasty'])) {
            $dynasty->name = preg_replace('/\s+/', ' ', $data['dynasty']);
            $dynasty->description = preg_replace('/\s+/', ' ', $data['dynasty-detail']);
            $dynasty->save();
            $checkDynasty = true;
        } else {
            DB::table('woodblocks')
                ->where('id', $woodblock->id)
                ->update(['dynasty_id' => preg_replace('/\s+/', ' ', $data['dyns']),]);
            if (!empty($data['dynasty-detail'])) {
                DB::table('dynasty')
                    ->where('id', preg_replace('/\s+/', ' ', $data['dyns']))
                    ->update([
                        'description' => preg_replace('/\s+/', ' ', $data['dynasty-detail']),
                    ]);
            }
        }

        $position1 = [];
        if (!empty($data['front-notebook'])) {
            array_push($position1, preg_replace('/\s+/', ' ', $data['front-notebook']));
        }
        if (!empty($data['back-notebook'])) {
            array_push($position1, preg_replace('/\s+/', ' ', $data['back-notebook']));
        }

        $position2 = [];
        if (!empty($data['front-engraved-face'])) {
            array_push($position2, preg_replace('/\s+/', ' ', $data['front-engraved-face']));
        }
        if (!empty($data['back-engraved-face'])) {
            array_push($position2, preg_replace('/\s+/', ' ', $data['back-engraved-face']));
        }


        if (sizeof($position1) != 0) {
            $position1 = json_encode($position1);
            DB::table('woodblocks')
                ->where('id', $woodblock->id)
                ->update([
                    'quyen' => $position1,
                    'description' => preg_replace('/\s+/', ' ', $data['woodblock-detail']),
                ]);
        }
        if (sizeof($position2) != 0) {
            $position2 = json_encode($position2);
            DB::table('woodblocks')
                ->where('id', $woodblock->id)
                ->update([
                    'engraved_face' => $position2,
                    'description' => preg_replace('/\s+/', ' ', $data['woodblock-detail']),
                ]);
        }
        // DB::table('woodblocks')
        //     ->where('id', $woodblock->id)
        //     ->update([
        //         'engraved_face' => json_encode($position2),
        //         'quyen' => json_encode($position1),
        //         'description' => $data['woodblock-detail'],
        //     ]);

        if ($checkBooks) {
            DB::table('woodblocks')
                ->where('id', $woodblock->id)
                ->update([
                    'books_id' => $book->id,
                ]);
        }

        if ($checkDynasty) {
            DB::table('woodblocks')
                ->where('id', $woodblock->id)
                ->update([
                    'dynasty_id' => $dynasty->id,
                ]);
        }
        if ($request->hasFile('front-img')) {
            $file1 = $request->file('front-img');
            $fileNameFront = $file1->getClientOriginalName();
            $file1->storeAs('public/images/', $fileNameFront);
            // $woodblock->front_image = 'storage/images/' .$fileNameFront;
            DB::table('woodblocks')->where('id', $woodblock->id)->update(['front_image' => 'storage/images/' . $fileNameFront]);
        }
        if ($request->hasFile('back-img')) {
            $file2 = $request->file('back-img');
            $fileNameBack = $file2->getClientOriginalName();
            // $file2->storeAs('public/images/', $fileNameBack);
            DB::table('woodblocks')->where('id', $woodblock->id)->update(['back_image' => 'storage/images/' . $fileNameBack]);
        }
        if ($request->hasFile('detail-images')) {
            $detailImages = json_decode($woodblock->detail_images);
            $filesImage = $request->file('detail-images');
            foreach ($filesImage as &$file) {
                if (empty($detailImages) || in_array($file->getClientOriginalName(), $detailImages) == false) {
                    $file->storeAs('public/images/', $file->getClientOriginalName());
                    if ($detailImages == null) {
                        $detailImages = [];
                    }
                    array_push($detailImages, 'storage/images/' . $file->getClientOriginalName());
                    DB::table('woodblocks')->where('id', $woodblock->id)->update([
                        'detail_images' => json_encode($detailImages),
                    ]);
                }
            }
        }
        if (!empty($data['link'])) {
            DB::table('woodblocks')->where('id', $woodblock->id)->update([
                'link' => preg_replace('/\s+/', ' ', $data['link']),
            ]);
        }

        DB::table('woodblocks')->where('id', $woodblock->id)->update(['modified' => time()]);

        return redirect()->route('admin.woodblocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code, Request $request)
    {
        // dd($request->all());
        DB::table('woodblocks')->where('code', $code)->update(['state' => 2, 'modified' => time()]);
        // dd('success');

        // return $code;
    }


    public function listBooks()
    {
        $books = DB::table('books')->select(['name', 'id'])->where('state', 1)->get()->all();
        // dd($books);
        return view('admin.woodblock.delete-books', [
            'books' => $books,
        ]);
    }

    public function deleteBooks($id)
    {
        DB::table('books')->where('id', $id)->update(['state' => 2, 'modified' => time()]);
        return $id;
    }

    public function display(Request $request)
    {
        if (empty($request->all()['search'])) {
            return view('admin.woodblock.display', [
                'data' => $this->getDataLimit(),
            ]);
        } else {
            // dd($this->searchWoodblock($this->getDataLimit(), $request->all()['search']));
            return view('admin.woodblock.display', [
                'data' => $this->searchWoodblock($this->getDataLimit(), $request->all()['search']),
            ]);
        }
    }

    public function selectWoodblockDisplay(Request $request)
    {
        $code = $request->code;
        $state = $request->state;

        DB::table('woodblocks')->where('code', $code)->update([
            'is_displayed' => $state
        ]);
    }
}
