<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANG3L Profile</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --secondary-blue: #3b82f6;
            --gold-color: #fbbf24;
            --gold-bg: #fef3c7;
            --text-light: #e2e8f0;
            --text-muted: #94a3b8;
            --card-bg: rgba(255, 255, 255, 0.1);
            --stat-bg: rgba(59, 130, 246, 0.2);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            min-height: 100vh;
            color: white;
            overflow-x: hidden;
        }
        
        .profile-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            min-height: 100vh;
        }
        
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-top: 10px;
        }
        
        .header h1 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-light);
        }
        
        .settings-icon {
            width: 32px;
            height: 32px;
            background: var(--card-bg);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .settings-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }
        
        /* Profile Section */
        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .avatar-container {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .avatar::before {
            content: '👤';
            font-size: 3rem;
        }
        
        .level-badge {
            position: absolute;
            top: -10px;
            right: -20px;
            background: var(--gold-color);
            color: #92400e;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
        }
        
        .username {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: white;
        }
        
        .handle {
            font-size: 1rem;
            color: var(--text-muted);
            margin-bottom: 10px;
        }
        
        .join-date {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 20px;
        }
        
        /* Social Stats */
        .social-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .social-stat {
            text-align: center;
        }
        
        .social-number {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            display: block;
        }
        
        .social-label {
            font-size: 0.85rem;
            color: var(--text-muted);
        }
        
        /* Statistics Section */
        .stats-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-light);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: var(--stat-bg);
            border-radius: 16px;
            padding: 20px 15px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
            background: rgba(59, 130, 246, 0.3);
        }
        
        .stat-icon {
            font-size: 1.5rem;
            margin-bottom: 8px;
            color: var(--gold-color);
        }
        
        .stat-number {
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.2;
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-friendship {
            flex: 1;
            background: var(--secondary-blue);
            border: none;
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-friendship:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }
        
        .btn-profile {
            width: 56px;
            height: 56px;
            background: var(--card-bg);
            border: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .btn-profile:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }
        
        .btn-profile i {
            font-size: 1.2rem;
            color: white;
        }
        
        /* Responsive adjustments */
        @media (max-width: 375px) {
            .profile-container {
                padding: 15px;
            }
            
            .avatar {
                width: 80px;
                height: 80px;
            }
            
            .username {
                font-size: 1.5rem;
            }
            
            .stats-grid {
                gap: 12px;
            }
            
            .stat-card {
                padding: 15px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Header -->
        <div class="header">
            <h1>ANG3L_NIGHTTAR</h1>
            <div class="settings-icon">
                <i class="bi bi-gear"></i>
            </div>
        </div>
        
        <!-- Profile Section -->
        <div class="profile-section">
            <div class="avatar-container">
                <div class="avatar"></div>
                <div class="level-badge">
                    Nível: OURO
                </div>
            </div>
            
            <div class="username">ANG3L</div>
            <div class="handle">Ang3l_nighttar</div>
            <div class="join-date">Aqui desde 2023</div>
            
            <!-- Social Stats -->
            <div class="social-stats">
                <div class="social-stat">
                    <span class="social-number">123</span>
                    <span class="social-label">seguidores</span>
                </div>
                <div class="social-stat">
                    <span class="social-number">320</span>
                    <span class="social-label">seguindo</span>
                </div>
            </div>
        </div>
        
        <!-- Statistics Section -->
        <div class="stats-section">
            <h3 class="stats-title">Estatísticas</h3>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-fire"></i>
                    </div>
                    <div class="stat-number">2807</div>
                    <div class="stat-label">Ofensiva</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <div class="stat-number">220</div>
                    <div class="stat-label">Nível de QI</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="stat-number">30000</div>
                    <div class="stat-label">Vocabulário</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <div class="stat-number">💎</div>
                    <div class="stat-label">Nível de escritor<br>Diamante</div>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn-friendship">
                <i class="bi bi-person-plus"></i>
                Fazer Amizade +
            </button>
            <button class="btn-profile">
                <i class="bi bi-person-circle"></i>
            </button>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Settings gear animation
            const settingsIcon = document.querySelector('.settings-icon');
            settingsIcon.addEventListener('click', function() {
                alert('Configurações em desenvolvimento!');
            });
            
            // Friendship button interaction
            const friendshipBtn = document.querySelector('.btn-friendship');
            friendshipBtn.addEventListener('click', function() {
                this.innerHTML = '<i class="bi bi-check-circle"></i> Solicitação Enviada';
                this.style.background = '#10b981';
                setTimeout(() => {
                    this.innerHTML = '<i class="bi bi-person-plus"></i> Fazer Amizade +';
                    this.style.background = 'var(--secondary-blue)';
                }, 2000);
            });
            
            // Profile button interaction
            const profileBtn = document.querySelector('.btn-profile');
            profileBtn.addEventListener('click', function() {
                alert('Visualizar perfil completo');
            });
            
            // Stat cards hover effect
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(card => {
                card.addEventListener('click', function() {
                    const statLabel = this.querySelector('.stat-label').textContent;
                    alert(`Detalhes sobre: ${statLabel}`);
                });
            });
            
            // Avatar click interaction
            const avatar = document.querySelector('.avatar');
            avatar.addEventListener('click', function() {
                this.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            });
        });
    </script>
</body>
</html>
