<?php

namespace App\Http\Controllers;

use App\Models\PenerbitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PenerbitController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penerbit',
            'list' => ['Home', 'Penerbit']
        ];
        $page = (object) [
            'title' => 'Daftar penerbit kitab'
        ];
        $activeMenu = 'penerbit';

        return view('penerbit.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $penerbit = PenerbitModel::select('penerbit_id', 'kode_penerbit', 'nama_penerbit', 'alamat', 'no_telepon', 'email');

        return DataTables::of($penerbit)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penerbit) {
                $btn = '<button onclick="modalAction(\'' . url('/penerbit/' . $penerbit->penerbit_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penerbit/' . $penerbit->penerbit_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        return view('penerbit.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_penerbit' => 'required|string|min:3|max:20|unique:penerbit,kode_penerbit',
                'nama_penerbit' => 'required|string|max:100',
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

            PenerbitModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data penerbit berhasil disimpan'
            ]);
        }
        return redirect('/');
    }

    public function edit_ajax($id)
    {
        $penerbit = PenerbitModel::find($id);
        return view('penerbit.edit_ajax', ['penerbit' => $penerbit]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_penerbit' => 'required|string|min:3|max:20|unique:penerbit,kode_penerbit,' . $id . ',penerbit_id',
                'nama_penerbit' => 'required|string|max:100',
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

            $penerbit = PenerbitModel::find($id);
            if ($penerbit) {
                $penerbit->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data penerbit berhasil diupdate'
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
        $penerbit = PenerbitModel::find($id);
        return view('penerbit.confirm_ajax', ['penerbit' => $penerbit]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $penerbit = PenerbitModel::find($id);
            if ($penerbit) {
                $penerbit->delete();
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