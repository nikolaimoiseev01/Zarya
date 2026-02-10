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

    const hasSeenPreloader = sessionStorage.getItem('preloaderShown') === '1';
    const preloader = document.getElementById('preloader');

    if (!hasSeenPreloader) {
        document.body.classList.add('cursor-hidden');
    } else {
        const preloader = document.getElementById('preloader');
        if (preloader) preloader.remove();
    }


    if (!hasSeenPreloader && preloader) {

        const preTl = gsap.timeline({
            onComplete: () => {
                sessionStorage.setItem('preloaderShown', '1');
                preloader.remove();
                document.body.classList.remove('cursor-hidden');

                // 🔑 СИГНАЛ ВСЕМ СЦЕНАМ
                window.dispatchEvent(new Event('preloader:done'));
            }
        });

        preTl
            .fromTo(
                '.preloader-dot',
                { scale: 0.4, opacity: 0 },
                {
                    scale: 1.2,
                    opacity: 1,
                    duration: 1.2,
                    ease: 'power3.out',
                }
            )
            .to(
                '.preloader-dot',
                {
                    scale: 8,
                    opacity: 0,
                    filter: 'blur(20px)',
                    duration: 1.1,
                    ease: 'power4.inOut',
                },
                '+=0.4'
            )
            .to(
                '#preloader',
                {
                    opacity: 0,
                    duration: 0.6,
                    ease: 'power2.out',
                },
                '<'
            );

    } else {
        // если прелоадер не нужен — сразу разрешаем всё
        document.body.classList.remove('cursor-hidden');
    }

</script>

