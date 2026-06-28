<?php

namespace App\Http\Controllers;

use App\Models\PelangganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PelangganController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pelanggan',
            'list' => ['Home', 'Pelanggan']
        ];
        $page = (object) [
            'title' => 'Daftar pelanggan toko'
        ];
        $activeMenu = 'pelanggan';

        return view('pelanggan.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $pelanggan = PelangganModel::select('pelanggan_id', 'kode_pelanggan', 'nama_pelanggan', 'alamat', 'no_telepon', 'email');

        return DataTables::of($pelanggan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pelanggan) {
                $btn = '<button onclick="modalAction(\'' . url('/pelanggan/' . $pelanggan->pelanggan_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/pelanggan/' . $pelanggan->pelanggan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        return view('pelanggan.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_pelanggan' => 'required|string|min:3|max:20|unique:pelanggan,kode_pelanggan',
                'nama_pelanggan' => 'required|string|max:100',
                'alamat' => 'nullable|string',
                'no_telepon' => 'nullable|string|max:15',
                'email' => 'nullable|email|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            PelangganModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data pelanggan berhasil disimpan'
            ]);
        }
        return redirect('/');
    }

    public function edit_ajax($id)
    {
        $pelanggan = PelangganModel::find($id);
        return view('pelanggan.edit_ajax', ['pelanggan' => $pelanggan]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_pelanggan' => 'required|string|min:3|max:20|unique:pelanggan,kode_pelanggan,' . $id . ',pelanggan_id',
                'nama_pelanggan' => 'required|string|max:100',
                'alamat' => 'nullable|string',
                'no_telepon' => 'nullable|string|max:15',
                'email' => 'nullable|email|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $pelanggan = PelangganModel::find($id);
            if ($pelanggan) {
                $pelanggan->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data pelanggan berhasil diupdate'
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
        $pelanggan = PelangganModel::find($id);
        return view('pelanggan.confirm_ajax', ['pelanggan' => $pelanggan]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $pelanggan = PelangganModel::find($id);
            if ($pelanggan) {
                $pelanggan->delete();
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