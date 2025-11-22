<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tpmodul;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TpmodulController extends Controller
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

        $tpmoduls = Tpmodul::with('user')->latest()->paginate(10);
        return view('tpmoduls.index', compact('tpmoduls'));
    }

    public function publicShow() : View | RedirectResponse
    {

        $tpmoduls = Tpmodul::with('user')->latest()->paginate(10);
        return view('tpmoduls.public', compact('tpmoduls'));
    }

    public function publicShowDetail(Tpmodul $tpmodul) : View 
    {
        $tpmodul->load('category', 'user');
        return view('tpmoduls.publicShow', compact('tpmodul'));
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

        $categories = Category::all();

        return view('tpmoduls.create', compact('categories'));
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

        $user = session('user');


        $validate = $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string',
            'deskripsi' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $tpmodul = Tpmodul::create([
            'judul' => $validate['judul'],
            'subjudul' => $validate['subjudul'],
            'deskripsi' => $validate['deskripsi'],
            'category_id' => $validate['category_id'],
            'user_id' => $user->id
        ]);

        return redirect()->route('tpmoduls.index')
            ->with('success', 'Tpmodul berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tpmodul $tpmodul) : View | RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        // sesuai dengan nama method relasi di Model Tpmodul
        $tpmodul->load('category', 'user');

        return view('tpmoduls.show', compact('tpmodul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tpmodul $tpmodul) : View | RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        $categories = Category::all();

        $tpmodul->load('category', 'user');
        return view('tpmoduls.edit', compact('tpmodul', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tpmodul $tpmodul) : RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string',
            'deskripsi' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $tpmodul->update($validated);

        return redirect()->route('tpmoduls.index')
            ->with('success', 'Tpmodul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tpmodul $tpmodul) : RedirectResponse
    {
        if (!session()->has('user')) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access tpmoduls.');
        }

        $tpmodul->delete();
        return redirect()->route('tpmoduls.index')
            ->with('success', 'Tpmodul berhasil dihapus.');
    }
}
