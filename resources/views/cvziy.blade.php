<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Pribadi - Fawziyyah | Admin Keuangan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #4a90e2;
            --accent-color: #3498db;
            --light-color: #f8fafc;
            --dark-color: #2c3e50;
            --gray-color: #64748b;
            --border-radius: 10px;
            --box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f7ff;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            position: relative;
        }

        /* Header dan Profile */
        .header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 40px 40px 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .profile-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 30px;
            margin-bottom: 20px;
            width: 100%;
        }

        .profile-img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: var(--transition);
        }

        .profile-img:hover {
            transform: scale(1.03);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .profile-info {
            flex: 1;
            min-width: 300px;
        }

        .header h1 {
            font-size: 2.8rem;
            margin-bottom: 8px;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .header .title {
            font-size: 1.4rem;
            margin-bottom: 20px;
            font-weight: 500;
            opacity: 0.95;
        }

        .contact-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
        }

        .contact-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            padding: 10px 18px;
            border-radius: 50px;
            font-size: 0.95rem;
            transition: var(--transition);
            backdrop-filter: blur(5px);
        }

        .contact-badge:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }

        .contact-badge i {
            font-size: 1.1rem;
        }

        /* Konten utama */
        .content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            padding: 40px;
        }

        @media (max-width: 768px) {
            .content {
                grid-template-columns: 1fr;
                padding: 30px 20px;
            }
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary-color);
            font-size: 1.4rem;
            margin-bottom: 20px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e2e8f0;
        }

        .section-title i {
            font-size: 1.2rem;
        }

        .about-text {
            text-align: justify;
            font-size: 1.05rem;
            color: var(--dark-color);
        }

        /* Timeline untuk pendidikan dan pengalaman */
        .timeline {
            position: relative;
            padding-left: 25px;
        }

        .timeline:before {
            content: '';
            position: absolute;
            left: 7px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--accent-color);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 25px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -28px;
            top: 5px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--primary-color);
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--accent-color);
        }

        .timeline-content h3 {
            font-size: 1.1rem;
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        .timeline-content .date {
            color: var(--gray-color);
            font-size: 0.9rem;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .timeline-content p {
            color: #555;
            font-size: 0.95rem;
        }

        /* Keahlian */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill-item {
            background: #f1f8ff;
            padding: 10px 18px;
            border-radius: 50px;
            font-size: 0.95rem;
            color: var(--dark-color);
            border: 1px solid #dbeafe;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .skill-item:hover {
            background: #e1f0ff;
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
            border-color: var(--accent-color);
        }

        .skill-item i {
            color: var(--accent-color);
        }

        /* Footer */
        .footer {
            background: #f8fafc;
            padding: 25px 40px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: var(--gray-color);
            font-size: 0.95rem;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }

        /* Responsif untuk ponsel */
        @media (max-width: 576px) {
            .header {
                padding: 30px 20px 25px;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }
            
            .header .title {
                font-size: 1.2rem;
            }
            
            .contact-badges {
                flex-direction: column;
                align-items: center;
            }
            
            .contact-badge {
                width: 100%;
                justify-content: center;
            }
            
            .profile-section {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-info {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <!-- Header dengan informasi profil -->
        <div class="header">
            <div class="profile-section">
                <img src="images/profil.jpg" 
                     alt="Foto Fawziyyah" class="profile-img">
                
                <div class="profile-info">
                    <h1>FAWZIYYAH</h1>
                    <div class="title">Admin Keuangan</div>
                    <p style="max-width: 600px; margin: 0 auto; opacity: 0.9; font-size: 1.05rem;">
                        Profesional administrasi keuangan dan sedang mendalami integrasi teknologi dalam sistem akuntansi.
                    </p>
                </div>
            </div>
            
            <div class="contact-badges">
                <div class="contact-badge">
                    <i class="fas fa-envelope"></i>
                    <span>fawziyyaha32@gmail.com</span>
                </div>
                <div class="contact-badge">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Cirebon, Jawa Barat</span>
                </div>
                <div class="contact-badge">
                    <i class="fas fa-briefcase"></i>
                    <span>Admin Keuangan - Klinik Indera</span>
                </div>
            </div>
        </div>
        
        <!-- Konten utama -->
        <div class="content">
            <!-- Kolom kiri -->
            <div class="left-column">
                <!-- Tentang Saya -->
                <section class="section">
                    <h2 class="section-title">
                        <i class="fas fa-user"></i>
                        <span>Tentang Saya</span>
                    </h2>
                    <p class="about-text">
                        Saya adalah seorang Admin Keuangan di Klinik Indera yang memiliki dedikasi tinggi dalam mengelola data finansial secara akurat. Saat ini, saya sedang menempuh studi di program studi Komputerisasi Akuntansi STMIK IKMI untuk memperdalam integrasi teknologi dalam sistem keuangan.
                    </p>
                </section>
                
                <!-- Pengalaman Kerja -->
                <section class="section">
                    <h2 class="section-title">
                        <i class="fas fa-briefcase"></i>
                        <span>Pengalaman Kerja</span>
                    </h2>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3>Admin Keuangan</h3>
                                <div class="date">2023 - Sekarang</div>
                                <p>Klinik Indera - Bertanggung jawab atas pengelolaan data finansial, pencatatan transaksi keuangan, dan penyusunan laporan keuangan klinik secara akurat dan tepat waktu.</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Pendidikan -->
                <section class="section">
                    <h2 class="section-title">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Pendidikan</span>
                    </h2>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3>D3 Komputerisasi Akuntansi</h3>
                                <div class="date">2024 - Sekarang</div>
                                <p>STMIK IKMI - Mempelajari integrasi teknologi informasi dengan sistem akuntansi untuk meningkatkan efisiensi dan akurasi pelaporan keuangan.</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3>SMKN 1 Lemahabang - Akuntansi</h3>
                                <div class="date">2016 - 2019</div>
                                <p>Mendapatkan dasar-dasar akuntansi, administrasi keuangan, dan pelaporan keuangan.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- Kolom kanan -->
            <div class="right-column">
                <!-- Keahlian -->
                <section class="section">
                    <h2 class="section-title">
                        <i class="fas fa-tools"></i>
                        <span>Keahlian</span>
                    </h2>
                    <div class="skills-container">
                        <div class="skill-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Administrasi & Manajemen Keuangan</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-file-excel"></i>
                            <span>Microsoft Excel (Analisis Data & Formula)</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-calculator"></i>
                            <span>Sistem Akuntansi (Accurate & Laravel Dasar)</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-code"></i>
                            <span>Web Development Dasar (HTML & CSS)</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-network-wired"></i>
                            <span>Troubleshooting Jaringan & Komputer</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-clipboard-check"></i>
                            <span>Pelaporan Keuangan Akurat</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-database"></i>
                            <span>Manajemen Data Keuangan</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-headset"></i>
                            <span>Layanan Pelanggan</span>
                        </div>
                    </div>
                </section>
                
                <!-- Pendidikan Lanjutan -->
                <section class="section">
                    <h2 class="section-title">
                        <i class="fas fa-book"></i>
                        <span>Pendidikan Lanjutan</span>
                    </h2>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3>SMPN 1 Mundu</h3>
                                <div class="date">2013 - 2016</div>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3>SDN 1 Penpen</h3>
                                <div class="date">2006 - 2013</div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Informasi Tambahan -->
                <section class="section">
                    <h2 class="section-title">
                        <i class="fas fa-star"></i>
                        <span>Komitmen & Visi</span>
                    </h2>
                    <p style="color: #555; font-size: 1rem;">
                        Saya bertekad untuk terus mengembangkan kemampuan di bidang teknologi informasi dan akuntansi, sehingga dapat memberikan kontribusi yang signifikan dalam transformasi digital sistem keuangan di instansi kesehatan. Saya percaya bahwa integrasi teknologi yang tepat dapat meningkatkan akurasi, efisiensi, dan transparansi dalam pengelolaan keuangan.
                    </p>
                </section>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>© 2023 Fawziyyah. CV Pribadi - Admin Keuangan</p>
            <p>Hubungi saya via email: <a href="mailto:fawziyyaha32@gmail.com">fawziyyaha32@gmail.com</a></p>
        </div>
    </div>

    <script>
        // Menambahkan efek scroll animasi
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            fadeElements.forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
            
            // Efek hover untuk skill items
            const skillItems = document.querySelectorAll('.skill-item');
            skillItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>