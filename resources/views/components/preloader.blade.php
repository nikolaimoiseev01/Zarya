<div id="preloader" class="preloader fixed inset-0 z-[9999] flex items-center justify-center bg-[#211F3D]">
    <div class="preloader-inner text-white text-center">
        <div class="preloader-dot mb-6"></div>
    </div>
</div>
<style>
    .preloader {
        pointer-events: none;
    }

    .preloader-dot {
        width: 14px;
        height: 14px;
        border-radius: 9999px;
        background: linear-gradient(135deg, #FF4D00, #FF8A3D);
        filter: blur(0.5px);
        box-shadow:
            0 0 20px rgba(255, 120, 50, 0.45),
            0 0 60px rgba(255, 120, 50, 0.25);
    }
</style>
<script type="module">
    const preloader = document.getElementById('preloader');


    document.body.classList.add('cursor-hidden');

    const preTl = gsap.timeline({
        defaults: { ease: 'power2.out' },
        onComplete: () => {
            preloader.remove();
            document.body.classList.remove('cursor-hidden');

            // 🔑 сигнал сцене
            window.dispatchEvent(new Event('preloader:done'));
        }
    });

    /* --------------------------------
       ☀️ DOT — РОЖДЕНИЕ
    -------------------------------- */
    preTl.fromTo(
        '.preloader-dot',
        { scale: 0.4, opacity: 0 },
        {
            scale: 1.15,
            opacity: 1,
            duration: 1.2,
            ease: 'power3.out',
        }
    );

    /* --------------------------------
       🌤 DOT — ЗАТУХАНИЕ (мягко)
    -------------------------------- */
    preTl.to(
        '.preloader-dot',
        {
            scale: 3.5,
            opacity: 0,
            filter: 'blur(14px)',
            duration: 1.4,
            ease: 'sine.inOut',
        },
        '+=0.2'
    );

    /* --------------------------------
       🌫 ПАУЗА — «вдох»
    -------------------------------- */
    preTl.to(
        {},
        {
            duration: 0.4,
        }
    );

    /* --------------------------------
       🌑 ФОН — СПОКОЙНОЕ РАСТВОРЕНИЕ
    -------------------------------- */
    preTl.to(
        '#preloader',
        {
            opacity: 0,
            scale: 1.02,
            duration: 1.1,
            ease: 'power1.out',
        }
    );


</script>

