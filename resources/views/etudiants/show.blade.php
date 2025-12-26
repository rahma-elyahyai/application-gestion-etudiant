@extends('layouts.app')
@section('title','Détails étudiant')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Breadcrumb avec fond coloré -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <li class="breadcrumb-item"><a href="{{ route('etudiants.index') }}" class="text-white text-decoration-none"><i class="bi bi-house-fill me-1"></i>Étudiants</a></li>
            <li class="breadcrumb-item active text-white opacity-75">Détails</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-4 col-md-5 mb-4">
            <!-- Card photo avec dégradé violet -->
            <div class="card shadow-lg border-0 overflow-hidden">
                <div class="card-body text-center p-0">
                    <div class="p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        @if($etudiant->photo)
                            <img src="{{ asset('storage/'.$etudiant->photo) }}" 
                                 class="rounded-circle shadow-lg mb-3" 
                                 width="150" 
                                 height="150"
                                 style="object-fit:cover; border: 5px solid rgba(255,255,255,0.3)"
                                 alt="Photo de {{ $etudiant->prenom }} {{ $etudiant->nom }}">
                        @else
                            <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center mb-3 shadow-lg" 
                                 style="width: 150px; height: 150px; font-size: 3rem; font-weight: 700; border: 5px solid rgba(255,255,255,0.3); color: #667eea;">
                                {{ strtoupper(substr($etudiant->prenom, 0, 1)) }}{{ strtoupper(substr($etudiant->nom, 0, 1)) }}
                            </div>
                        @endif
                        
                        <h4 class="mb-1 fw-bold text-white">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h4>
                        <p class="text-white mb-0 opacity-75">
                            <i class="bi bi-person-badge"></i> {{ $etudiant->num_apogee }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-7">
            <!-- Card informations avec header coloré -->
            <div class="card shadow-lg border-0 mb-4 overflow-hidden">
                <div class="card-header border-0 py-3" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <h5 class="mb-0 fw-bold text-white">
                        <i class="bi bi-info-circle me-2"></i>Informations personnelles
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Numéro Apogée avec dégradé rose -->
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

                        <!-- Nom complet avec dégradé bleu -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <div class="d-flex align-items-start text-white">
                                    <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                        <i class="bi bi-person-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <small class="d-block opacity-75 mb-1">Nom complet</small>
                                        <strong class="fs-5">{{ $etudiant->nom }} {{ $etudiant->prenom }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email avec dégradé orange -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                <div class="d-flex align-items-start text-white">
                                    <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                        <i class="bi bi-envelope-fill fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <small class="d-block opacity-75 mb-1">Email</small>
                                        @if($etudiant->email)
                                            <strong class="fs-6 text-break">{{ $etudiant->email }}</strong>
                                        @else
                                            <span class="fst-italic opacity-75">Non renseigné</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Téléphone avec dégradé vert -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                                <div class="d-flex align-items-start text-white">
                                    <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                        <i class="bi bi-telephone-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <small class="d-block opacity-75 mb-1">Téléphone</small>
                                        @if($etudiant->tele)
                                            <strong class="fs-5">{{ $etudiant->tele }}</strong>
                                        @else
                                            <span class="fst-italic opacity-75">Non renseigné</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions avec boutons colorés -->
            <div class="d-flex gap-3">
                <a href="{{ route('etudiants.edit',$etudiant) }}" class="btn btn-lg shadow-lg border-0 text-white" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <i class="bi bi-pencil-square me-1"></i> Modifier
                </a>
                <a href="{{ route('etudiants.index') }}" class="btn btn-lg shadow-lg border-0 text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="bi bi-arrow-left me-1"></i> Retour
                </a>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Animation des boutons */
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
    }
    
    /* Animation des cards d'informations */
    .col-md-6 > div {
        transition: all 0.3s ease;
    }
    
    .col-md-6 > div:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
    }
</style>
@endpush
@endsection