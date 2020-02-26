<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use App\Product;
use Illuminate\Support\Facades\File;
use Auth;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('category')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-warning btn-sm edit">edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm hapus">hapus</a>';

                    return $btn;
                })
                ->addColumn('gambar', function ($data) {
                    $img = '<img src="../assets/images/' . $data->gambar . '" alt="" width="100%" height="15%">';
                    return $img;
                })
                ->rawColumns(['action', 'gambar'])
                ->make(true);
        }
        return view('admin.product');
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
        // if (is_null($request->produk_id)) {
        //     $request->validate(
        //         [
        //             'nama' => 'required',
        //             'category_id' => 'required',
        //             'harga' => 'required',
        //             'gambar' => 'required'
        //         ]
        //     );
        // } else {
        //     $request->validate(
        //         [
        //             'nama' => 'required',
        //             'category_id' => 'required',
        //             'harga' => 'required'
        //         ]
        //     );
        // }

        $slug = Str::slug($request->nama, '-');

        if (is_null($request->produk_id)) {
            $photo = Str::random(6) . $request->file('gambar')->getClientOriginalName();
            $request->gambar->move(public_path('assets/images'), $photo);
            Product::updateOrCreate(
                ['id' => $request->produk_id],
                [
                    'nama' => $request->nama,
                    'slug' => $slug,
                    'category_id' => $request->category_id,
                    'harga' => $request->harga,
                    'stok' => $request->stok,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => $photo,

                ]
            );
        } else {
            if (is_null($request->gambar)) {
                Product::updateOrCreate(
                    ['id' => $request->produk_id],
                    [
                        'nama' => $request->nama,
                        'slug' => $slug,
                        'category_id' => $request->category_id,
                        'harga' => $request->harga,
                        'stok' => $request->stok,
                        'deskripsi' => $request->deskripsi

                    ]
                );
            } else {
                $old_photo = \DB::select('SELECT gambar FROM products WHERE id = ' . $request->produk_id . '');
                $data = '';
                foreach ($old_photo as $value) {
                    $data .= $value->gambar;
                }
                $image_path = "assets/images/" . $data;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $photo = Str::random(6) . $request->file('gambar')->getClientOriginalName();
                $request->gambar->move(public_path('assets/images'), $photo);
                Product::updateOrCreate(
                    ['id' => $request->produk_id],
                    [
                        'nama' => $request->nama,
                        'slug' => $slug,
                        'category_id' => $request->category_id,
                        'harga' => $request->harga,
                        'stok' => $request->stok,
                        'deskripsi' => $request->deskripsi,
                        'gambar' => $photo,

                    ]
                );
            }
        }

        return response()->json(['success' => 'Berhasil di Simpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Product::find($id);
        $kategori = \DB::select('SELECT id,nama FROM categories');
        foreach ($kategori as $value) {
            $data[] = '<option value="' . $value->id . '" ' . ($value->id == $produk->category_id ? 'selected' : '') . '>' . $value->nama . '</option>';
        }

        $option = implode('', $data);
        $data = ['produk' => $produk, 'kategori' => $option];
        return response()->json($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Product::find($id);
        $image_path = "assets/images/" . $produk->gambar;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $produk->delete();
        return response()->json(['success' => 'Berhasil Dihapus']);
    }
}
