@extends('layouts.app')
@section('title','Détails étudiant')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f5f3ef 0%, #e8e4df 100%);
        min-height: 100vh;
    }

    .page-container {
        padding: 40px 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .breadcrumb-nav {
        background: white;
        border-radius: 12px;
        padding: 14px 20px;
        margin-bottom: 20px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .breadcrumb {
        margin: 0;
        background: transparent;
        padding: 0;
    }

    .breadcrumb-item a {
        color: #1e40af;
        text-decoration: none;
        font-weight: 500;
    }

    .breadcrumb-item.active {
        color: #6b7280;
    }

    .profile-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-bottom: 24px;
    }

    .profile-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
        padding: 40px 32px;
        text-align: center;
    }

    .profile-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    .profile-avatar-placeholder {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: 700;
        color: #1e3a8a;
        border: 5px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    .profile-name {
        font-size: 1.8rem;
        font-weight: 700;
        color: white;
        margin: 0 0 8px 0;
    }

    .profile-id {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1rem;
        margin: 0;
    }

    .info-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-bottom: 24px;
    }

    .info-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 20px 24px;
        border-bottom: 2px solid #e2e8f0;
    }

    .info-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e3a8a;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-card-body {
        padding: 24px;
    }

    .info-item {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s;
        height: 100%;
    }

    .info-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        border-color: #3b82f6;
    }

    .info-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e40af;
        font-size: 1.2rem;
        margin-bottom: 12px;
    }

    .info-label {
        font-size: 0.8rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        font-weight: 600;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f2937;
        word-break: break-word;
    }

    .info-value-empty {
        color: #9ca3af;
        font-style: italic;
        font-weight: 400;
    }

    .btn-edit {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 14px rgba(59, 130, 246, 0.3);
        text-decoration: none;
        display: inline-block;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        color: white;
    }

    .btn-back {
        background: white;
        color: #4b5563;
        border: 1px solid #e5e7eb;
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-back:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #1f2937;
    }
</style>

<div class="page-container">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('etudiants.index') }}">
                    <i class="bi bi-house-fill me-1"></i>Étudiants
                </a>
            </li>
            <li class="breadcrumb-item active">Détails</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Profile Card -->
        <div class="col-lg-4">
            <div class="profile-card">
                <div class="profile-header">
                    @if($etudiant->photo)
                        <img src="{{ asset('storage/'.$etudiant->photo) }}" 
                             class="profile-avatar" 
                             alt="Photo de {{ $etudiant->prenom }} {{ $etudiant->nom }}">
                    @else
                        <div class="profile-avatar-placeholder">
                            {{ strtoupper(substr($etudiant->prenom, 0, 1)) }}{{ strtoupper(substr($etudiant->nom, 0, 1)) }}
                        </div>
                    @endif
                    
                    <h1 class="profile-name">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h1>
                    <p class="profile-id">
                        <i class="bi bi-person-badge me-1"></i> #{{ $etudiant->num_apogee }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Information Card -->
        <div class="col-lg-8">
            <div class="info-card">
                <div class="info-card-header">
                    <h2 class="info-card-title">
                        <i class="bi bi-info-circle"></i>
                        Informations personnelles
                    </h2>
                </div>
                <div class="info-card-body">
                    <div class="row g-3">
                        <!-- Numéro Apogée -->
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div class="info-label">Numéro Apogée</div>
                                <div class="info-value">{{ $etudiant->num_apogee }}</div>
                            </div>
                        </div>

                        <!-- Nom complet -->
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="info-label">Nom complet</div>
                                <div class="info-value">{{ $etudiant->nom }} {{ $etudiant->prenom }}</div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div class="info-label">Email</div>
                                @if($etudiant->email)
                                    <div class="info-value">{{ $etudiant->email }}</div>
                                @else
                                    <div class="info-value info-value-empty">Non renseigné</div>
                                @endif
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="info-label">Téléphone</div>
                                @if($etudiant->tele)
                                    <div class="info-value">{{ $etudiant->tele }}</div>
                                @else
                                    <div class="info-value info-value-empty">Non renseigné</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="d-flex gap-2">
                <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn-edit">
                    <i class="bi bi-pencil-square me-1"></i> Modifier
                </a>
                <a href="{{ route('etudiants.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left me-1"></i> Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection