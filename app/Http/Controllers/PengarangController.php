<?php

namespace App\Http\Controllers;

use App\Models\PengarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PengarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pengarang',
            'list' => ['Home', 'Pengarang']
        ];
        $page = (object) [
            'title' => 'Daftar pengarang kitab'
        ];
        $activeMenu = 'pengarang';

        return view('pengarang.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $pengarang = PengarangModel::select('pengarang_id', 'kode_pengarang', 'nama_pengarang', 'biografi', 'negara_asal');

        return DataTables::of($pengarang)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pengarang) {
                $btn = '<button onclick="modalAction(\'' . url('/pengarang/' . $pengarang->pengarang_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/pengarang/' . $pengarang->pengarang_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        return view('pengarang.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_pengarang' => 'required|string|min:3|max:20|unique:pengarang,kode_pengarang',
                'nama_pengarang' => 'required|string|max:100',
                'biografi' => 'nullable|string',
                'negara_asal' => 'nullable|string|max:50'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            PengarangModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data pengarang berhasil disimpan'
            ]);
        }
        return redirect('/');
    }

    public function edit_ajax($id)
    {
        $pengarang = PengarangModel::find($id);
        return view('pengarang.edit_ajax', ['pengarang' => $pengarang]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_pengarang' => 'required|string|min:3|max:20|unique:pengarang,kode_pengarang,' . $id . ',pengarang_id',
                'nama_pengarang' => 'required|string|max:100',
                'biografi' => 'nullable|string',
                'negara_asal' => 'nullable|string|max:50'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $pengarang = PengarangModel::find($id);
            if ($pengarang) {
                $pengarang->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data pengarang berhasil diupdate'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return redirect('/');
    }

    public function confirm_ajax($id)
    {
        $pengarang = PengarangModel::find($id);
        return view('pengarang.confirm_ajax', ['pengarang' => $pengarang]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $pengarang = PengarangModel::find($id);
            if ($pengarang) {
                $pengarang->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return redirect('/');
    }
}