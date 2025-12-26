@extends('layouts.app')
@section('title','Ajouter étudiant')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Breadcrumb avec fond coloré -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <li class="breadcrumb-item"><a href="{{ route('etudiants.index') }}" class="text-white text-decoration-none"><i class="bi bi-house-fill me-1"></i>Étudiants</a></li>
            <li class="breadcrumb-item active text-white opacity-75">Nouveau</li>
        </ol>
    </nav>

    <!-- En-tête avec dégradé -->
    <div class="mb-4 p-4 rounded-3 shadow-lg" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
        <h3 class="mb-1 fw-bold text-white">
            <i class="bi bi-person-plus-fill me-2"></i>Ajouter un étudiant
        </h3>
        <p class="text-white mb-0 opacity-75">Remplissez le formulaire pour créer un nouveau profil étudiant</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert shadow-sm border-0" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);" role="alert">
                            <div class="d-flex align-items-start text-white">
                                <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                                <div class="flex-grow-1">
                                    <strong>Erreur!</strong> Veuillez corriger les champs suivants :
                                    <ul class="mb-0 mt-2">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Section Identité avec dégradé -->
                        <div class="mb-4 p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);">
                            <h5 class="fw-bold mb-3 pb-2 border-bottom border-white border-opacity-25 text-white">
                                <i class="bi bi-person-vcard me-2"></i>Identité
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-white">
                                        Numéro Apogée <span style="color: #f5576c;">*</span>
                                    </label>
                                    <input name="num_apogee" 
                                           value="{{ old('num_apogee') }}" 
                                           class="form-control form-control-lg border-0 shadow-sm @error('num_apogee') is-invalid @enderror" 
                                           placeholder="Ex: 12345678"
                                           required>
                                    @error('num_apogee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-white">
                                        Nom <span style="color: #f5576c;">*</span>
                                    </label>
                                    <input name="nom" 
                                           value="{{ old('nom') }}" 
                                           class="form-control form-control-lg border-0 shadow-sm @error('nom') is-invalid @enderror"
                                           placeholder="Ex: Alami"
                                           required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-white">
                                        Prénom <span style="color: #f5576c;">*</span>
                                    </label>
                                    <input name="prenom" 
                                           value="{{ old('prenom') }}" 
                                           class="form-control form-control-lg border-0 shadow-sm @error('prenom') is-invalid @enderror"
                                           placeholder="Ex: Ahmed"
                                           required>
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section Contact avec dégradé -->
                        <div class="mb-4 p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                            <h5 class="fw-bold mb-3 pb-2 border-bottom border-white border-opacity-25" style="color: #8b4513;">
                                <i class="bi bi-telephone me-2"></i>Coordonnées
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #8b4513;">Email</label>
                                    <input type="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           class="form-control form-control-lg border-0 shadow-sm @error('email') is-invalid @enderror"
                                           placeholder="exemple@email.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #8b4513;">Téléphone</label>
                                    <input name="tele" 
                                           value="{{ old('tele') }}" 
                                           class="form-control form-control-lg border-0 shadow-sm @error('tele') is-invalid @enderror"
                                           placeholder="Ex: 0612345678">
                                    @error('tele')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section Photo avec dégradé -->
                        <div class="mb-4 p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                            <h5 class="fw-bold mb-3 pb-2 border-bottom border-white border-opacity-25" style="color: #667eea;">
                                <i class="bi bi-camera me-2"></i>Photo de profil
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold" style="color: #764ba2;">Photo (optionnel)</label>
                                    <input type="file" 
                                           name="photo" 
                                           class="form-control form-control-lg border-0 shadow-sm @error('photo') is-invalid @enderror"
                                           accept="image/*"
                                           id="photoInput">
                                    <small style="color: #764ba2;">Formats acceptés: JPG, PNG, GIF (max 2 Mo)</small>
                                    @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    
                                    <!-- Prévisualisation de l'image -->
                                    <div id="photoPreview" class="mt-3" style="display: none;">
                                        <label class="form-label fw-semibold d-block" style="color: #764ba2;">Prévisualisation</label>
                                        <img id="previewImage" 
                                             width="120" 
                                             height="120" 
                                             class="rounded-3 shadow-lg"
                                             style="object-fit:cover; border: 4px solid white"
                                             alt="Prévisualisation">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section Mot de passe avec dégradé -->
                        <div class="mb-4 p-4 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <h5 class="fw-bold mb-3 pb-2 border-bottom border-white border-opacity-25 text-white">
                                <i class="bi bi-lock-fill me-2"></i>Sécurité
                            </h5>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-white">Mot de passe <span style="color: #ffe066;">*</span></label>
                                <input type="password" name="password" class="form-control form-control-lg border-0 shadow-sm" required>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex gap-2 pt-3">
                            <button type="submit" class="btn btn-lg shadow-lg px-4 border-0 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                                <i class="bi bi-check-circle me-1"></i> Enregistrer
                            </button>
                            <a href="{{ route('etudiants.index') }}" class="btn btn-lg shadow px-4 border-0 text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="bi bi-x-circle me-1"></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar avec informations -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-0">
                    <div class="p-4" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <h6 class="fw-bold mb-3 text-white">
                            <i class="bi bi-lightbulb-fill me-2"></i>Conseils
                        </h6>
                        <ul class="list-unstyled mb-0 text-white">
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <small>Les champs marqués d'un <span style="color: #f5576c; font-weight: bold;">*</span> sont obligatoires</small>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <small>Le numéro Apogée doit être unique</small>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <small>L'email sera utilisé pour les communications</small>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <small>La photo doit être au format JPG, PNG ou GIF</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-lg mt-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="p-4" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <h6 class="fw-bold mb-3 text-white">
                            <i class="bi bi-question-circle-fill me-2"></i>Besoin d'aide ?
                        </h6>
                        <p class="small mb-0 text-white opacity-75">
                            Si vous rencontrez des difficultés lors de l'ajout d'un étudiant, 
                            contactez le support technique.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
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
@endpush
@endsection