<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    public function show()
{
    $user = Auth::user();

    if ($user->role === 'ADMIN') {
        return redirect()->route('etudiants.index');
    }

    $etudiant = $user->etudiant;

    if (!$etudiant) {
        // IMPORTANT: pas de 404
        return view('etudiants.no-profile');
    }

    return view('etudiants.profile', compact('user', 'etudiant'));
}

}
