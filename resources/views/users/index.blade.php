<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion des Stages ASP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        :root {
            --primary-dark: #0c2461;
            --primary: #1e3799;
            --primary-light: #4a69bd;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-700: #334155;
            --gray-900: #0f172a;
        }

        body {
            background: #f8fafc;
            color: var(--gray-900);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Layout principal */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: transform 0.3s ease;
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 30px 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sidebar-logo {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 700;
        }

        .sidebar-nav {
            padding: 25px 0;
        }

        .nav-item {
            padding: 16px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: white;
        }

        .nav-item i {
            width: 20px;
            font-size: 18px;
        }

        .nav-text {
            font-size: 15px;
            font-weight: 500;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .user-details h4 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .user-details p {
            font-size: 12px;
            opacity: 0.8;
        }

        /* Contenu principal */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        /* Header */
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .header-left h1 {
            font-size: 28px;
            color: var(--gray-900);
            font-weight: 700;
            margin-bottom: 8px;
        }

        .header-left p {
            color: var(--gray-700);
            font-size: 15px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 12px 20px 12px 45px;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            width: 300px;
            font-size: 15px;
            background: white;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(30, 55, 153, 0.1);
            outline: none;
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-700);
        }

        .notification-bell {
            position: relative;
            background: white;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-700);
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .notification-bell:hover {
            color: var(--primary);
            transform: translateY(-2px);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Cartes de statistiques */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            border-left: 5px solid var(--primary);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        }

        .stat-card.green {
            border-left-color: var(--success);
        }

        .stat-card.orange {
            border-left-color: var(--warning);
        }

        .stat-card.red {
            border-left-color: var(--danger);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stat-title {
            font-size: 15px;
            color: var(--gray-700);
            font-weight: 600;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(30, 55, 153, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 22px;
        }

        .stat-card.green .stat-icon {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .stat-card.orange .stat-icon {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .stat-card.red .stat-icon {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 8px;
        }

        .stat-trend {
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .trend-up {
            color: var(--success);
        }

        .trend-down {
            color: var(--danger);
        }

        /* Sections principales */
        .dashboard-section {
            background: white;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--gray-900);
        }

        .section-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(30, 55, 153, 0.2);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-900);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
        }

        /* Tableau */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 15px;
            font-weight: 600;
            color: var(--gray-700);
            border-bottom: 2px solid var(--gray-100);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--gray-100);
        }

        tr:hover {
            background: var(--gray-50);
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
        }

        .status.active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status.pending {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .status.rejected {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        /* Graphique */
        .chart-container {
            height: 300px;
            margin-top: 20px;
        }

        .chart-placeholder {
            background: linear-gradient(to right, #f8fafc, #f1f5f9);
            border-radius: 12px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-700);
            font-weight: 600;
        }

        /* Layout responsive */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        /* Menu mobile */
        .mobile-toggle {
            display: none;
            background: var(--primary);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 101;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .search-box input {
                width: 200px;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-toggle {
                display: flex;
            }
            
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .header-right {
                flex-wrap: wrap;
            }
            
            .search-box input {
                width: 100%;
            }
            
            .main-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Menu mobile -->
    <div class="mobile-toggle" id="mobileToggle">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="sidebar-title">ASP Stages</div>
        </div>
        
        <nav class="sidebar-nav">
            <a href="#" class="nav-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span class="nav-text">Tableau de bord</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-user-graduate"></i>
                <span class="nav-text">Stagiaires</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-building"></i>
                <span class="nav-text">Établissements</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-calendar-check"></i>
                <span class="nav-text">Planification</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-file-alt"></i>
                <span class="nav-text">Rapports</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-text">Statistiques</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-cog"></i>
                <span class="nav-text">Paramètres</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-users-cog"></i>
                <span class="nav-text">Administration</span>
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <h4>Admin Direction</h4>
                    <p>Administrateur Principal</p>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        // Menu mobile
        document.getElementById('mobileToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Fermer le menu mobile en cliquant à l'extérieur
        document.getElementById('mainContent').addEventListener('click', function() {
            if (window.innerWidth <= 992) {
                document.getElementById('sidebar').classList.remove('active');
            }
        });

        // Simulation de notification
        document.querySelector('.notification-bell').addEventListener('click', function() {
            const badge = this.querySelector('.notification-badge');
            if (badge.textContent !== '0') {
                badge.textContent = '0';
                badge.style.opacity = '0.5';
                alert('Notifications marquées comme lues');
            }
        });

        // Interaction avec les cartes de statistiques
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('click', function() {
                // Animation de clic
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
                
                // Ici, vous pourriez ajouter une logique pour afficher plus de détails
                // sur la statistique cliquée
            });
        });

        // Gestion des lignes du tableau
        document.querySelectorAll('table tbody tr').forEach(row => {
            row.addEventListener('click', function(e) {
                if (!e.target.closest('button')) {
                    const name = this.cells[0].textContent;
                    alert(`Détails du stagiaire: ${name}`);
                }
            });
        });

        // Gestion responsive
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                document.getElementById('sidebar').classList.remove('active');
            }
        });

        // Simulation de chargement de données
        setTimeout(() => {
            // Mise à jour de compteur fictive
            const activeCount = document.querySelector('.stat-card .stat-number');
            const currentCount = parseInt(activeCount.textContent);
            activeCount.textContent = currentCount + 1;
            
            // Ajout d'une nouvelle ligne fictive
            const tableBody = document.querySelector('table tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>Camille Dubois</td>
                <td>Centre de Semi-Liberté de Lyon</td>
                <td>05/07/2024</td>
                <td>05/10/2024</td>
                <td><span class="status active">Actif</span></td>
                <td>
                    <button class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            `;
            tableBody.insertBefore(newRow, tableBody.firstChild);
        }, 3000);
    </script>
</body>
</html>