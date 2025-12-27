@extends('layouts.app')
@section('title','Ajouter étudiant')

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

    .page-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
        border-radius: 16px;
        padding: 28px 32px;
        margin-bottom: 28px;
        box-shadow: 0 4px 20px rgba(30, 58, 138, 0.15);
    }

    .page-title {
        font-size: 1.6rem;
        font-weight: 600;
        color: white;
        margin: 0 0 6px 0;
    }

    .page-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.9rem;
        margin: 0;
    }

    .form-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    .form-section {
        padding: 24px;
        border-bottom: 1px solid #f3f4f6;
    }

    .form-section:last-child {
        border-bottom: none;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e5e7eb;
    }

    .section-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e40af;
        font-size: 1.1rem;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e3a8a;
        margin: 0;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .required {
        color: #dc2626;
    }

    .form-control {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s;
        background: #f9fafb;
    }

    .form-control:focus {
        background: white;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .form-text {
        color: #6b7280;
        font-size: 0.85rem;
        margin-top: 6px;
    }

    .alert-custom {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        border: 1px solid #fca5a5;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 20px;
        color: #991b1b;
    }

    .btn-submit {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 14px rgba(59, 130, 246, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        color: white;
    }

    .btn-cancel {
        background: white;
        color: #4b5563;
        border: 1px solid #e5e7eb;
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #1f2937;
    }

    .sidebar-card {
        background: white;
        border-radius: 14px;
        padding: 24px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 16px;
    }

    .sidebar-header {
        font-size: 1rem;
        font-weight: 600;
        color: #1e3a8a;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .info-list li {
        color: #4b5563;
        font-size: 0.85rem;
        margin-bottom: 12px;
        display: flex;
        gap: 8px;
        line-height: 1.5;
    }

    .info-list li i {
        color: #10b981;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .preview-container {
        margin-top: 16px;
        display: none;
    }

    .preview-image {
        width: 120px;
        height: 120px;
        border-radius: 12px;
        object-fit: cover;
        border: 3px solid #dbeafe;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
            <li class="breadcrumb-item active">Nouveau</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="bi bi-person-plus-fill me-2"></i>Ajouter un étudiant
        </h1>
        <p class="page-subtitle">Remplissez le formulaire pour créer un nouveau profil étudiant</p>
    </div>

    <div class="row">
        <!-- Formulaire -->
        <div class="col-lg-8">
            <div class="form-card">
                @if($errors->any())
                    <div class="alert-custom">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                            <div class="flex-grow-1">
                                <strong>Erreur!</strong> Veuillez corriger les champs suivants :
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Section Identité -->
                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="bi bi-person-vcard"></i>
                            </div>
                            <h3 class="section-title">Identité</h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">
                                    Numéro Apogée <span class="required">*</span>
                                </label>
                                <input name="num_apogee" 
                                       value="{{ old('num_apogee') }}" 
                                       class="form-control @error('num_apogee') is-invalid @enderror" 
                                       placeholder="Ex: 12345678"
                                       required>
                                @error('num_apogee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Nom <span class="required">*</span>
                                </label>
                                <input name="nom" 
                                       value="{{ old('nom') }}" 
                                       class="form-control @error('nom') is-invalid @enderror"
                                       placeholder="Ex: Alami"
                                       required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Prénom <span class="required">*</span>
                                </label>
                                <input name="prenom" 
                                       value="{{ old('prenom') }}" 
                                       class="form-control @error('prenom') is-invalid @enderror"
                                       placeholder="Ex: Ahmed"
                                       required>
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section Contact -->
                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <h3 class="section-title">Coordonnées</h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="exemple@email.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Téléphone</label>
                                <input name="tele" 
                                       value="{{ old('tele') }}" 
                                       class="form-control @error('tele') is-invalid @enderror"
                                       placeholder="Ex: 0612345678">
                                @error('tele')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section Photo -->
                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="bi bi-camera"></i>
                            </div>
                            <h3 class="section-title">Photo de profil</h3>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Photo (optionnel)</label>
                                <input type="file" 
                                       name="photo" 
                                       class="form-control @error('photo') is-invalid @enderror"
                                       accept="image/*"
                                       id="photoInput">
                                <div class="form-text">Formats acceptés: JPG, PNG, GIF (max 2 Mo)</div>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                <div class="preview-container" id="photoPreview">
                                    <label class="form-label">Prévisualisation</label>
                                    <div>
                                        <img id="previewImage" class="preview-image" alt="Prévisualisation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Mot de passe -->
                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <h3 class="section-title">Sécurité</h3>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mot de passe <span class="required">*</span></label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="form-section">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn-submit">
                                <i class="bi bi-check-circle me-1"></i> Enregistrer
                            </button>
                            <a href="{{ route('etudiants.index') }}" class="btn-cancel">
                                <i class="bi bi-x-circle me-1"></i> Annuler
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-card">
                <div class="sidebar-header">
                    <i class="bi bi-lightbulb-fill"></i>
                    <span>Conseils</span>
                </div>
                <ul class="info-list">
                    <li>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Les champs marqués d'un <span class="required">*</span> sont obligatoires</span>
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Le numéro Apogée doit être unique</span>
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>L'email sera utilisé pour les communications</span>
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>La photo doit être au format JPG, PNG ou GIF</span>
                    </li>
                </ul>
            </div>

            <div class="sidebar-card">
                <div class="sidebar-header">
                    <i class="bi bi-question-circle-fill"></i>
                    <span>Besoin d'aide ?</span>
                </div>
                <p style="color: #6b7280; font-size: 0.9rem; margin: 0; line-height: 1.6;">
                    Si vous rencontrez des difficultés lors de l'ajout d'un étudiant, 
                    contactez le support technique.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // Prévisualisation de la photo
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('photoPreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection