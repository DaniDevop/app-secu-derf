<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion des Stages ASP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     @include('style.style')
</head>
<body>
    <!-- Menu mobile -->
    <div class="mobile-toggle" id="mobileToggle">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Sidebar -->
     @include('style.sidebar')

    <!-- Contenu principal -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <header class="main-header">
            <div class="header-left">
                <h1>Tableau de Bord</h1>
                <p>Gestion des stages - Administration Pénitentiaire</p>
            </div>
            <div class="header-right">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher un stagiaire, un établissement...">
                </div>
                <div class="notification-bell">
                    <i class="fas fa-bell"></i>
                    <div class="notification-badge">3</div>
                </div>
            </div>
        </header>

        <!-- Cartes de statistiques -->
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Stagiaires Actifs</div>
                    <div class="stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
                <div class="stat-number">142</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>12% ce mois</span>
                </div>
            </div>
            
            <div class="stat-card green">
                <div class="stat-header">
                    <div class="stat-title">Stages Validés</div>
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-number">89</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>8% ce mois</span>
                </div>
            </div>
            
            <div class="stat-card orange">
                <div class="stat-header">
                    <div class="stat-title">En Attente</div>
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-number">24</div>
                <div class="stat-trend trend-down">
                    <i class="fas fa-arrow-down"></i>
                    <span>3% ce mois</span>
                </div>
            </div>
            
            <div class="stat-card red">
                <div class="stat-header">
                    <div class="stat-title">Établissements</div>
                    <div class="stat-icon">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
                <div class="stat-number">67</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>2% ce mois</span>
                </div>
            </div>
        </div>

        <!-- Contenu principal en grille -->
        <div class="content-grid">
            <!-- Section gauche -->
            <div class="content-left">
                <!-- Derniers stagiaires -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Derniers Stagiaires</h2>
                        <div class="section-actions">
                            <button class="btn btn-secondary">
                                <i class="fas fa-filter"></i> Filtrer
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom & Prénom</th>
                                    <th>Établissement</th>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Martin Dupont</td>
                                    <td>Maison d'Arrêt de Paris</td>
                                    <td>15/05/2024</td>
                                    <td>15/08/2024</td>
                                    <td><span class="status active">Actif</span></td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sophie Bernard</td>
                                    <td>Centre de Détention de Lille</td>
                                    <td>01/06/2024</td>
                                    <td>01/09/2024</td>
                                    <td><span class="status active">Actif</span></td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thomas Leroy</td>
                                    <td>Maison Centrale de Poissy</td>
                                    <td>10/05/2024</td>
                                    <td>10/08/2024</td>
                                    <td><span class="status pending">En attente</span></td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Julie Moreau</td>
                                    <td>Centre Pénitentiaire de Marseille</td>
                                    <td>20/04/2024</td>
                                    <td>20/07/2024</td>
                                    <td><span class="status active">Actif</span></td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nicolas Petit</td>
                                    <td>Établissement pour Mineurs de Toulouse</td>
                                    <td>01/07/2024</td>
                                    <td>01/10/2024</td>
                                    <td><span class="status pending">En attente</span></td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Graphique d'activité -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Activité des Stages (2024)</h2>
                        <div class="section-actions">
                            <select style="padding: 8px 15px; border-radius: 8px; border: 2px solid var(--gray-200);">
                                <option>Année 2024</option>
                                <option>Année 2023</option>
                                <option>Année 2022</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            <i class="fas fa-chart-line" style="margin-right: 10px;"></i>
                            Graphique d'activité des stages (intégration avec bibliothèque graphique)
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section droite -->
            <div class="content-right">
                <!-- Établissements -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Établissements</h2>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i> Voir tout
                        </button>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid var(--gray-100);">
                            <div>
                                <div style="font-weight: 600;">Maison d'Arrêt de Paris</div>
                                <div style="font-size: 14px; color: var(--gray-700);">12 stagiaires actifs</div>
                            </div>
                            <span class="status active">Disponible</span>
                        </div>
                        
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid var(--gray-100);">
                            <div>
                                <div style="font-weight: 600;">Centre de Détention de Lille</div>
                                <div style="font-size: 14px; color: var(--gray-700);">8 stagiaires actifs</div>
                            </div>
                            <span class="status active">Disponible</span>
                        </div>
                        
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid var(--gray-100);">
                            <div>
                                <div style="font-weight: 600;">Maison Centrale de Poissy</div>
                                <div style="font-size: 14px; color: var(--gray-700);">5 stagiaires actifs</div>
                            </div>
                            <span class="status pending">Capacité limitée</span>
                        </div>
                        
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0;">
                            <div>
                                <div style="font-weight: 600;">Centre Pénitentiaire de Marseille</div>
                                <div style="font-size: 14px; color: var(--gray-700);">10 stagiaires actifs</div>
                            </div>
                            <span class="status active">Disponible</span>
                        </div>
                    </div>
                </div>

                <!-- Tâches récentes -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Tâches Récentes</h2>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <div style="display: flex; align-items: flex-start; gap: 15px; padding: 15px 0; border-bottom: 1px solid var(--gray-100);">
                            <div style="width: 30px; height: 30px; border-radius: 8px; background: rgba(30, 55, 153, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                                <i class="fas fa-file-signature"></i>
                            </div>
                            <div style="flex: 1;">
                                <div style="font-weight: 600;">Valider conventions de stage</div>
                                <div style="font-size: 14px; color: var(--gray-700);">5 conventions en attente</div>
                                <div style="font-size: 12px; color: var(--gray-700); margin-top: 5px;">Il y a 2 heures</div>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: flex-start; gap: 15px; padding: 15px 0; border-bottom: 1px solid var(--gray-100);">
                            <div style="width: 30px; height: 30px; border-radius: 8px; background: rgba(16, 185, 129, 0.1); display: flex; align-items: center; justify-content: center; color: var(--success);">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div style="flex: 1;">
                                <div style="font-weight: 600;">Planifier visites superviseurs</div>
                                <div style="font-size: 14px; color: var(--gray-700);">3 établissements à visiter</div>
                                <div style="font-size: 12px; color: var(--gray-700); margin-top: 5px;">Il y a 1 jour</div>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: flex-start; gap: 15px; padding: 15px 0; border-bottom: 1px solid var(--gray-100);">
                            <div style="width: 30px; height: 30px; border-radius: 8px; background: rgba(239, 68, 68, 0.1); display: flex; align-items: center; justify-content: center; color: var(--danger);">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div style="flex: 1;">
                                <div style="font-weight: 600;">Problème de documentation</div>
                                <div style="font-size: 14px; color: var(--gray-700);">2 stagiaires avec dossier incomplet</div>
                                <div style="font-size: 12px; color: var(--gray-700); margin-top: 5px;">Il y a 2 jours</div>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: flex-start; gap: 15px; padding: 15px 0;">
                            <div style="width: 30px; height: 30px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); display: flex; align-items: center; justify-content: center; color: var(--warning);">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div style="flex: 1;">
                                <div style="font-weight: 600;">Générer rapport mensuel</div>
                                <div style="font-size: 14px; color: var(--gray-700);">Rapport Juin 2024</div>
                                <div style="font-size: 12px; color: var(--gray-700); margin-top: 5px;">Il y a 3 jours</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>