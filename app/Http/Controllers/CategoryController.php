<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        try {

            $category = Category::create($data);
            flash('Categoria criada com sucesso!')->success();
            return redirect()->route('categories.index');
        } catch (\Exception $e) {

            $message = 'Erro ao criar categoria';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('categories.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return redirect()->route('categories.show', ['category' => $category->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();

        try {

            $category->update($data);
            flash('Categoria atualizada com sucesso')->success();
            return redirect()->route('categories.index');
        } catch (\Exception $e) {

            $message = 'Erro ao atualizar a categoria';
            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        try {
            $category->delete();
            flash('Categoria apagada com sucesso')->success();
            return redirect()->route('categories.index');
        } catch (\Exception $e) {

            $message = 'Erro ao apagar a categoria';
            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }
}
