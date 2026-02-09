import './bootstrap';
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'
import Lenis from 'lenis'
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";


livewire_hot_reload();

gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// Инициализация Lenis
const lenis = new Lenis({
    smooth: true,
})
window.lenis = lenis;

// rAF для Lenis
function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}

requestAnimationFrame(raf)

// Связка Lenis + ScrollTrigger
ScrollTrigger.scrollerProxy(document.body, {
    scrollTop(value) {
        return arguments.length ? lenis.scrollTo(value, {immediate: true}) : window.scrollY
    },
    getBoundingClientRect() {
        return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight}
    },
    pinType: document.body.style.transform ? 'transform' : 'fixed',
})

lenis.on('scroll', ScrollTrigger.update)
ScrollTrigger.refresh()
