@extends('layouts.master')

@section('title', 'Tentang Kami - Barcom')

@section('style')

    <style>
        :root {
            --primary-color: #f59e0b;
            --primary-hover: #e6900b;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --focus-color: #6a11cb;
            --focus-shadow: rgba(106, 17, 203, 0.25);
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .contact-section {
            padding: 80px 0;
        }
        
        .contact-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px var(--shadow-color);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .contact-header {
            background: var(--primary-color);
            background: linear-gradient(135deg, var(--primary-color) 0%, #e6900b 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .contact-form {
            padding: 40px;
            background-color: white;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--focus-color);
            box-shadow: 0 0 0 0.25rem var(--focus-shadow);
        }
        
        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 8px 0 0 8px;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.4);
        }
        
        .form-label {
            color: #495057;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
        }
        
        /* Animasi untuk feedback */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .contact-section {
                padding: 40px 0;
            }
            
            .contact-header {
                padding: 30px 20px;
            }
            
            .contact-form {
                padding: 30px 20px;
            }
            
            .contact-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
@endsection
<body>
    <!-- Section Hubungi Kami -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="contact-card">
                        <!-- Header -->
                        <div class="contact-header">
                            <h1 class="display-5 fw-bold mb-3">Hubungi Kami</h1>
                            <p class="lead mb-0">Kami siap membantu Anda. Silakan isi form di bawah ini dan kami akan merespons secepatnya.</p>
                        </div>
                        
                        <!-- Form -->
                        <div class="contact-form">
                            <form id="contactForm" novalidate>
                                <div class="mb-4">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap Anda" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan nama lengkap Anda.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" placeholder="nama@contoh.com" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan alamat email yang valid.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="pesan" class="form-label">Isi Pesan</label>
                                    <div class="input-group">
                                        <span class="input-group-text align-items-start pt-3"><i class="fas fa-comment"></i></span>
                                        <textarea class="form-control" id="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                                        <div class="invalid-feedback">
                                            Harap tulis pesan Anda.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                    </button>
                                </div>
                            </form>
                            
                            <!-- Alert untuk feedback -->
                            <div id="alertContainer" class="mt-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS dengan Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript untuk validasi form -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const alertContainer = document.getElementById('alertContainer');
            
            // Fungsi untuk menampilkan alert
            function showAlert(message, type) {
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type} fade-in`;
                alertDiv.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} me-2"></i>
                        <span>${message}</span>
                    </div>
                `;
                
                alertContainer.innerHTML = '';
                alertContainer.appendChild(alertDiv);
                
                // Hapus alert setelah 5 detik
                setTimeout(() => {
                    alertDiv.remove();
                }, 5000);
            }
            
            // Validasi form
            contactForm.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
                
                // Reset validasi sebelumnya
                const formInputs = contactForm.querySelectorAll('.form-control');
                formInputs.forEach(input => {
                    input.classList.remove('is-invalid');
                });
                
                // Cek validitas form
                if (!contactForm.checkValidity()) {
                    // Tandai field yang tidak valid
                    formInputs.forEach(input => {
                        if (!input.checkValidity()) {
                            input.classList.add('is-invalid');
                        }
                    });
                    
                    showAlert('Harap lengkapi semua field dengan benar sebelum mengirim pesan.', 'danger');
                    return;
                }
                
                // Ambil nilai dari form
                const nama = document.getElementById('nama').value;
                const email = document.getElementById('email').value;
                const pesan = document.getElementById('pesan').value;
                
                // Simulasi pengiriman data (dalam aplikasi nyata, ini akan dikirim ke server)
                setTimeout(() => {
                    // Tampilkan alert sukses
                    showAlert(`Terima kasih, ${nama}! Pesan Anda telah berhasil dikirim. Kami akan merespons ke ${email} secepatnya.`, 'success');
                    
                    // Reset form
                    contactForm.reset();
                    contactForm.classList.remove('was-validated');
                }, 1000);
            });
            
            // Validasi real-time
            const inputs = contactForm.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                    }
                });
            });
        });
    </script>
</body>
