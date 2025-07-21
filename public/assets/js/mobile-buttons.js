/**
 * Scrolls the page to the announcements section.
 */
function scrollToAnnouncements() {
    const el = document.getElementById('kt_social_feeds_posts');
    if (el) {
        const offset = -100; // Adjust as needed
        const y = el.getBoundingClientRect().top + window.pageYOffset + offset;
        window.scrollTo({ top: y, behavior: 'smooth' });
    }
}

/**
 * Scrolls the page to the top.
 */
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

/**
 * Initializes mobile button event listeners.
 * Assumes specific button IDs are present in the DOM.
 */
function initializeMobileButtons() {
    document.getElementById('openSidebarButton')?.addEventListener('click', () => {
        document.querySelector('#kt_app_sidebar_mobile_toggle')?.click();
    });

    document.getElementById('scrollTopButton')?.addEventListener('click', scrollToTop);
}
