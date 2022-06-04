<template>

    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-center mx-6 md:mx-20 my-16 md:my-0">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl pb-10 font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.hero_main_title ?? 'Soukromě, v&nbsp;malý skupince, živě i po skypu.' }}</h1>
                <h2 class="text-3xl pb-10 font-semibold">{{ settings?.data?.hero_main_subtitle ?? 'Na cesty, na zkoušky, k maturitě i do baru!' }}</h2>
                <button-secondary href="/informace" class="text-base md:text-xl shadow-md">{{ settings?.data?.hero_main_button_title ?? 'Naučím tě English, chceš?' }} </button-secondary>
            </div>
        </div>
        <div class="mx-0 my-0 order-first md:order-last">
            <Carousel :autoplay="4000" :transition="1000" :wrap-around="true">
                <slide v-for="slide in slides" :key="slide">
                    <img :src="`storage/carousel-photos/${slide}`" alt="talking sheep english" style="width: 100%" class="h-160">
                </slide>
                <template #addons>
                    <Pagination />
                    <navigation />
                </template>
            </Carousel>
        </div>
    </div>
</template>

<script>
import JetButton from '@/Jetstream/Button.vue';
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
    name: "WelcomeSection",
    components: {
        JetButton,
        Carousel,
        Slide,
        Pagination,
        Navigation,
        ButtonSecondary
    },
    props: {
        settings: {
            type: Object,
            default: null
        },
    },
    data: () => ({
        slides: [
            "slider1.jpeg",
            "slider2.jpeg",
            "slider3.jpg",
            "slider4.jpeg",
            "slider6.jpeg",
            "slider7.jpeg",
            "slider8.jpeg",
        ],
    }),
}
</script>

<style>
.carousel__prev,
.carousel__next {
    background-color: #1e40af !important;
    display: none;
}

@media (min-width: 768px) {
    .carousel__prev {
        display: block;
        margin-left: 2rem;
    }
    .carousel__next {
        display: block;
        margin-right: 2rem;
    }
    .carousel__prev:hover {
        opacity: 0.9;
    }
    .carousel__next:hover {
        opacity: 0.9;
    }

}

.carousel__pagination {
  margin-bottom: -1.5rem;
}

</style>
