<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View | RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View | RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Category::create($validated);
        return redirect()->route('categories.index')
            ->with('success', 'Category berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) : View | RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        return view('categories.show', compact('category'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) : View | RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category) : RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $category->update($validated);
        return redirect()->route('categories.index')
            ->with('success', 'Category berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) : RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category berhasil dihapus.');
    }
}