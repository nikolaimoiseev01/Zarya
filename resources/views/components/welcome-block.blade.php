<style>
    body.cursor-hidden {
        cursor: none;
    }
    .hero-title {
        will-change: transform, opacity, filter;
    }
    .hero-title span {
        display: inline-block;
        will-change: transform, opacity, filter;
    }
</style>



<style>
    .kpi {
        text-shadow:
            0 0 20px rgba(255, 120, 50, 0.35),
            0 0 60px rgba(255, 120, 50, 0.15);
        will-change: transform, opacity, filter;
    }
</style>


<section>


    <div
        class="section section-1 h-svh w-full flex items-center justify-center
bg-[linear-gradient(180deg,_#211F3D_0%,_#393360_32.83%,_#FF4D00_100%)]
         bg-[length:100%_200%] bg-top overflow-hidden">

        <h1 class="hero-title italic text-4xl text-white text-center fixed">
            ещё один скролл — и наступит заря
        </h1>
    </div>

    <div
        class="section section-2 h-svh w-full relative overflow-hidden
         bg-[linear-gradient(180deg,_#211F3D_0%,_#393360_32.83%,_#FF4D00_100%)]
         bg-[length:100%_200%] bg-bottom">

        <div class="absolute inset-0 flex items-center justify-center">
            <!-- ЛЕВЫЙ ТЕКСТ -->
{{--            <div class="brand-text absolute left-16 max-w-xl text-white">--}}
{{--                <p class="text-lg leading-relaxed">--}}
{{--                    Брендинговое агентство,<br>--}}
{{--                    помогающее FMCG брендам<br>--}}
{{--                    решать ключевые бизнес-задачи<br>--}}
{{--                    через маркетинг и айдентику--}}
{{--                </p>--}}
{{--            </div>--}}

            <!-- LOGO -->
            <div class="hero-logo absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                <x-logo class="logo-core w-80 sm:w-[90%]" color="white"/>
            </div>

            <!-- KPI GROUP -->
            <div class="kpi kpi-1 absolute left-[12%] top-[28%] text-white">
                <p class="text-5xl font-semibold">15+</p>
                <span class="text-lg opacity-70">успешных кейсов</span>
            </div>

            <div class="kpi kpi-2 absolute right-[14%] top-[30%] text-white text-right">
                <p class="text-5xl font-semibold">7 лет</p>
                <span class="text-lg opacity-70">в FMCG</span>
            </div>

            <div class="kpi kpi-3 absolute left-[18%] bottom-[28%] text-white">
                <p class="text-5xl font-semibold">30%</p>
                <span class="text-lg opacity-70">рост продаж</span>
            </div>

            <div class="kpi kpi-4 absolute right-[18%] bottom-[26%] text-white text-right">
                <p class="text-5xl font-semibold">50+</p>
                <span class="text-lg opacity-70">бренд-проектов</span>
            </div>

            <div class="kpi kpi-5 absolute left-1/2 bottom-[18%] -translate-x-1/2 text-white text-center">
                <p class="text-xl opacity-80">
                    стратегия → айдентика → рост
                </p>
            </div>

            <div class="kpi kpi-6 absolute left-1/2 top-[18%] -translate-x-1/2 text-white text-center">
                <p class="text-xl uppercase tracking-widest opacity-70">
                    branding as a business tool
                </p>
            </div>

            <div class="brand-description text-white text-center">
                <h1 class="text-2xl uppercase tracking-widest opacity-70">
                    Брендинговое агенство,<br>
                    помогающее FMCG брендам<br>
                    решать ключевые бизнес-задачи через маркетинг и айдентику<br>
                </h1>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/split-type"></script>
<script type="module">
    gsap.registerPlugin(ScrollTrigger);


    // SPLIT TEXT INTO LETTERS
    const split = new SplitType('.hero-title', {
        types: 'chars',
    });

    // initial state
    gsap.set(split.chars, {
        opacity: 0,
        y: 14,
        scale: 0.98,
        filter: 'blur(14px)',
    });

    // INTRO TIMELINE
    const introTl = gsap.timeline({
        delay: 0.5,
    });

    introTl.to(split.chars, {
        opacity: 1,
        y: 0,
        scale: 1,
        filter: 'blur(0px)',
        duration: 1.2,
        ease: 'power3.out',
        stagger: {
            each: 0.035,      // 🔑 не печатание, а волна
            from: 'start',    // слева направо
        },
    });

    // subtle after-breath (очень мягко)
    introTl.to('.hero-title', {
        scale: 1.015,
        duration: 2,
        ease: 'sine.inOut',
        yoyo: true,
        repeat: 1,
    }, '>-0.4');


    // скрываем сразу
    document.body.classList.add("cursor-hidden");

    /* ==================================================
       🌑 SECTION 1 — TEXT DISSOLVE (ночь уходит)
    ================================================== */
    gsap.timeline({
        scrollTrigger: {
            trigger: ".section-1",
            start: "top top",
            end: "+=100%",       // 🔑 сколько "держим" сцену
            scrub: 1.8,
            pin: false,           // 🔑 ФИКСАЦИЯ
            anticipatePin: 1,
        }
    })
        .to(".hero-title", {
            opacity: 0,
            scale: 0.96,
            filter: "blur(16px)",
            ease: "none",
        });

    /* ==================================================
       🌅 SECTION 2 — DAWN SCENE (pin + восход)
    ================================================== */
    const sceneTl = gsap.timeline({
        scrollTrigger: {
            trigger: ".section-2",
            start: "top top",
            end: "+=220%",
            scrub: 2.2,       // 🔑 сцена, а не управление
            pin: true,
            anticipatePin: 1,
        }
    });

    /* --------------------------------------------------
       ☀️ LOGO — солнце поднимается
    -------------------------------------------------- */
    sceneTl.fromTo(
        ".logo-core",
        {
            scale: 0.85,
            opacity: 0,
            filter: "blur(12px)",
        },
        {
            scale: 1.18,
            opacity: 1,
            filter: "blur(0px)",
            ease: "none",
            duration: 1.3,
        },
        0
    );

    /* --------------------------------------------------
       🌅 KPI — DAWN RISE (из тумана)
    -------------------------------------------------- */
    const kpis = gsap.utils.toArray(".kpi");

    sceneTl.fromTo(
        kpis,
        {
            opacity: 0,
            y: 120,
            scale: 0.96,
            filter: "blur(18px)",
        },
        {
            opacity: 1,
            y: 0,
            scale: 1,
            filter: "blur(0px)",
            ease: "none",
            duration: 1,
            stagger: {
                each: 0.18,
                from: "center", // 🔑 восход от логотипа
            },
        },
        1.3
    );

    /* --------------------------------------------------
       🌞 LIGHT BLOOM — пик зари
    -------------------------------------------------- */
    sceneTl.fromTo(
        kpis,
        {
            textShadow: "0 0 0px rgba(255,120,50,0)",
        },
        {
            textShadow:
                "0 0 36px rgba(255,120,50,0.45), 0 0 90px rgba(255,120,50,0.25)",
            ease: "none",
            duration: 0.2,
        },
        0.75
    );

    /* --------------------------------------------------
       🌤 AFTERGLOW — свет рассеивается
    -------------------------------------------------- */
    sceneTl.to(
        kpis,
        {
            textShadow:
                "0 0 22px rgba(255,120,50,0.25), 0 0 60px rgba(255,120,50,0.12)",
            ease: "none",
            duration: 0.1,
        },
        1.15
    );


    /* --------------------------------------------------
   🌫 KPI — FADE OUT (после рассвета)
-------------------------------------------------- */
    sceneTl.to(
        kpis,
        {
            opacity: 0,
            y: -40,
            filter: "blur(12px)",
            ease: "none",
            duration: 0.8,
        },
        6
    );

    /* --------------------------------------------------
       🧭 LOGO — slight move up (освобождаем место)
    -------------------------------------------------- */
    sceneTl.to(
        ".hero-logo",
        {
            y: "-=180",
            ease: "none",
            duration: 2,
        },
        8
    );

    /* --------------------------------------------------
       📝 BRAND TEXT — SOFT REVEAL BELOW LOGO
    -------------------------------------------------- */
    sceneTl.fromTo(
        ".brand-description",
        {
            opacity: 0,
            y: 40,
            filter: "blur(10px)",
        },
        {
            opacity: 1,
            y: 0,
            filter: "blur(0px)",
            ease: "none",
            duration: 1,
            onComplete: () => {
                // показываем курсор
                document.body.classList.remove("cursor-hidden");

                // плавно показываем header
                gsap.to("header", {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    pointerEvents: "auto",
                });
            },

            onReverseComplete: () => {
                // скрываем курсор
                document.body.classList.add("cursor-hidden");

                // прячем header обратно
                gsap.to("header", {
                    opacity: 0,
                    y: -12,
                    duration: 0.4,
                    ease: "power2.in",
                    pointerEvents: "none",
                });
            },
        },
        8
    );


    /* --------------------------------------------------
   ⏳ HOLD — pause for reading (scene breath)
-------------------------------------------------- */
    sceneTl.to(
        {},
        {
            duration: 4, // ⬅️ сколько “молчит” сцена
        }
    );

</script>



