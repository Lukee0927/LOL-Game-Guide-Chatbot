// Highlight sidebar link on scroll
    const sections = document.querySelectorAll('.guide-block');
    const sideLinks = document.querySelectorAll('.sidebar-link');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                sideLinks.forEach(l => l.classList.remove('active'));
                const link = document.querySelector(`.sidebar-link[href="#${entry.target.id}"]`);
                if (link) link.classList.add('active');
            }
        });
    }, { rootMargin: '-20% 0px -70% 0px' });

    sections.forEach(s => observer.observe(s));