@extends('layouts.app')
@section('title','Liste des étudiants')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- En-tête avec dégradé -->
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-3 shadow-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div>
            <h3 class="mb-1 fw-bold text-white">
                <i class="bi bi-people-fill me-2"></i>Liste des étudiants
            </h3>
            <p class="text-white mb-0 opacity-75">Gérez vos étudiants et leurs informations</p>
        </div>
        <a href="{{ route('etudiants.create') }}" class="btn btn-lg shadow-lg border-0 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
            <i class="bi bi-plus-circle me-1"></i> Ajouter un étudiant
        </a>
    </div>

    <!-- Statistiques rapides avec dégradés -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-0">
                    <div class="p-4" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="d-flex align-items-center text-white">
                            <div class="bg-white bg-opacity-25 rounded-3 p-3 me-3">
                                <i class="bi bi-people-fill fs-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 opacity-75">Total étudiants</h6>
                                <h3 class="mb-0 fw-bold">{{ $etudiants->total() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau avec design coloré -->
    <div class="card border-0 shadow-lg">
        <div class="card-header border-0 py-3" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <h5 class="mb-0 fw-semibold text-white">
                <i class="bi bi-table me-2"></i>Tous les étudiants
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);">
                        <tr>
                            <th class="px-4 py-3 border-0 text-white fw-bold">Étudiant</th>
                            <th class="py-3 border-0 text-white fw-bold">Num Apogée</th>
                            <th class="py-3 border-0 text-white fw-bold">Email</th>
                            <th class="py-3 border-0 text-white fw-bold">Téléphone</th>
                            <th class="py-3 border-0 text-end pe-4 text-white fw-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($etudiants as $e)
                        <tr class="border-bottom" style="transition: all 0.3s ease;">
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    @if($e->photo)
                                        <img src="{{ asset('storage/'.$e->photo) }}" 
                                             width="50" 
                                             height="50" 
                                             class="rounded-circle me-3 shadow"
                                             style="object-fit:cover; border: 3px solid #e0c3fc"
                                             alt="{{ $e->prenom }} {{ $e->nom }}">
                                    @else
                                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center me-3 shadow-sm"
                                             style="width: 50px; height: 50px; font-size: 1rem; font-weight: 700; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: 3px solid #e0c3fc">
                                            {{ strtoupper(substr($e->prenom, 0, 1)) }}{{ strtoupper(substr($e->nom, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-bold" style="color: #667eea;">{{ $e->prenom }} {{ $e->nom }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge shadow-sm px-3 py-2" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); font-size: 0.85rem;">
                                    <i class="bi bi-hash"></i>{{ $e->num_apogee }}
                                </span>
                            </td>
                            <td class="py-3">
                                @if($e->email)
                                    <small style="color: #764ba2;">
                                        <i class="bi bi-envelope-fill me-1"></i>{{ $e->email }}
                                    </small>
                                @else
                                    <span class="text-muted fst-italic">—</span>
                                @endif
                            </td>
                            <td class="py-3">
                                @if($e->tele)
                                    <small style="color: #11998e;">
                                        <i class="bi bi-telephone-fill me-1"></i>{{ $e->tele }}
                                    </small>
                                @else
                                    <span class="text-muted fst-italic">—</span>
                                @endif
                            </td>
                            <td class="py-3 text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a class="btn btn-sm shadow border-0 text-white" href="{{ route('etudiants.show',$e) }}" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                        <i class="bi bi-eye-fill"></i> Voir
                                    </a>
                                    <a class="btn btn-sm shadow border-0 text-white" href="{{ route('etudiants.edit',$e) }}" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                        <i class="bi bi-pencil-fill"></i> Modifier
                                    </a>
                                    <form action="{{ route('etudiants.destroy',$e) }}" method="POST"
                                        onsubmit="return confirm('Supprimer cet étudiant ?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm shadow border-0 text-white" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                            <i class="bi bi-trash-fill"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="p-5">
                                    <div class="mb-3" style="font-size: 4rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        <i class="bi bi-inbox"></i>
                                    </div>
                                    <p class="mb-3 fw-bold" style="color: #667eea; font-size: 1.2rem;">Aucun étudiant trouvé</p>
                                    <a href="{{ route('etudiants.create') }}" class="btn btn-lg shadow-lg border-0 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                                        <i class="bi bi-plus-circle me-1"></i> Ajouter le premier étudiant
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($etudiants->hasPages())
        <div class="card-footer border-0 py-3" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
            <div class="d-flex justify-content-center">
                {{ $etudiants->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    /* Effet hover sur les lignes du tableau */
    tbody tr:hover {
        background: linear-gradient(135deg, rgba(224, 195, 252, 0.1) 0%, rgba(142, 197, 252, 0.1) 100%) !important;
        transform: translateX(5px);
    }
    
    /* Animation des boutons */
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialiser les tooltips Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush
@endsection