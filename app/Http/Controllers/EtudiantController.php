<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::orderBy('id', 'desc')->paginate(10);
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Etudiant
            'num_apogee' => ['required', 'string', 'max:50', 'unique:etudiants,num_apogee'],
            'nom' => ['required', 'string', 'max:120'],
            'prenom' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:255'],
            'tele' => ['nullable', 'string', 'max:30'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        DB::transaction(function () use ($request, $validated) {

            // 1) créer user étudiant
            $user = User::create([
                'name' => $validated['nom'].' '.$validated['prenom'],
                'email' => $validated['email'] ?? null,
                'password' => Hash::make($validated['password']),
                'role' => 'ETUDIANT',
            ]);

            // 2) photo
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('etudiants', 'public');
            }

            // 3) créer etudiant lié
            \App\Models\Etudiant::create([
                'user_id' => $user->id,
                'num_apogee' => $validated['num_apogee'],
                'nom' => $validated['nom'],
                'prenom' => $validated['prenom'],
                'email' => $validated['email'] ?? null,
                'tele' => $validated['tele'] ?? null,
                'photo' => $photoPath,
            ]);
        });

        return redirect()->route('etudiants.index')->with('success', 'Étudiant + compte créé avec succès.');
    }


    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, Etudiant $etudiant)
    {
        $validated = $request->validate([
            'num_apogee' => ['required', 'string', 'max:50', 'unique:etudiants,num_apogee,' . $etudiant->id],
            'nom' => ['required', 'string', 'max:120'],
            'prenom' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:255'],
            'tele' => ['nullable', 'string', 'max:30'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            // supprimer ancienne photo si existe
            if ($etudiant->photo && Storage::disk('public')->exists($etudiant->photo)) {
                Storage::disk('public')->delete($etudiant->photo);
            }
            $validated['photo'] = $request->file('photo')->store('etudiants', 'public');
        }

        $etudiant->update($validated);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant modifié avec succès.');
    }

    public function destroy(Etudiant $etudiant)
    {
        if ($etudiant->photo && Storage::disk('public')->exists($etudiant->photo)) {
            Storage::disk('public')->delete($etudiant->photo);
        }

        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
