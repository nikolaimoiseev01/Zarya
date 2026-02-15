<main class="flex-1">
    <x-welcome-block/>

    {{--    <section style="background-image: url('/fixed/welcome-bg.png')"--}}
{{--             class="w-full bg-cover h-screen relative flex items-center justify-center mb-20">--}}
{{--        <div class="flex flex-col relative text-center content">--}}
{{--            <x-logo color="orange" class="w-96 sm:w-[90%]"/>--}}
{{--            <h2 class="text-5xl text-white md:text-4xl text-left mb-12">Брендинговое агенство,<br>--}}
{{--                помогающее FMCG брендам<br>--}}
{{--                решать ключевые бизнес-<br>--}}
{{--                задачи через маркетинг<br> и айдентику</h2>--}}
{{--            <a href=""--}}
{{--               class="text-2xl px-8 py-3 bg-orange-500 text-white rounded-3xl font-medium transition w-fit flex gap-6 items-center justify-center">--}}
{{--                Посмотреть кейсы--}}
{{--                <svg width="30" height="25" viewBox="0 0 30 25" fill="none"--}}
{{--                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path--}}
{{--                        d="M15.6554 0C16.62 0 17.5845 -2.38801e-08 18.5491 0.0241313C18.4254 4.97104 22.2094 9.65251 27.1311 10.7625C28.0462 11.0521 29.0354 11.0039 30 11.1004C30 12.0415 30 12.9826 30 13.8996C28.1451 13.9961 26.2655 14.2616 24.6331 15.1786C20.9728 17.0608 18.5243 20.9459 18.5243 25C17.5598 25 16.5952 25 15.6554 25C15.6307 20.6805 17.8071 16.4334 21.3932 13.8755C14.2704 13.8996 7.12284 13.8755 0 13.8755C0.0247321 12.9585 0.0247321 12.0174 0 11.0763C7.0981 11.1487 14.2209 11.1004 21.3438 11.1245C18.8458 9.19402 16.8425 6.56371 16.1006 3.52317C15.8038 2.389 15.6801 1.18243 15.6554 0Z"--}}
{{--                        fill="white"/>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="section-3 mt-8 content py-8 border-y border-black mb-20">
        <h2 class="text-3xl font-medium text-center">Работаем от зари до зари — вместе с лучшими
            брендами</h2>
    </section>


    <x-ui.marquee :marqueeClients="$clients"/>

    <section class="section-4 content mb-20">
        <h3 class="uppercase border-b text-2xl font-medium border-black pb-2 mb-8">Проекты, <span
                class="text-orange-500">Заря</span>женные на успех</h3>
        <div class="grid grid-cols-4 md:grid-cols-2 sm:!grid-cols-1 gap-16 mx-auto justify-center">
            @foreach($projects->take(4) as $project)
                <div class="flex flex-col gap-4 items-center">
                    <p class="text-xl font-medium">{{$project['title']}}</p>
                    <img src="{{$project->getFirstMediaUrl('cover')}}"
                         class="rounded-full w-64 h-64 min-h-64 min-w-64 overflow-hidden object-cover" alt="">
                    <div class="flex flex-col items-center gap-2">
                        @foreach($project['services'] as $service)
                            <span
                                class="rounded-3xl border border-black px-4 text-center w-fit">{{$service}}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="cases" class="content flex items-end gap-16 mb-20 md:flex-col md:text-center pt-28 -mt-28 ">
        <h3 class="font-bim text-6xl lg:text-5xl md:text-4xl">Заря - <span class="underline">агентство, превращающее<br> смысл в форму.</span>
            Мы помогаем<br>объяснить сложное и выстроить<br>целостный образ</h3>
{{--        <a href=""--}}
{{--           class="text-2xl h-auto px-8 py-3 bg-orange-500 text-white rounded-3xl font-medium transition w-fit flex gap-6 items-center justify-center md:mx-auto">--}}
{{--            Подробнее--}}
{{--        </a>--}}
    </section>

    <x-project-modal :description="$project['description']"/>
    <section class="content grid grid-cols-3 grid-rows-3 mb-32 lg:grid-cols-2 md:!grid-cols-1">
        @foreach($projects->take(9) as $project)
            <a x-on:click="$dispatch('open-modal', 'confirm-delete');
            $dispatch('change-modal-description', {
                description: @js($project['description'])
            });
        " class="group relative aspect-square overflow-hidden text-white cursor-pointer">
                {{-- Background image layer --}}
                <div
                    class="absolute inset-0 bg-cover bg-center
               transition-transform duration-1000 ease-[cubic-bezier(.16,1,.3,1)]
               group-hover:scale-105"
                    style="background-image: url('{{ $project->getFirstMediaUrl('cover') }}')"
                ></div>

                {{-- Overlay --}}
                <div
                    class="absolute inset-0 bg-black/0
               transition-all duration-500 ease-out
               group-hover:bg-black/60
               group-hover:backdrop-blur-[2px]"
                ></div>

                {{-- Content --}}
                <div class="relative z-10 p-8 flex flex-col justify-center h-full">
                    <h3
                        class="text-3xl font-bold mb-2
                   translate-y-6 opacity-0
                   transition-all duration-500 ease-out
                   group-hover:translate-y-0
                   group-hover:opacity-100"
                    >
                        {{ $project['title'] }}
                    </h3>

                    <p
                        class="text-2xl font-semibold
                   translate-y-8 opacity-0
                   transition-all duration-700 ease-out delay-100
                   group-hover:translate-y-0
                   group-hover:opacity-100"
                    >
                        {{ $project['summary'] }}
                    </p>
                </div>
            </a>

        @endforeach
    </section>

    <section id="services" class="content flex justify-center gap-96 mb-32 lg:flex-col lg:gap-16 pt-28 -mt-28 ">
        <h2 class="text-orange-500 text-4xl">Услуги</h2>

        @php
            $services = ['Брендинг & айдентика', 'Web дизайн & разработка', 'E-commers & прирост ЦА', 'Сувенирка & ивенты']
        @endphp
        <div class="flex flex-col">
            @foreach($services as $service)
                <span class="text-4xl border-b-2 border-black pb-4 mb-4">{{$service}}</span>
            @endforeach
        </div>
    </section>

{{--    <section style="background-image: url('fixed/block-2-bg.png')"--}}
{{--             class="h-screen bg-cover w-full flex items-center justify-center">--}}
{{--        <h3 class="text-6xl text-white font-black ">--}}
{{--            Заря ---}}
{{--        </h3>--}}
{{--    </section>--}}

    <section class="bg-orange-500 py-32">
        <div class="content flex gap-16 lg:flex-col">
            <div class="flex flex-col text-white w-1/2 lg:w-full">
                <p class="text-6xl font-medium mb-16">Давайте<br>создадим<br>что-то новое<br>вместе
                </p>
                @php
                    $cons = ['УПАКОВКА', 'РЕБРЕНДИНГ / РЕДИЗАЙН',
                     'СТРАТЕГИЯ', 'ПОЗИЦИОНИРОВАНИЕ', 'исследования и аналитика',
                      'Фирменный стиль и айдентика', 'мерч и UGC']
                @endphp
                <div class="flex gap-4 flex-wrap">
                    @foreach($cons as $con)
                        <span
                            class="border border-white text-xl rounded-3xl px-6 py-2 uppercase w-fit">{{$con}}</span>
                    @endforeach
                </div>
            </div>
            <livewire:components.contact-form/>
        </div>
    </section>

    <section class="bg-orange-500 py-32 text-black">
        <div class="flex gap-16 px-4 justify-center font-medium text-center text-[4vw] md:text-5xl md:flex-col md:items-center">
            <span>Заряжаем на успех</span>
            <svg width="69" height="57" viewBox="0 0 69 57" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1_769)">
                    <g clip-path="url(#clip1_1_769)">
                        <path
                            d="M38.5604 1.15576C40.8116 1.15576 43.0629 1.15576 45.3142 1.21349C45.0256 13.0471 53.8575 24.2458 65.3448 26.9012C67.4807 27.5939 69.7897 27.4784 72.041 27.7093C72.041 29.9606 72.041 32.2119 72.041 34.4055C67.7116 34.6364 63.3245 35.2713 59.5146 37.4649C50.9713 41.9675 45.2565 51.2612 45.2565 60.959C43.0052 60.959 40.7539 60.959 38.5604 60.959C38.5026 50.6262 43.5825 40.4666 51.9526 34.3477C35.3278 34.4055 18.6452 34.3477 2.02032 34.3477C2.07805 32.1542 2.07805 29.9029 2.02032 27.6516C18.5875 27.8248 35.2123 27.7093 51.8372 27.7671C46.0069 23.1491 41.3312 16.857 39.5994 9.58364C38.9067 6.87055 38.6181 3.9843 38.5604 1.15576Z"
                            fill="#18181A"/>
                    </g>
                </g>
                <defs>
                    <clipPath id="clip0_1_769">
                        <rect width="68.2453" height="57.0031" fill="white"/>
                    </clipPath>
                    <clipPath id="clip1_1_769">
                        <rect width="74.985" height="62.6325" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <span>Заряжаем на успех</span>
        </div>
    </section>
</main>

