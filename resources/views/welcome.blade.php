@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
<style>
    .my-carousel-container {
        text-align: center;
        border-radius: 1rem;
        padding: 20px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
    }

    #myTinySlider .tns-slide {
        transition: transform 0.6s ease-in-out;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #myTinySlider img {
        max-height: 400px;
        width: auto;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.4s ease;
    }

    #myTinySlider img:hover {
        transform: scale(1.03);
    }

    .tns-controls {
        display: none;
    }

    .tns-nav {
        text-align: center;
        margin-top: 15px;
    }

    .tns-nav button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #ccc;
        margin: 0 5px;
        border: none;
        transition: background 0.3s;
    }

    .tns-nav button.tns-nav-active {
        background: #007bff;
    }

    .hero-section {
        padding: 20px 20px;
        position: relative;
        z-index: 10;
        max-width: 900px;
        animation: fadeIn 1.5s ease-out;
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        text-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    }

    .hero-section p {
        font-size: 1.5rem;
        margin-bottom: 40px;
        opacity: 0.9;
    }

    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .btn-fancy {
        padding: 15px 35px;
        font-size: 1.2rem;
        font-weight: 600;
        border-radius: 50px; /* Pill shape */
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-dark);
        text-decoration: none;
    }

    .btn-primary-fancy {
        background-color: var(--accent-color);
    }

    .btn-primary-fancy:hover {
        background-color: #218838;
        transform: translateY(-3px) scale(1.02);
        color:whitesmoke
    }

    .features-section {
        background-color: var(--dark-bg);
        color: var(--light-text-color);
        padding: 20px 20px;
        text-align: center;
    }
     .features-section h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 50px;
        position: relative;
        display: inline-block;
    }

    .features-section h2::after {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: -10px;
        width: 60px;
        height: 4px;
        background-color: var(--accent-color);
        border-radius: 2px;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .feature-item {
        padding: 30px;
        border:0.1px solid grey;
        border-radius: 15px;
        box-shadow: var(--shadow-dark);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: left; /* Align text within feature items */
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* Align content to start */
    }

    .feature-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    .feature-item .icon {
        font-size: 3rem;
        margin-bottom: 15px;
        line-height: 1;
        display: block; /* Make sure icon is on its own line */
        animation: bounceIn 0.8s ease-out; /* Add a subtle icon animation */
    }

    .feature-item h3 {
        font-size: 1.7rem;
        margin-bottom: 10px;
        color: var(--primary-color);
    }

    .feature-item p {
        font-size: 1.1rem;
        line-height: 1.6;
        opacity: 0.8;
    }

    /* Call to Action Section */
    .cta-section {
        background-color: var(--primary-color);
        padding: 80px 20px;
        text-align: center;
        background-size: cover;
        background-blend-mode: overlay;
    }

    .cta-section h2 {
        font-size: 2.8rem;
        margin-bottom: 30px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .cta-section .btn-fancy {
        background-color: white;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        margin: 10px 0 10px 0 !important;
    }

    .cta-section .btn-fancy:hover {
        color: #0056b3;
        transform: translateY(-5px) scale(1.05);
    }
</style>
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="hero-section m-auto">
                    <h1>{{ __('messages.welcome_to_sportshub') }}</h1>
                    <p>{{ __('messages.discover_intro') }}</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary-fancy">{{ __('messages.get_started') }}</a>
                        <a href="#features" class="btn btn-fancy btn-secondary">{{ __('messages.explore_features') }}</a>
                    </div>
                </div>
            </div>

            <section id="features" class="features-section">
                <h2>{{ __('messages.whats_inside') }}</h2>
                <div class="feature-grid">
                    <div class="feature-item">
                        <span class="icon">⛹️‍♂️</span>
                        <h3>{{ __('messages.find_new_players') }}</h3>
                        <p>{{ __('messages.find_new_players_desc') }}</p>
                    </div>
                    <div class="feature-item">
                        <span class="icon">🏆</span>
                        <h3>{{ __('messages.join_create_teams') }}</h3>
                        <p>{{ __('messages.join_create_teams_desc') }}</p>
                    </div>
                    <div class="feature-item">
                        <span class="icon">🏟️</span>
                        <h3>{{ __('messages.book_courts') }}</h3>
                        <p>{{ __('messages.book_courts_desc') }}</p>
                    </div>
                    <div class="feature-item">
                        <span class="icon">⚽</span>
                        <h3>{{ __('messages.organize_matches') }}</h3>
                        <p>{{ __('messages.organize_matches_desc') }}</p>
                    </div>
                    <div class="feature-item">
                        <span class="icon">📣</span>
                        <h3>{{ __('messages.announcements') }}</h3>
                        <p>{{ __('messages.announcements_desc') }}</p>
                    </div>
                    <div class="feature-item">
                        <span class="icon">📈</span>
                        <h3>{{ __('messages.track_progress') }}</h3>
                        <p>{{ __('messages.track_progress_desc') }}</p>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <h2>{{ __('messages.cta_title') }}</h2>
                <p>{{ __('messages.cta_desc') }}</p>
                <a href="#" class="btn-fancy">{{ __('messages.sign_up_now') }}</a>
            </section>

            <div id="myTinySlider" class="tns-outer tns-slider tns-nav-dots">
                <div class="text-center px-5 py-5">
                    <h3 class="py-5">{{ __('messages.find_match') }}</h3>
                    <img src="{{ asset('assets/media/products/matches.png') }}" class="card-rounded mw-100" alt="Image 2" onclick="openImageModal(this)"/>
                </div>
                <div class="text-center px-5 py-5">
                    <h3 class="py-5">{{ __('messages.find_court') }}</h3>
                    <img src="{{ asset('assets/media/products/courts.png') }}" class="card-rounded mw-100" alt="Image 3" onclick="openImageModal(this)"/>
                </div>
                <div class="text-center px-5 py-5">
                    <h3 class="py-5">{{ __('messages.find_player') }}</h3>
                    <img src="{{ asset('assets/media/products/players.png') }}" class="card-rounded mw-100" alt="Image 1" onclick="openImageModal(this)"/>
                </div>
                <div class="text-center px-5 py-5">
                    <h3 class="py-5">{{ __('messages.find_team') }}</h3>
                    <img src="{{ asset('assets/media/products/teams.png') }}" class="card-rounded mw-100" alt="Image 4" onclick="openImageModal(this)"/>
                </div>
                <div class="text-center px-5 py-5">
                    <h3 class="py-5">{{ __('messages.be_informed_about_announcements') }}</h3>
                    <img src="{{ asset('assets/media/products/announcements.png') }}" class="card-rounded mw-100" alt="Image 5" onclick="openImageModal(this)"/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="carouselImageModal" tabindex="-1" aria-labelledby="carouselImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> 
        <div class="modal-content bg-dark p-0">
            <div class="modal-body text-center p-0 m-0">
                <img id="modalImage" src="" alt="Preview" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('components.scripts.pagination-scripts')
<script src="{{ asset('assets/plugins/custom/tiny-slider/tiny-slider.bundle.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slider = tns({
            container: '#myTinySlider',
            items: 1, // Show one item at a time
            slideBy: 'page', // Slide by page
            autoplay: true, // Auto-play the carousel
            autoplayButtonOutput: false, // Hide auto-play button
            nav: true, // Show navigation dots,
            controls:true,
            responsive: {
                640: {
                    edgePadding: 20,
                    gutter: 20,
                    items: 1
                },
                700: {
                    gutter: 30
                },
                900: {
                    items: 1
                }
            }
        });
    });
    function openImageModal(imageElement) {
        const src = imageElement.getAttribute('src');
        const modalImage = document.getElementById('modalImage');
        modalImage.setAttribute('src', src);
        const modal = new bootstrap.Modal(document.getElementById('carouselImageModal'));
        modal.show();
    }
</script>
@endsection
