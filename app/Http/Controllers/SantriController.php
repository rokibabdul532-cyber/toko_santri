<?php

namespace App\Http\Controllers;

use App\Models\SantriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SantriController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Santri',
            'list' => ['Home', 'Santri']
        ];
        $page = (object) [
            'title' => 'Daftar santri yang terdaftar'
        ];
        $activeMenu = 'santri';

        return view('santri.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $santri = SantriModel::select('santri_id', 'kode_santri', 'nama_santri', 'kelas', 'program', 'status');

        return DataTables::of($santri)
            ->addIndexColumn()
            ->addColumn('aksi', function ($santri) {
                $btn = '<button onclick="modalAction(\'' . url('/santri/' . $santri->santri_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/santri/' . $santri->santri_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/santri/' . $santri->santri_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        return view('santri.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_santri' => 'required|string|min:3|max:20|unique:santri,kode_santri',
                'nama_santri' => 'required|string|max:100',
                'nama_panggilan' => 'nullable|string|max:50',
                'tempat_lahir' => 'nullable|string|max:50',
                'tanggal_lahir' => 'nullable|date',
                'jenis_kelamin' => 'nullable|in:L,P',
                'alamat' => 'nullable|string',
                'no_telepon' => 'nullable|string|max:15',
                'email' => 'nullable|email|max:100',
                'nama_orang_tua' => 'nullable|string|max:100',
                'no_telepon_orang_tua' => 'nullable|string|max:15',
                'kelas' => 'nullable|string|max:50',
                'program' => 'nullable|string|max:100',
                'tanggal_masuk' => 'nullable|date',
                'status' => 'nullable|in:aktif,nonaktif'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            SantriModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data santri berhasil disimpan'
            ]);
        }
        return redirect('/');
    }

    public function show_ajax($id)
    {
        $santri = SantriModel::find($id);
        return view('santri.show_ajax', ['santri' => $santri]);
    }

    public function edit_ajax($id)
    {
        $santri = SantriModel::find($id);
        return view('santri.edit_ajax', ['santri' => $santri]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_santri' => 'required|string|min:3|max:20|unique:santri,kode_santri,' . $id . ',santri_id',
                'nama_santri' => 'required|string|max:100',
                'nama_panggilan' => 'nullable|string|max:50',
                'tempat_lahir' => 'nullable|string|max:50',
                'tanggal_lahir' => 'nullable|date',
                'jenis_kelamin' => 'nullable|in:L,P',
                'alamat' => 'nullable|string',
                'no_telepon' => 'nullable|string|max:15',
                'email' => 'nullable|email|max:100',
                'nama_orang_tua' => 'nullable|string|max:100',
                'no_telepon_orang_tua' => 'nullable|string|max:15',
                'kelas' => 'nullable|string|max:50',
                'program' => 'nullable|string|max:100',
                'tanggal_masuk' => 'nullable|date',
                'status' => 'nullable|in:aktif,nonaktif'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $santri = SantriModel::find($id);
            if ($santri) {
                $santri->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data santri berhasil diupdate'
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
        $santri = SantriModel::find($id);
        return view('santri.confirm_ajax', ['santri' => $santri]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $santri = SantriModel::find($id);
            if ($santri) {
                $santri->delete();
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