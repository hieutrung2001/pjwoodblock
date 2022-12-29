<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getDataLimit($limit = null) {
        $data = [];
        if ($limit == null) {
            // $woodblocks = DB::table('woodblocks')->select(['link', 'quyen', 'code', 'engraved_face', 'description', 'front_image', 'back_image', 'books_id', 'dynasty_id', 'created'])->where('state', '=', 1)->get()->all();
            $woodblocks = DB::table('woodblocks')
                            ->join('books', 'books.id', '=', 'woodblocks.books_id')
                            ->join('dynasty', 'dynasty.id', '=', 'woodblocks.dynasty_id')
                            ->select('woodblocks.*', 'books.*', 'dynasty.*')
                            ->where('books.state', 1)
                            ->where('woodblocks.state', 1)
                            ->orderByDesc('woodblocks.is_displayed')
                            ->get()->all();
        } else {
            // $woodblocks = DB::table('woodblocks')->select(['link', 'quyen', 'code', 'engraved_face', 'description', 'front_image', 'back_image', 'books_id', 'dynasty_id', 'created'])->where('state', '=', 1)->limit(6)->get()->all();
            $woodblocks = DB::table('woodblocks')
                            ->join('books', 'books.id', '=', 'woodblocks.books_id')
                            ->join('dynasty', 'dynasty.id', '=', 'woodblocks.dynasty_id')
                            ->select('woodblocks.*', 'books.*', 'dynasty.*')
                            ->where('books.state', 1)
                            ->where('woodblocks.state', 1)
                            ->where('woodblocks.is_displayed', 1)
                            ->orderByDesc('woodblocks.is_displayed')
                            ->limit($limit)
                            ->get()->all();
        }
        // dd($woodblocks);
        foreach ($woodblocks as $w) {
            $ar = [];
            $ar['code'] = $w->code;
            // $position1 = json_decode($w->quyen);
            
            $position1 = json_decode($w->quyen);
            if (!empty($position1[0])) {
                $ar['front_notebook'] = $position1[0];
            }
            if (!empty($position1[1])) {
                $ar['back_notebook'] = $position1[1];
            }

            $position2 = json_decode($w->engraved_face);
            if (!empty($position2[0])) {
                $ar['front_engraved_face'] = $position2[0];
            }
            if (!empty($position2[1])) {
                $ar['back_engraved_face'] = $position2[1];
            }

            // $ar['quyen'] = $w->quyen;
            // $ar['engraved_face'] = $w->engraved_face;
            $ar['description'] = $w->description;
            $ar['front_image'] = $w->front_image;
            $ar['back_image'] = $w->back_image;

            $book = DB::table('books')->select('name', 'description')->where('id', '=', $w->books_id)->where('state', 1)->first();
            // dd($book);
            $ar['books_id'] = $w->books_id;
            $ar['books_name'] = $book->name;
            $ar['books_description'] = $book->description;

            $dynasty = DB::table('dynasty')->select('name', 'description')->where('id', '=', $w->dynasty_id)->where('state', 1)->first();
            $ar['dynasty_id'] = $w->dynasty_id;
            $ar['dynasty_name'] = $dynasty->name;
            $ar['dynasty_description'] = $dynasty->description;
            $ar['created'] = $w->created;
            $ar['link'] = $w->link;
            $ar['is_displayed'] = $w->is_displayed;
            $detailImages = json_decode($w->detail_images);
            $detailImages = str_replace('\\', 'a', $detailImages);
            $ar['detail_images'] = $detailImages;

            array_push($data, $ar);
        }
        return $data;
    }

    protected function searchWoodblock($data, $keyValue) {
        $result = [];
        foreach ($data as $w) {
            if (str_contains(mb_strtolower(preg_replace('/\s+/', ' ', $w['books_name']), 'utf-8'), mb_strtolower(preg_replace('/\s+/', ' ', $keyValue), 'utf-8')) 
                || str_contains(mb_strtolower(preg_replace('/\s+/', ' ', $w['code']), 'utf-8'), mb_strtolower(preg_replace('/\s+/', ' ', $keyValue), 'utf-8'))
                || str_contains(mb_strtolower(preg_replace('/\s+/', ' ', $w['dynasty_name']), 'utf-8'), mb_strtolower(preg_replace('/\s+/', ' ', $keyValue), 'utf-8'))) {
                array_push($result, $w);
            }
        }
        return $result;
    }
}
