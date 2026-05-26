<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('jabatan', 'like', "%{$search}%")
                    ->orWhere('divisi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('divisi') && $request->divisi !== 'Semua') {
            $query->where('divisi', $request->divisi);
        }

        $users = $query
            ->orderBy('role', 'asc')
            ->orderBy('name', 'asc')
            ->paginate(10)
            ->withQueryString();

        $totalAkun = User::count();

        $totalAdmin = User::where('role', 'admin')->count();

        $totalUser = User::where('role', 'user')->count();

        $totalDivisi = User::whereNotNull('divisi')
            ->where('divisi', '!=', '')
            ->distinct('divisi')
            ->count('divisi');

        $divisiList = User::whereNotNull('divisi')
            ->where('divisi', '!=', '')
            ->select('divisi')
            ->distinct()
            ->orderBy('divisi', 'asc')
            ->pluck('divisi');

        $persenUser = $totalAkun > 0
            ? round(($totalUser / $totalAkun) * 100)
            : 0;

        $persenAdmin = $totalAkun > 0
            ? round(($totalAdmin / $totalAkun) * 100)
            : 0;

        return view('admin.akun.index', compact(
            'users',
            'totalAkun',
            'totalAdmin',
            'totalUser',
            'totalDivisi',
            'divisiList',
            'persenUser',
            'persenAdmin'
        ));
    }

    public function create()
    {
        return view('admin.akun.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:50|unique:users,nip',
            'email' => 'required|email|max:255|unique:users,email',
            'divisi' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'role' => 'required|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'nip' => $validated['nip'],
            'email' => $validated['email'],
            'divisi' => $validated['divisi'],
            'jabatan' => $validated['jabatan'] ?? null,
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('admin.akun.index')
            ->with('success', 'Akun berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.akun.index')
                ->with('error', 'Akun admin tidak dapat dihapus.');
        }

        if (auth()->id() == $user->id) {
            return redirect()
                ->route('admin.akun.index')
                ->with('error', 'Akun yang sedang digunakan tidak dapat dihapus.');
        }

        $user->delete();

        return redirect()
            ->route('admin.akun.index')
            ->with('success', 'Akun berhasil dihapus.');
    }
}
