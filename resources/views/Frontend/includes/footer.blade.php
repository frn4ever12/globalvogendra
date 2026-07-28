<section class="follow-us-section py-5 animate-section" style="position: relative; background-color: #f7f7f7;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 text-center text-lg-start animate-section-item">
                <h2 class="fw-bold" style="color: #00274d;">
                    Follow us on <span style="color: #c70000;">Socials</span>
                </h2>
                <p class="mt-3" style="color: #00274d;">
                    We look ahead with an expanded vision to be students' lifelong launch pad for realizing their highest potential.
                </p>

                <div class="social-links mt-4 animate-section-item">
                    <a href="#" class="mx-2">
                        <i class="fa-brands fa-facebook" style="font-size: 1.2rem; color: #00274d;"></i>
                    </a>
                    <a href="#" class="mx-2">
                        <i class="fa-brands fa-instagram" style="font-size: 1.2rem; color: #c70000;"></i>
                    </a>
                    <a href="#" class="mx-2">
                        <i class="fa-brands fa-youtube" style="font-size: 1.2rem; color: #00274d;"></i>
                    </a>
                    <a href="#" class="mx-2">
                        <i class="fa-brands fa-tiktok" style="font-size: 1.2rem; color: #1da1f2;"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 mt-4 mt-lg-0 animate-section-item">
                <div class="row g-2">
                    <div class="col-6 animate-section-item">
                        <img src="images/university.jpg" class="img-fluid rounded" alt="Gallery Image">
                    </div>
                    <div class="col-6 animate-section-item">
                        <img src="images/university.jpg" class="img-fluid rounded" alt="Gallery Image">
                    </div>
                    <div class="col-6 animate-section-item">
                        <img src="images/university.jpg" class="img-fluid rounded" alt="Gallery Image">
                    </div>
                    <div class="col-6 animate-section-item">
                        <img src="images/university.jpg" class="img-fluid rounded" alt="Gallery Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shapes" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1;">
        <div style="position: absolute; top: 5%; left: 15%; width: 100px; height: 100px; background-color: white; transform: rotate(45deg); opacity: 0.6;"></div>
        <div style="position: absolute; top: 25%; left: 25%; width: 120px; height: 120px; background-color: white; transform: rotate(45deg); opacity: 0.6;"></div>
        <div style="position: absolute; top: 50%; left: 35%; width: 150px; height: 150px; background-color: white; transform: rotate(45deg); opacity: 0.6;"></div>
        <div style="position: absolute; top: 15%; left: 70%; width: 90px; height: 90px; background-color: white; transform: rotate(45deg); opacity: 0.3;"></div>
        <div style="position: absolute; top: 40%; left: 80%; width: 110px; height: 110px; background-color: white; transform: rotate(45deg); opacity: 0.4;"></div>
        <div style="position: absolute; top: 80%; left: 15%; width: 200px; height: 200px; background-color: white; transform: rotate(45deg); opacity: 0.6;"></div>
        <div style="position: absolute; top: 60%; left: 10%; width: 130px; height: 130px; background-color: white; transform: rotate(45deg); opacity: 0.6;"></div>
        <div style="position: absolute; top: 30%; left: 50%; width: 160px; height: 160px; background-color: white; transform: rotate(45deg); opacity: 0.5;"></div>
    </div>
</section>

<footer class="bg-gradient-primary position-relative text-white">
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #0056b3, #003a80);
            overflow: hidden;
        }

        .footer-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 86, 179, 0.5), rgba(0, 58, 128, 0.5));
            z-index: 0;
        }

        .footer-after {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.04), rgba(0, 0, 0, 0.08));
            z-index: 0;
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .footer-links ul {
            padding-left: 0;
            list-style: none;
        }

        .footer-links ul li a {
            color: white;
            text-decoration: none;
        }

        .footer-links ul li a:hover {
            text-decoration: underline;
        }

        .footer-content {
            padding: 4rem 1rem 1rem; 
        }
    </style>

    <div class="footer-overlay"></div>
    <div class="footer-after"></div>

    <div class="container footer-content">
        <div class="row text-center text-md-start">
            <div class="col-12 col-md-4 mb-3">
                <img src="images/university.jpg" class="img-fluid rounded mb-3" alt="Gallery Image" style="width: 100px;">
                <p class="small">
                    Together, let's shape the future and drive your business to new heights!
                </p>
            </div>

            <div class="col-6 col-md-2 footer-links mb-3">
                <h6 class="fw-bold text-uppercase">Quick Links</h6>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 footer-links mb-3">
                <h6 class="fw-bold text-uppercase">Useful Links</h6>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-4 footer-links mb-3">
                <h6 class="fw-bold text-uppercase">Contact Us</h6>
                <ul>
                    <li>
                        <a href="mailto:{{ $setting->email ?? 'example@example.com' }}">
                            <i class="fas fa-envelope me-2"></i>{{ $setting->email ?? 'example@example.com' }}
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-phone me-2"></i>{{ $setting->phone ?? '+1234567890' }}
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt me-2"></i>{{ $setting->address ?? 'Kathmandu, Nepal' }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3 border-top border-light">
            <span class="small">&copy; All rights reserved.</span>
            <div class="mt-3 mt-md-0">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
            </div>
        </div>
    </div>
</footer>