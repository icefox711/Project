<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'MetMart | Produk';
        $produks = Produk::with('kategori')->get();
        $kategoris = Kategori::all();
        return view('kantin.produk', compact('produks', 'title', 'kategoris'));
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
        // dd($request->all());
        $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produks,nama_produk',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png|max:3000',
            'id_kategori' => 'required|exists:kategoris,id',
            'desc' => 'required'
        ]);

        $exisitingProduk = Produk::where('nama_produk', $request->nama_produk)->first();

        if ($exisitingProduk) {
            $exisitingProduk->stok += $request->stok;
        } else {
            $foto = $request->file('foto');
            $foto->storeAs('public/produk', $foto->hashName());
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'foto' => $foto->hashName(),
                'desc' => $request->desc,
                'id_kategori' => $request->id_kategori
            ]);
        }
        return redirect()->back()->with('success', 'berhasil menambahkan sebuah data produk baru',);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_produk' => [
                'required',
                'string',
                'max:255',
                Rule::unique('produks', 'nama_produk')->ignore($id),
            ],
            'id_kategori' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric',
            'desc' => 'required'
        ]);

        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak di temukan.');
        }

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            ]);

            $foto = $request->file('foto');
            if ($produk->foto !== 'default.png') {
                Storage::delete('./storage/produk/' . $produk->foto);
            }
            $foto->storeAs('./storage/produk/' . $foto->hashName());

            Storage::delete('./storage/produk/' . $produk->foto);
            $produk->foto = $foto->hashName();
            $produk->nama_produk = $request->nama_produk;
            $produk->id_kategori = $request->id_kategori;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->desc = $request->desc;
            $produk->save();
        } else {

            $produk->nama_produk = $request->nama_produk;
            $produk->id_kategori = $request->id_kategori;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->desc = $request->desc;
            $produk->save();
        }

        return redirect()->back()->with('success', 'Berhasil mengedit sebuah data produk.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { {
            $produk = Produk::findOrFail($id);
            Storage::delete('public/produk/' . $produk->image);
            $produk->delete();

            return redirect()->back()->with('success', 'Berhasil Menghapus sebuah data porduk.');
        }
    }
}
