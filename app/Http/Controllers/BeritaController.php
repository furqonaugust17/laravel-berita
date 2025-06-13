<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeritaStoreRequest;
use App\Http\Requests\BeritaUpdateRequest;
use App\Models\Berita;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{

    protected $imageUploadService;
    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'user') {
            $beritas = Berita::all();
            return view('users.berita.index', compact('beritas'));
        }

        if (request()->ajax()) {
            $beritas = Berita::query();
            return DataTables::of($beritas)->make();
        }
        return view('berita.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaStoreRequest $request)
    {
        $data = $request->validated();

        $data['gambar'] = $this->imageUploadService->storeSingle($request->file('gambar'));
        Berita::create($data);

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('users.berita.detail', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeritaUpdateRequest $request, Berita $berita)
    {
        $data = $request->validated();

        $this->imageUploadService->deleteImages($berita->gambar);
        $data['gambar'] = $this->imageUploadService->storeSingle($request->file('gambar'));
        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        $this->imageUploadService->deleteImages($berita->gambar);
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Dihapus');
    }
}
