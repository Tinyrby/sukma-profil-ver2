/* --- File: public/js/news-scroller.js --- */

document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('newsContainer');
    
    // Cek apakah slider ada di halaman ini sebelum menjalankan script
    if (!slider) return;

    const btnLeft = document.getElementById('scrollLeft');
    const btnRight = document.getElementById('scrollRight');
    
    let isDown = false;
    let startX;
    let scrollLeft;
    let isDragging = false;
    let velX = 0; 
    let momentumID; 

    // --- MOUSE EVENTS ---
    
    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        isDragging = false;
        slider.classList.add('active');
        cancelAnimationFrame(momentumID);
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
        velX = 0;
    });

    slider.addEventListener('mouseleave', () => {
        if(isDown) {
            isDown = false;
            beginMomentumTracking();
        }
        slider.classList.remove('active');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
        // Matikan snap sementara agar momentum jalan
        slider.style.scrollSnapType = 'none'; 
        slider.style.scrollBehavior = 'auto';
        beginMomentumTracking();
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2; // Kecepatan tarik
        const prevScrollLeft = slider.scrollLeft;
        
        slider.scrollLeft = scrollLeft - walk;
        
        // Hitung kecepatan untuk momentum
        velX = slider.scrollLeft - prevScrollLeft; 

        if(Math.abs(walk) > 5) isDragging = true;
    });

    // --- MOMENTUM LOGIC ---

    function beginMomentumTracking() {
        cancelAnimationFrame(momentumID);
        
        function momentumLoop() {
            slider.scrollLeft += velX;
            velX *= 0.96; // Friksi (makin rendah makin cepat berhenti)
            
            if (Math.abs(velX) > 0.5) {
                momentumID = requestAnimationFrame(momentumLoop);
            } else {
                // Kembalikan Snap
                slider.style.scrollSnapType = ''; 
                slider.style.scrollBehavior = ''; 
            }
        }
        momentumLoop();
    }

    // --- BUTTON CONTROLS ---
    
    if(btnLeft) {
        btnLeft.addEventListener('click', () => {
            slider.scrollBy({ left: -320, behavior: 'smooth' });
        });
    }
    
    if(btnRight) {
        btnRight.addEventListener('click', () => {
            slider.scrollBy({ left: 320, behavior: 'smooth' });
        });
    }

    // Fungsi global untuk mencegah klik link saat drag
    // Harus dipasang di window agar bisa diakses onclick attribute HTML
    window.preventClickDuringDrag = function(e) {
        if (isDragging) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
        return true;
    };
});