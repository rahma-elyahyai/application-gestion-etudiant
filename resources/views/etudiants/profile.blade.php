@extends('layouts.app')
@section('title','Mon Profil')

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
        background: linear-gradient(135deg, #2b5cd6 0%, #1e3a8a 100%);
        padding: 50px 32px;
        text-align: center;
        position: relative;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>') repeat;
        opacity: 0.3;
    }

    .profile-avatar-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 24px;
    }

    .profile-avatar {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .profile-avatar-placeholder {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        font-weight: 700;
        color: #2b5cd6;
        border: 6px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .profile-name {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin: 0 0 8px 0;
        position: relative;
        z-index: 1;
    }

    .profile-id-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.95);
        padding: 8px 24px;
        border-radius: 25px;
        color: #2b5cd6;
        font-weight: 700;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        position: relative;
        z-index: 1;
    }

    .username-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-bottom: 24px;
    }

    .username-header {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .username-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .username-content {
        flex: 1;
    }

    .username-label {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 4px;
    }

    .username-value {
        font-size: 1.3rem;
        font-weight: 700;
        color: white;
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
        background: #f8fafc;
        padding: 24px;
        border-bottom: 1px solid #e5e7eb;
    }

    .info-card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1f2937;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-card-title i {
        color: #2b5cd6;
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
        border-color: #667eea;
    }

    .info-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        margin-bottom: 12px;
    }

    .info-icon.icon-apogee {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .info-icon.icon-name {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .info-icon.icon-email {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }

    .info-icon.icon-phone {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
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

    .notice-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    .notice-header {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        padding: 24px;
        border-bottom: 1px solid #fcd34d;
    }

    .notice-title {
        font-size: 1rem;
        font-weight: 600;
        color: #92400e;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .notice-title i {
        color: #d97706;
    }

    .notice-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .notice-list li {
        color: #5a3e2b;
        padding: 12px 0;
        display: flex;
        align-items: start;
        gap: 10px;
        border-bottom: 1px solid rgba(139, 69, 19, 0.1);
    }

    .notice-list li:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .notice-icon {
        color: #38ef7d;
        font-size: 1rem;
        margin-top: 2px;
    }
</style>

<div class="page-container">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    <i class="bi bi-house-fill me-1"></i>Accueil
                </a>
            </li>
            <li class="breadcrumb-item active">Mon Profil</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Colonne gauche - Photo et informations principales -->
        <div class="col-lg-4">
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-avatar-wrapper">
                        @if($etudiant->photo)
                            <img src="{{ asset('storage/'.$etudiant->photo) }}" 
                                 class="profile-avatar" 
                                 alt="Photo de profil">
                        @else
                            <div class="profile-avatar-placeholder">
                                {{ strtoupper(substr($etudiant->prenom, 0, 1)) }}{{ strtoupper(substr($etudiant->nom, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    
                    <h1 class="profile-name">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h1>
                    <div class="profile-id-badge">
                        <i class="bi bi-hash"></i>{{ $etudiant->num_apogee }}
                    </div>
                </div>
            </div>

            <!-- Username Card -->
            <div class="username-card">
                <div class="username-header">
                    <div class="username-icon">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="username-content">
                        <div class="username-label">Nom d'utilisateur</div>
                        <h3 class="username-value">{{ $user->username }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne droite - Informations détaillées -->
        <div class="col-lg-8">
            <!-- Information Card -->
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
                                <div class="info-icon icon-apogee">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <div class="info-label">Numéro Apogée</div>
                                <div class="info-value">{{ $etudiant->num_apogee }}</div>
                            </div>
                        </div>

                        <!-- Nom -->
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-icon icon-name">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="info-label">Nom de famille</div>
                                <div class="info-value">{{ $etudiant->nom }}</div>
                            </div>
                        </div>

                        <!-- Prénom -->
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-icon icon-prenom">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <div class="info-label">Prénom</div>
                                <div class="info-value">{{ $etudiant->prenom }}</div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-icon icon-email">
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
                                <div class="info-icon icon-phone">
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

            <!-- Notice Card -->
            <div class="notice-card">
                <div class="notice-header">
                    <h3 class="notice-title">
                        <i class="bi bi-info-circle-fill"></i>
                        Informations importantes
                    </h3>
                </div>
                <div class="info-card-body">
                    <ul class="notice-list">
                        <li>
                            <i class="bi bi-check-circle-fill notice-icon"></i>
                            <small>Pour modifier vos informations, contactez l'administration</small>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill notice-icon"></i>
                            <small>Votre numéro Apogée est votre identifiant unique</small>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill notice-icon"></i>
                            <small>Assurez-vous que vos coordonnées sont à jour</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection