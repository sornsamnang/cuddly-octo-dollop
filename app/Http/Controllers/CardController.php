<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cards = Card::orderBy("created_at", "desc")->get();

        return view("home", ["cards" => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|string",
            "files"   => "required|array|min:1",
            "files.*" => "required|file|mimes:jpg,jpeg,png|max:10024" // max 10MB per file
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        }

        $card = Card::create([
            "title" => $request->title,
            "description" => $request->description
        ]);

        foreach ($request->file("files") as $file) {
            $path_name = $file->store("uploads", "public");
            Image::create([
                "path_name" => $path_name,
                "card_id" => $card->id
            ]);
        }

        return redirect()->to("/")->with("success", "Save successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}