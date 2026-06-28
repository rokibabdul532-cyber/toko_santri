<?php

namespace App\Http\Controllers;

use App\Models\PaketKitabModel;
use App\Models\PaketKitabDetailModel;
use App\Models\KitabModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PaketKitabController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Paket Kitab',
            'list' => ['Home', 'Paket Kitab']
        ];
        $page = (object) [
            'title' => 'Daftar paket kitab yang tersedia'
        ];
        $activeMenu = 'paket_kitab';

        return view('paket_kitab.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $paket = PaketKitabModel::select('paket_id', 'kode_paket', 'nama_paket', 'kelas', 'program', 'harga_paket', 'status');

        return DataTables::of($paket)
            ->addIndexColumn()
            ->addColumn('harga_format', function ($paket) {
                return 'Rp ' . number_format($paket->harga_paket, 0, ',', '.');
            })
            ->addColumn('aksi', function ($paket) {
                $btn = '<button onclick="modalAction(\'' . url('/paket-kitab/' . $paket->paket_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/paket-kitab/' . $paket->paket_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/paket-kitab/' . $paket->paket_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        $kitab = KitabModel::select('kitab_id', 'kode_kitab', 'judul_kitab', 'harga_jual')->where('status', 'aktif')->get();
        return view('paket_kitab.create_ajax', compact('kitab'));
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_paket' => 'required|string|min:3|max:20|unique:paket_kitab,kode_paket',
                'nama_paket' => 'required|string|max:100',
                'kelas' => 'nullable|string|max:50',
                'program' => 'nullable|string|max:100',
                'harga_paket' => 'required|numeric|min:0',
                'status' => 'nullable|in:aktif,nonaktif',
                'kitab_id' => 'required|array|min:1',
                'kitab_id.*' => 'required|integer',
                'jumlah' => 'required|array',
                'jumlah.*' => 'required|integer|min:1'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $paket = PaketKitabModel::create($request->all());

            // Simpan detail paket
            for ($i = 0; $i < count($request->kitab_id); $i++) {
                PaketKitabDetailModel::create([
                    'paket_id' => $paket->paket_id,
                    'kitab_id' => $request->kitab_id[$i],
                    'jumlah' => $request->jumlah[$i]
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data paket kitab berhasil disimpan'
            ]);
        }
        return redirect('/');
    }

    public function show_ajax($id)
    {
        $paket = PaketKitabModel::with(['detail.kitab'])->find($id);
        return view('paket_kitab.show_ajax', ['paket' => $paket]);
    }

    public function edit_ajax($id)
    {
        $paket = PaketKitabModel::with(['detail'])->find($id);
        $kitab = KitabModel::select('kitab_id', 'kode_kitab', 'judul_kitab', 'harga_jual')->where('status', 'aktif')->get();
        return view('paket_kitab.edit_ajax', compact('paket', 'kitab'));
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kode_paket' => 'required|string|min:3|max:20|unique:paket_kitab,kode_paket,' . $id . ',paket_id',
                'nama_paket' => 'required|string|max:100',
                'kelas' => 'nullable|string|max:50',
                'program' => 'nullable|string|max:100',
                'harga_paket' => 'required|numeric|min:0',
                'status' => 'nullable|in:aktif,nonaktif',
                'kitab_id' => 'required|array|min:1',
                'kitab_id.*' => 'required|integer',
                'jumlah' => 'required|array',
                'jumlah.*' => 'required|integer|min:1'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $paket = PaketKitabModel::find($id);
            if ($paket) {
                $paket->update($request->all());

                // Hapus detail lama, buat baru
                PaketKitabDetailModel::where('paket_id', $id)->delete();
                for ($i = 0; $i < count($request->kitab_id); $i++) {
                    PaketKitabDetailModel::create([
                        'paket_id' => $id,
                        'kitab_id' => $request->kitab_id[$i],
                        'jumlah' => $request->jumlah[$i]
                    ]);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Data paket kitab berhasil diupdate'
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
        $paket = PaketKitabModel::find($id);
        return view('paket_kitab.confirm_ajax', ['paket' => $paket]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $paket = PaketKitabModel::find($id);
            if ($paket) {
                PaketKitabDetailModel::where('paket_id', $id)->delete();
                $paket->delete();
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