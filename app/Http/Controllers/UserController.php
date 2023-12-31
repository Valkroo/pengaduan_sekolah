<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $report = Report::where('user_id', $user->id)->get();
        
        return view('user.dashboard',[
            'users' => $user,
            'pengaduan' => $report,
        ]);
    }
    public function pengaduan() {
        return view('user.pengaduan', [
            'users' => Auth::user()
        ]);
    }

    public function storePengaduan(Request $request) {
        $validate = $request->validate([
        'tanggal' => 'required',
        'lokasi' => 'required',
        'pesan_pengaduan' => 'required',
    ]);
        $data = new Report();
        $data->user_id = Auth::user()->id;
        $data->tanggal = $validate['tanggal'];
        $data->lokasi = $validate['lokasi'];
        $data->pesan_pengaduan = $validate['pesan_pengaduan'];
        $data->save();
        return redirect('/dashboard')->with('success', 'Laporan Berhasil di Buat');
    }

    public function editPengaduan($id) {
        $report = Report::find($id);
        if($report->user_id !== auth()->user()->id)
        {
            abort(403);
        }
        return view('user.edit', [
            'users' => Auth::user(),
            'report' => $report,
        ]);
    }

    public function updatePengaduan(Request $request, $id) {
        $validate = $request->validate([
        'tanggal' => 'required',
        'lokasi' => 'required',
        'pesan_pengaduan' => 'required',
    ]);
    $data = Report::find($id);
    $data->user_id = Auth::user()->id;
    $data->tanggal = $validate['tanggal'];
    $data->lokasi = $validate['lokasi'];
    $data->pesan_pengaduan = $validate['pesan_pengaduan'];
    $data->update();
    return redirect('/dashboard')->with('success', 'Laporan Berhasil di Edit');
    }

    public function destroyPengaduan($id) {
        $data = Report::find($id);
        $data->delete();
        return redirect('/dashboard')->with('success', 'Laporan Berhasil di Hapus');
    }

    public function profil() {
        $user = Auth::user();
        return view('user.profil', [
            'users' => $user,
            'jurusan' => $user->jurusan,
            'jenis_kelamin' => $user->jenis_kelamin,
        ]);
    }

    public function updateProfil(Request $request) {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'kelas' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'jurusan' => 'required|max:255',
        ]);

        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $user->nama = $validate['nama'];
        $user->kelas = $validate['kelas'];
        $user->jenis_kelamin = $validate['jenis_kelamin'];
        $user->jurusan = $validate['jurusan'];
        $user->update();
        return redirect('/dashboard')->with('success', 'User Berhasil di Edit');
    }
}
