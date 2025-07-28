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

    .tns-controls button {

    }

    .tns-controls button:hover {

    }

    /* Customizing the arrow icons (using Unicode characters) */
    .tns-controls button[data-controls="prev"]::before {

    }

    .tns-controls button[data-controls="next"]::before {
        content: '›'; /* Unicode right arrow */
        font-weight: bold;
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

    /* Hero Section */
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
        color: white;
    }

    .btn-primary-fancy:hover {
        background-color: #218838;
        transform: translateY(-3px) scale(1.02);
    }

    .btn-secondary-fancy {
        background-color: transparent;
        color: white;
        border: 2px solid white;
    }

    .btn-secondary-fancy:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-3px) scale(1.02);
    }


    .features-section {
        background-color: var(--dark-bg);
        color: var(--light-text-color);
        padding: 80px 20px;
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
        background-color: #2a2a47; /* Slightly lighter dark for feature cards */
        padding: 30px;
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
        color: white;
        background-image: url('{{ asset('assets/media/misc/pattern.png') }}'); /* Add a subtle pattern */
        background-size: cover;
        background-blend-mode: overlay;
        background-color: rgba(0, 123, 255, 0.8);
    }

    .cta-section h2 {
        font-size: 2.8rem;
        margin-bottom: 30px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .cta-section .btn-fancy {
        background-color: white;
        color: var(--primary-color);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
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
                    <h1 class="animate-text">👋 Welcome to <span class="text-white-50">Sportshub!</span> Your Ultimate Sports Hub! 🚀</h1>
                    <p class="animate-text-delay">
                        Discover new players, find your dream team, book top-notch courts, and never miss a match! Get ready to elevate your game. 🥇
                    </p>
                    <div class="hero-buttons">
                        <a href="#" class="btn-fancy btn-primary-fancy"> Get Started! <span class="emoji">🎉</span> </a>
                        <a href="#features" class="btn-fancy btn-secondary-fancy"> Explore Features <span class="emoji">👇</span> </a>
                    </div>
                </div>
            </div>

            <section id="features" class="features-section">
                <h2>What's Inside Sportshub? <span class="emoji">✨</span></h2>
                <div class="feature-grid">
                    <div class="feature-item reveal-item">
                        <span class="icon">⛹️‍♂️</span>
                        <h3>Find New Players</h3>
                        <p>Connect with athletes in your area, expand your network, and find the perfect teammates for any sport. Search by skill, location, and preferred game! <span class="emoji">🤝</span></p>
                    </div>
                    <div class="feature-item reveal-item">
                        <span class="icon">🏆</span>
                        <h3>Join/Create Teams</h3>
                        <p>Looking for a team or building your own squad? Sportshub makes it easy to find and manage teams, organize practices, and compete together. <span class="emoji">🏅</span></p>
                    </div>
                    <div class="feature-item reveal-item">
                        <span class="icon">🏟️</span>
                        <h3>Book Courts & Venues</h3>
                        <p>Seamlessly discover and reserve local sports courts, fields, and venues. Check availability, book instantly, and get ready to play! <span class="emoji">🗓️</span></p>
                    </div>
                    <div class="feature-item reveal-item">
                        <span class="icon">⚽</span>
                        <h3>Organize & Find Matches</h3>
                        <p>Set up casual games or competitive matches with ease. Browse upcoming fixtures, challenge other teams, and keep track of your scores and stats. <span class="emoji">🔥</span></p>
                    </div>
                    <div class="feature-item reveal-item">
                        <span class="icon">📣</span>
                        <h3>Stay Updated with Announcements</h3>
                        <p>Receive real-time notifications for game changes, team updates, league news, and special events. Never miss a beat! <span class="emoji">🔔</span></p>
                    </div>
                    <div class="feature-item reveal-item">
                        <span class="icon">📈</span>
                        <h3>Track Your Progress</h3>
                        <p>Monitor your performance, track game results, and see your stats improve over time. Celebrate your wins and work on your goals! <span class="emoji">🚀</span></p>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <h2>Ready to Jump into the Game? <span class="emoji">🏃‍♀️💨</span></h2>
                <p>Join the Sportshub community today and take your sports experience to the next level!</p>
                <a href="#" class="btn-fancy"> Sign Up Now! <span class="emoji">🥳</span> </a>
            </section>
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="my-carousel-container">
                    {{-- Add a container for easier targeting with JS --}}
                    <div id="myTinySlider" class="tns-outer tns-slider tns-nav-dots">
                        <div class="text-center px-5 py-5">
                            <img src="{{ asset('assets/media/products/matches.png') }}" class="card-rounded mw-100" alt="Image 2" />
                        </div>
                        <div class="text-center px-5 py-5">
                            <img src="{{ asset('assets/media/products/courts.png') }}" class="card-rounded mw-100" alt="Image 3" />
                        </div>
                        <div class="text-center px-5 py-5">
                            <img src="{{ asset('assets/media/products/players.png') }}" class="card-rounded mw-100" alt="Image 1" />
                        </div>
                        <div class="text-center px-5 py-5">
                            <img src="{{ asset('assets/media/products/teams.png') }}" class="card-rounded mw-100" alt="Image 4" />
                        </div>
                        <div class="text-center px-5 py-5">
                            <img src="{{ asset('assets/media/products/announcements.png') }}" class="card-rounded mw-100" alt="Image 5" />
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-5"></div>
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
</script>
@endsection
