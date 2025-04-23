<div>
    <footer class="d-flex justify-content-between align-items-start py-5 border-top">
        <!-- Logo e Copyright a sinistra -->
        <div class="col-md-6 mb-3">
            <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                <img src="/media/logo_2.png" alt="logo" width="150px" class="ms-5">
            </a>
    
        </div>
    
        <!-- Sezioni a destra -->
        <div class="col-lg-6 d-flex justify-content-evenly align-items-top mt-5">
            <div class="me-4">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('su_di_noi') }}" class="nav-link p-0 nav-link-f fw-medium text-white">{{__('ui.about')}}</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('faqs') }}" class="nav-link p-0 nav-link-f text-white">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('privacy') }}" class="nav-link p-0 nav-link-f text-white">Privacy</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('cookie.policy') }}" class="nav-link p-0 nav-link-f text-white">Cookie</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('note.legali') }}" class="nav-link p-0 nav-link-f fw-medium text-white">{{__('ui.legal_notes.title')}}</a></li>
                </ul>
            </div>
        
            <div>
                <ul class="nav flex-column">
                    <a href="{{ route('contact') }}" class="nav-link mx-4"><p class="text-white">{{__('ui.contact')}}</p></a></li>
                    <div class="social-links text-center mt-4">
                        <a href="https://www.facebook.com" target="_blank" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/123456789" target="_blank" class="social-icon">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </footer>
</div>