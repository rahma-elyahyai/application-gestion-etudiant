@extends('layouts.app')
@section('title','Liste des étudiants')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f5f3ef 0%, #e8e4df 100%);
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(72, 118, 255, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(138, 101, 255, 0.06) 0%, transparent 50%);
        min-height: 100vh;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }

    .page-container {
        padding: 40px 30px;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Header élégant */
    .page-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
        border-radius: 16px;
        padding: 24px 32px;
        margin-bottom: 24px;
        box-shadow: 0 4px 20px rgba(30, 58, 138, 0.15);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: white;
        margin: 0 0 4px 0;
        letter-spacing: 0.3px;
    }

    .page-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.875rem;
        margin: 0;
    }

    .btn-add-student {
        background: white;
        color: #1e3a8a;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
    }

    .btn-add-student:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        color: #1e3a8a;
    }

    /* Stats Cards élégantes */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 16px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: white;
        border-radius: 14px;
        padding: 20px 24px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(30, 58, 138, 0.12);
        border-color: #3b82f6;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: #1e40af;
        margin-bottom: 12px;
    }

    .stat-number {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e3a8a;
        margin: 0;
    }

    .stat-label {
        color: #6b7280;
        font-size: 0.85rem;
        margin: 4px 0 0 0;
    }

    /* Search bar élégante */
    .search-bar-container {
        background: white;
        border-radius: 14px;
        padding: 16px 20px;
        margin-bottom: 20px;
        border: 1px solid #e5e7eb;
        display: flex;
        gap: 12px;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .search-input-wrapper {
        flex: 1;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 10px 16px 10px 38px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        background: #f9fafb;
        color: #1f2937;
        font-size: 0.9rem;
        transition: all 0.3s;
    }

    .search-input::placeholder {
        color: #9ca3af;
    }

    .search-input:focus {
        outline: none;
        background: white;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        font-size: 1rem;
    }

    .filter-btn {
        padding: 10px 18px;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        color: #4b5563;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.9rem;
    }

    .filter-btn:hover {
        background: white;
        border-color: #3b82f6;
        color: #1e40af;
    }

    /* Table Card */
    .table-container {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
    }

    .students-table {
        width: 100%;
        border-collapse: collapse;
    }

    .students-table thead {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    .students-table thead th {
        padding: 16px 20px;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 700;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid #e2e8f0;
    }

    .students-table tbody tr {
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.3s ease;
        position: relative;
    }

    .students-table tbody tr::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 3px;
        height: 0;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        transition: height 0.3s ease;
    }

    .students-table tbody tr:hover {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.03) 0%, rgba(37, 99, 235, 0.03) 100%);
        transform: translateX(6px);
    }

    .students-table tbody tr:hover::before {
        height: 100%;
    }

    .students-table tbody td {
        padding: 16px 20px;
        font-size: 0.9rem;
        color: #374151;
    }

    .student-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .student-avatar {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #dbeafe;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
    }

    .student-avatar-placeholder {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
    }

    .student-name {
        font-weight: 600;
        color: #1f2937;
        font-size: 0.95rem;
    }

    .badge-apogee {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
        box-shadow: 0 2px 8px rgba(30, 58, 138, 0.2);
    }

    .info-text {
        color: #6b7280;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .info-text i {
        color: #3b82f6;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .status-active {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
        border: 1px solid #6ee7b7;
    }

    .status-inactive {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
        border: 1px solid #fca5a5;
    }

    .action-buttons {
        display: flex;
        gap: 6px;
        justify-content: center;
    }

    .btn-action {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        font-size: 0.9rem;
        background: white;
    }

    .btn-view {
        color: #3b82f6;
    }

    .btn-view:hover {
        background: #eff6ff;
        transform: translateY(-2px);
        border-color: #3b82f6;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    }

    .btn-edit {
        color: #f59e0b;
    }

    .btn-edit:hover {
        background: #fffbeb;
        transform: translateY(-2px);
        border-color: #f59e0b;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.15);
    }

    .btn-delete {
        color: #ef4444;
    }

    .btn-delete:hover {
        background: #fef2f2;
        transform: translateY(-2px);
        border-color: #ef4444;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 4rem;
        color: #3b82f6;
        margin-bottom: 16px;
        opacity: 0.3;
    }

    .empty-text {
        color: #6b7280;
        font-size: 1rem;
        margin-bottom: 24px;
    }

    .table-footer {
        padding: 16px 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #e2e8f0;
    }

    .pagination-info {
        color: #6b7280;
        font-size: 0.85rem;
    }

    /* Checkbox styling */
    input[type="checkbox"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
        accent-color: #3b82f6;
        border-radius: 4px;
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table-container {
        animation: fadeInUp 0.5s ease;
    }

    @media (max-width: 768px) {
        .page-container {
            padding: 24px 15px;
        }

        .header-content {
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
        }

        .page-title {
            font-size: 1.25rem;
        }

        .stats-container {
            grid-template-columns: 1fr;
        }

        .search-bar-container {
            flex-direction: column;
        }

        .students-table {
            font-size: 0.85rem;
        }

        .students-table tbody tr:hover {
            transform: none;
        }
    }
</style>

<div class="page-container">
    <!-- Header élégant -->
    <div class="page-header">
        <div class="header-content">
            <div>
                <h1 class="page-title">
                    <i class="bi bi-people-fill me-2"></i>Gestion des Étudiants
                </h1>
                <p class="page-subtitle">Gérez et suivez tous vos étudiants en un seul endroit</p>
            </div>
            <a href="{{ route('etudiants.create') }}" class="btn-add-student">
                <i class="bi bi-plus-circle"></i>
                <span>Nouvel étudiant</span>
            </a>
        </div>
    </div>

    <!-- Statistiques élégantes -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <h3 class="stat-number">{{ $etudiants->total() }}</h3>
            <p class="stat-label">Total Étudiants</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-person-check-fill"></i>
            </div>
            <h3 class="stat-number">{{ $etudiants->total() }}</h3>
            <p class="stat-label">Étudiants Actifs</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <h3 class="stat-number">100%</h3>
            <p class="stat-label">Taux de présence</p>
        </div>
    </div>

    <!-- Barre de recherche élégante -->
    <div class="search-bar-container">
        <div class="search-input-wrapper">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Rechercher un étudiant par nom, email ou numéro..." id="searchInput">
        </div>
        <button class="filter-btn">
            <i class="bi bi-funnel-fill"></i>
            <span>Filtres</span>
        </button>
        <button class="filter-btn">
            <i class="bi bi-download"></i>
            <span>Exporter</span>
        </button>
    </div>

    <!-- Tableau -->
    <div class="table-container">
        <table class="students-table">
            <thead>
                <tr>
                    <th style="width: 40px;">
                        <input type="checkbox" id="selectAll">
                    </th>
                    <th>Étudiant</th>
                    <th>Num Apogée</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($etudiants as $e)
                <tr>
                    <td>
                        <input type="checkbox" class="row-checkbox">
                    </td>
                    <td>
                        <div class="student-info">
                            @if($e->photo)
                                <img src="{{ asset('storage/'.$e->photo) }}" 
                                     class="student-avatar"
                                     alt="{{ $e->prenom }} {{ $e->nom }}">
                            @else
                                <div class="student-avatar-placeholder">
                                    {{ strtoupper(substr($e->prenom, 0, 1)) }}{{ strtoupper(substr($e->nom, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <div class="student-name">{{ $e->prenom }} {{ $e->nom }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-apogee">
                            #{{ $e->num_apogee }}
                        </span>
                    </td>
                    <td>
                        @if($e->email)
                            <span class="info-text">
                                <i class="bi bi-envelope-fill"></i>
                                {{ $e->email }}
                            </span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        @if($e->tele)
                            <span class="info-text">
                                <i class="bi bi-telephone-fill"></i>
                                {{ $e->tele }}
                            </span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        <span class="status-badge status-active">Actif</span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('etudiants.show', $e) }}" class="btn-action btn-view" title="Voir">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('etudiants.edit', $e) }}" class="btn-action btn-edit" title="Modifier">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('etudiants.destroy', $e) }}" method="POST"
                                onsubmit="return confirm('Supprimer cet étudiant ?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" title="Supprimer">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="bi bi-inbox"></i>
                            </div>
                            <p class="empty-text">Aucun étudiant trouvé dans la base de données</p>
                            <a href="{{ route('etudiants.create') }}" class="btn-add-student">
                                <i class="bi bi-plus-circle"></i>
                                <span>Ajouter le premier étudiant</span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        @if($etudiants->total() > 0)
        <div class="table-footer">
            <div class="pagination-info">
                Affichage de {{ $etudiants->firstItem() }} à {{ $etudiants->lastItem() }} sur {{ $etudiants->total() }} étudiants
            </div>
            @if($etudiants->hasPages())
                {{ $etudiants->links() }}
            @endif
        </div>
        @endif
    </div>
</div>

<script>
    // Sélectionner tous les checkboxes
    document.getElementById('selectAll')?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });

    // Recherche en temps réel
    document.getElementById('searchInput')?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('.students-table tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>
@endsection