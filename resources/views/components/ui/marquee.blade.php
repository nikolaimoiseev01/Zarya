<style>
    .marquee.left {
        animation: scrolling-left var(--marquee-time) linear infinite;
    }

    .marquee.right {
        animation: scrolling-right var(--marquee-time) linear infinite;
    }

    .marquee:hover {
        animation-play-state: paused;
    }

    @keyframes scrolling-left {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-1 * var(--marquee-width)));
        }
    }

    @keyframes scrolling-right {
        0% {
            transform: translateX(calc(-1 * var(--marquee-width)));
        }
        100% {
            transform: translateX(0);
        }
    }
</style>
<section class="mb-20">
    <div class="overflow-hidden mx-auto py-2 relative">

        <div class="bg-gradient-to-r from-white to-transparent absolute h-full w-32 left-0 top-0 z-10"/></div>
        <div class="bg-gradient-to-l from-white to-transparent absolute h-full w-32 right-0 top-0 z-10"></div>
        <div class="marquee py-3 left inline-flex space-x-16 max-w-full items-center"
             x-data="Marquee({speed: 0.5, spaceX: 16, dynamicWidthElements: true})">
            @foreach($clients1 as $key=>$client)
                <div class="flex-shrink-0 flex items-center gap-2">
                    <img src="{{$client->getFirstMediaUrl('cover')}}" class="max-h-20 w-auto">
                    <span class="font-bim text-3xl font-medium uppercase">{{$client['name']}}</span>
                </div>
            @endforeach
        </div>

        <div class="marquee py-3 right inline-flex space-x-16 max-w-full items-center"
             x-data="Marquee({speed: 0.5, spaceX: 16, dynamicWidthElements: true})">
            @foreach($clients2 as $key=>$client)
                <div class="flex-shrink-0 flex items-center gap-2">
                    <img src="{{$client->getFirstMediaUrl('cover')}}" class="max-h-20 w-auto">
                    <span class="font-alt text-3xl font-medium uppercase">{{$client['name']}}</span>
                </div>
            @endforeach
        </div>

    </div>
    <script>
        /**
         * See https://stackoverflow.com/a/24004942/11784757
         */
        const debounce = (func, wait, immediate = true) => {
            let timeout
            return () => {
                const context = this
                const args = arguments
                const callNow = immediate && !timeout
                clearTimeout(timeout)
                timeout = setTimeout(function () {
                    timeout = null
                    if (!immediate) {
                        func.apply(context, args)
                    }
                }, wait)
                if (callNow) func.apply(context, args)
            }
        }

        /**
         * Append the child element and wait for the parent's
         * dimensions to be recalculated
         * See https://stackoverflow.com/a/66172042/11784757
         */
        const appendChildAwaitLayout = (parent, element) => {
            return new Promise((resolve, _) => {
                const resizeObserver = new ResizeObserver((entries, observer) => {
                    observer.disconnect()
                    resolve(entries)
                })
                resizeObserver.observe(element)
                parent.appendChild(element)
            })
        }

        document.addEventListener('alpine:init', () => {
            Alpine.data(
                'Marquee',
                ({speed = 1, spaceX = 0, dynamicWidthElements = false, direction = 'left'}) => ({
                    dynamicWidthElements,
                    direction,
                    async init() {
                        if (this.dynamicWidthElements) {
                            const images = this.$el.querySelectorAll('img')
                            // If there are any images, make sure they are loaded before
                            // we start cloning them, since their width might be dynamically
                            // calculated
                            if (images) {
                                await Promise.all(
                                    Array.from(images).map(image => {
                                        return new Promise((resolve, _) => {
                                            if (image.complete) {
                                                resolve()
                                            } else {
                                                image.addEventListener('load', () => {
                                                    resolve()
                                                })
                                            }
                                        })
                                    })
                                )
                            }
                        }

                        // Store the original element so we can restore it on screen resize later
                        this.originalElement = this.$el.cloneNode(true)
                        const originalWidth = this.$el.scrollWidth + spaceX * 4
                        // Required for the marquee scroll animation
                        // to loop smoothly without jumping
                        this.$el.style.setProperty('--marquee-width', originalWidth + 'px')
                        this.$el.style.setProperty(
                            '--marquee-time',
                            ((1 / speed) * originalWidth) / 100 + 's'
                        )
                        this.resize()
                        // Make sure the resize function can only be called once every 100ms
                        // Not strictly necessary but stops lag when resizing window a bit
                        window.addEventListener('resize', debounce(this.resize.bind(this), 100))
                    },
                    async resize() {
                        // Reset to original number of elements
                        this.$el.innerHTML = this.originalElement.innerHTML

                        // Keep cloning elements until marquee starts to overflow
                        let i = 0
                        while (this.$el.scrollWidth <= this.$el.clientWidth) {
                            if (this.dynamicWidthElements) {
                                // If we don't give this.$el time to recalculate its dimensions
                                // when adding child nodes, the scrollWidth and clientWidth won't
                                // change, thus resulting in this while loop looping forever
                                await appendChildAwaitLayout(
                                    this.$el,
                                    this.originalElement.children[i].cloneNode(true)
                                )
                            } else {
                                this.$el.appendChild(
                                    this.originalElement.children[i].cloneNode(true)
                                )
                            }
                            i += 1
                            i = i % this.originalElement.childElementCount
                        }

                        // Add another (original element count) of clones so the animation
                        // has enough elements off-screen to scroll into view
                        let j = 0
                        while (j < this.originalElement.childElementCount) {
                            this.$el.appendChild(this.originalElement.children[i].cloneNode(true))
                            j += 1
                            i += 1
                            i = i % this.originalElement.childElementCount
                        }
                    },
                })
            )
        })
    </script>
</section>
