import './bootstrap';
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'
import Lenis from 'lenis'
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";


livewire_hot_reload();

gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

let lenis = null
let rafId = null

function initLenis() {
    if (lenis) return

    lenis = new Lenis({
        smooth: true,
    })

    function raf(time) {
        lenis?.raf(time)
        rafId = requestAnimationFrame(raf)
    }

    rafId = requestAnimationFrame(raf)

    ScrollTrigger.scrollerProxy(document.body, {
        scrollTop(value) {
            return arguments.length
                ? lenis.scrollTo(value, { immediate: true })
                : window.scrollY
        },
        getBoundingClientRect() {
            return {
                top: 0,
                left: 0,
                width: window.innerWidth,
                height: window.innerHeight,
            }
        },
        pinType: document.body.style.transform ? 'transform' : 'fixed',
    })

    lenis.on('scroll', ScrollTrigger.update)
    ScrollTrigger.refresh()
}

function destroyLenis() {
    if (!lenis) return

    cancelAnimationFrame(rafId)
    lenis.destroy()
    lenis = null

    ScrollTrigger.scrollerProxy(document.body, null)
    ScrollTrigger.refresh()
}

function handleResize() {
    if (window.innerWidth < 712) {
        destroyLenis()
    } else {
        initLenis()
    }
}

// Инициализация при старте
handleResize()

// Отслеживание resize
window.addEventListener('resize', handleResize)
