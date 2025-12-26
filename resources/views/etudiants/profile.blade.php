@extends('layouts.app')
@section('title','Mon Profil')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- En-tête avec dégradé coloré -->
    <div class="mb-4 p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <h3 class="mb-1 fw-bold text-white">
            <i class="bi bi-person-circle me-2"></i>Mon Profil
        </h3>
        <p class="text-white mb-0 opacity-75">Consultez vos informations personnelles</p>
    </div>

    <div class="row">
        <!-- Colonne gauche - Photo et info principale -->
        <div class="col-lg-4 col-md-5 mb-4">
            <!-- Card Photo avec dégradé violet -->
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body text-center p-0">
                    <div class="p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        @if($etudiant->photo)
                            <img src="{{ asset('storage/'.$etudiant->photo) }}" 
                                 class="rounded-circle shadow-lg mb-3" 
                                 width="150" 
                                 height="150"
                                 style="object-fit:cover; border: 5px solid rgba(255,255,255,0.3)"
                                 alt="Photo de profil">
                        @else
                            <div class="rounded-circle bg-white text-primary d-inline-flex align-items-center justify-content-center mb-3 shadow-lg" 
                                 style="width: 150px; height: 150px; font-size: 3rem; font-weight: 700; border: 5px solid rgba(255,255,255,0.3)">
                                {{ strtoupper(substr($etudiant->prenom, 0, 1)) }}{{ strtoupper(substr($etudiant->nom, 0, 1)) }}
                            </div>
                        @endif
                        
                        <h4 class="mb-1 fw-bold text-white">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h4>
                        <p class="text-white mb-3 opacity-75">
                            <i class="bi bi-person-badge me-1"></i>Étudiant
                        </p>
                    </div>
                    
                    <div class="p-3 bg-light">
                        <div class="badge px-3 py-2" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); font-size: 1rem;">
                            <i class="bi bi-hash"></i> {{ $etudiant->num_apogee }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Username avec dégradé vert -->
            <div class="card border-0 shadow-lg mt-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="p-4" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                        <div class="d-flex align-items-center text-white">
                            <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                <i class="bi bi-person-check-fill fs-4"></i>
                            </div>
                            <div>
                                <small class="d-block opacity-75">Nom d'utilisateur</small>
                                <strong class="fs-5">{{ $user->username }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne droite - Informations détaillées -->
        <div class="col-lg-8 col-md-7">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-header border-0 py-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h5 class="mb-0 fw-semibold text-white">
                        <i class="bi bi-info-circle me-2"></i>Informations Personnelles
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Numéro Apogée - Dégradé Rose -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                <div class="d-flex align-items-start text-white">
                                    <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                        <i class="bi bi-hash fs-4"></i>
                                    </div>
                                    <div>
                                        <small class="d-block opacity-75 mb-1">Numéro Apogée</small>
                                        <strong class="fs-5">{{ $etudiant->num_apogee }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nom - Dégradé Bleu -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                <div class="d-flex align-items-start text-white">
                                    <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                        <i class="bi bi-person-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <small class="d-block opacity-75 mb-1">Nom de famille</small>
                                        <strong class="fs-5">{{ $etudiant->nom }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Prénom - Dégradé Vert -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                <div class="d-flex align-items-start text-white">
                                    <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                        <i class="bi bi-person-badge-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <small class="d-block opacity-75 mb-1">Prénom</small>
                                        <strong class="fs-5">{{ $etudiant->prenom }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email - Dégradé Orange -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                <div class="d-flex align-items-start text-white">
                                    <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                        <i class="bi bi-envelope-fill fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <small class="d-block opacity-75 mb-1">Adresse email</small>
                                        @if($etudiant->email)
                                            <strong class="fs-6 text-break">{{ $etudiant->email }}</strong>
                                        @else
                                            <span class="opacity-75 fst-italic">Non renseigné</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Téléphone - Dégradé Violet-Rose -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                                <div class="d-flex align-items-start" style="color: #667eea;">
                                    <div class="bg-white rounded-3 p-3 me-3 shadow-sm">
                                        <i class="bi bi-telephone-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <small class="d-block mb-1" style="color: #764ba2;">Téléphone</small>
                                        @if($etudiant->tele)
                                            <strong class="fs-5">{{ $etudiant->tele }}</strong>
                                        @else
                                            <span class="fst-italic" style="color: #764ba2;">Non renseigné</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card informations supplémentaires avec dégradé -->
            <div class="card border-0 shadow-lg mt-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="p-4" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                        <h6 class="fw-bold mb-3" style="color: #8b4513;">
                            <i class="bi bi-info-circle-fill me-2"></i>Informations
                        </h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2" style="color: #5a3e2b;">
                                <i class="bi bi-check-circle-fill me-2" style="color: #38ef7d;"></i>
                                <small>Pour modifier vos informations, contactez l'administration</small>
                            </li>
                            <li class="mb-2" style="color: #5a3e2b;">
                                <i class="bi bi-check-circle-fill me-2" style="color: #38ef7d;"></i>
                                <small>Votre numéro Apogée est votre identifiant unique</small>
                            </li>
                            <li class="mb-0" style="color: #5a3e2b;">
                                <i class="bi bi-check-circle-fill me-2" style="color: #38ef7d;"></i>
                                <small>Assurez-vous que vos coordonnées sont à jour</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection