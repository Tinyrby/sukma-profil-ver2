<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Kk;
use App\Models\MutasiPenduduk;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $totalPenduduk = Penduduk::count();
        $totalKk = Kk::count();
        $totalMutasi = MutasiPenduduk::count();

        // Data untuk chart
        $dusunData = Dusun::withCount('penduduk')->get();

        $kkByGender = [
            'laki-laki' => Penduduk::where('status_keluarga', 'kepala keluarga')
                ->where('jenis_kelamin', 'L')->count(),
            'perempuan' => Penduduk::where('status_keluarga', 'kepala keluarga')
                ->where('jenis_kelamin', 'P')->count(),
        ];

        // Data untuk chart penduduk per dusun
        $chartLabels = [];
        $chartData = [];
        foreach ($dusunData as $dusun) {
            $chartLabels[] = $dusun->nama_dusun;
            $chartData[] = $dusun->penduduk_count;
        }

        // Mutasi terbaru
        $mutasiTerbaru = MutasiPenduduk::with('penduduk')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalPenduduk',
            'totalKk',
            'totalMutasi',
            'chartLabels',
            'chartData',
            'kkByGender',
            'mutasiTerbaru'
        ));
    }

    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // Simulasi login sederhana
        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect('/');
    }
}