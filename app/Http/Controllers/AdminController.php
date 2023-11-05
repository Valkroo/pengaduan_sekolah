<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $user = Auth::user();
        $report = Report::all();
        
        return view('admin.dashboard',[
            'users' => $user,
            'pengaduan' => $report,
        ]);
    }
    
    public function editPengaduan($id) {
        $report = Report::find($id);
        return view('admin.edit', [
            'users' => Auth::user(),
            'report' => $report,
            'status' => $report->status,
        ]);
    }

    public function updatePengaduan(Request $request, $id) {
        $validate = $request->validate([
        'tanggal' => 'required',
        'lokasi' => 'required',
        'status' => 'required',
        'pesan_pengaduan' => 'required',
    ]);
    $data = Report::find($id);
    $data->tanggal = $validate['tanggal'];
    $data->lokasi = $validate['lokasi'];
    $data->status = $validate['status'];
    $data->pesan_pengaduan = $validate['pesan_pengaduan'];
    $data->update();
    return redirect('/admin/dashboard')->with('success', 'Laporan Berhasil di Edit');
    }

    public function destroyPengaduan($id) {
        $data = Report::find($id);
        $data->delete();
        return redirect('/admin/dashboard')->with('success', 'Laporan Berhasil di Hapus');
    }

    public function listUser() {
        $user = Auth::user();
        $list = User::all();
        
        return view('admin.listUser',[
            'users' => $user,
            'list' => $list,
        ]);
    }

    public function editUser($id) {
        $user = User::find($id);
        return view('admin.editUser', [
            'users' => $user,
            'jurusan' => $user->jurusan,
            'jenis_kelamin' => $user->jenis_kelamin,
        ]);
    }

    public function updateUser(Request $request, $id) {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'kelas' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'jurusan' => 'required|max:255',
        ]);

        $user = User::where('id', $id)->first();
        $user->nama = $validate['nama'];
        $user->kelas = $validate['kelas'];
        $user->jenis_kelamin = $validate['jenis_kelamin'];
        $user->jurusan = $validate['jurusan'];
        $user->update();
        return redirect('/admin/dashboard/daftar-user')->with('success', 'User Berhasil di Edit');
    }

    public function destroyUser($id) {
        $data = User::find($id);
        $data->delete();
        return redirect('/admin/dashboard/daftar-user')->with('success', 'User Berhasil di Hapus');
    }
}
