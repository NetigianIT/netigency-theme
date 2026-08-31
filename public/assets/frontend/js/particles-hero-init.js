(function () {
    function initHeroParticles() {
        if (!document.getElementById('heroparticles') || typeof window.particlesJS !== 'function') {
            return;
        }

        window.particlesJS('heroparticles', {
            particles: {
                number: {
                    value: 40,
                    density: {
                        enable: true,
                        value_area: 1657.2100474277727,
                    },
                },
                color: {
                    value: '#ffffff',
                },
                shape: {
                    type: 'circle',
                },
                opacity: {
                    value: 0.28,
                    random: false,
                },
                size: {
                    value: 5,
                    random: true,
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1,
                },
                move: {
                    enable: true,
                    speed: 4,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                },
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse',
                    },
                    onclick: {
                        enable: false,
                        mode: 'push',
                    },
                    resize: true,
                },
                modes: {
                    repulse: {
                        distance: 120,
                        duration: 0.4,
                    },
                },
            },
            retina_detect: true,
        });
    }

    if ('requestIdleCallback' in window) {
        requestIdleCallback(initHeroParticles, { timeout: 4000 });
    } else {
        window.addEventListener('load', initHeroParticles);
    }
})();
