<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use PDF;

class ArticleController extends Controller
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
        return view('articles.create');
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
        $image_name = 'unknown';

        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $image_name,
        ]);
        // return 'Artikel berhasil disimpan';
        $message = 'Artikel berhasil disimpan!';
        echo "<script>alert('".$message."');</script>";

        return view('articles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);

        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = Article::find($id);

        $article->title = $request->title;
        $article->content = $request->content;
        // $image_name = $article->featured_image;

        if ($article->featured_image && file_exists(storage_path('app/public/'.$article->featured_image))) {
            \Storage::delete('public/'.$article->featured_image);
        }

        $image_name = $request->file('image')->store('images', 'public');
        $article->featured_image = $image_name;

        $article->save();

        $message = 'Artikel berhasil diupdate!';
        echo "<script>alert('".$message."');</script>";

        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function cetak_pdf() {
        $articles = Article::all();

        $pdf = PDF::loadview('articles.cetak_pdf', ['articles' => $articles]);

        return $pdf->stream();
    }
}
