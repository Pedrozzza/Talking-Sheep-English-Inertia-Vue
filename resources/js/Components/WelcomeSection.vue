<template>

    <div class="grid grid-cols-2 gap-8 mx-20">
        <div class="flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-5xl pb-10 font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.hero_main_title ?? 'Soukromě, v malý skupince, živě i po skypu.' }}</h1>
                <h2 class="text-3xl pb-10 font-semibold">{{ settings?.data?.hero_main_subtitle ?? 'Na cesty, na zkoušky, k maturitě i do baru!' }}</h2>
                <button-secondary class="text-xl shadow-md">{{ settings?.data?.hero_main_button_title ?? 'Naučím tě English, chceš?' }} </button-secondary>
            </div>
        </div>
        <div class="items-center justify-center m-16 my-32 shadow-lg">
            <Carousel :autoplay="5000" :transition="1000" :wrap-around="true" :pauseAutoplayOnHove="true">
                <slide v-for="slide in slides" :key="slide">
                    <img :src="`storage/carousel-photos/${slide}`" alt="talking sheep english" style="width: 100%">
                </slide>
                <template #addons>
                    <Pagination />
                    <navigation/>
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
            "picture1.jpg",
            "picture2.jpeg",
            "picture3.jpg",
            "picture4.jpeg",
            "picture5.jpg"
        ],
    }),
}
</script>

<style>
.carousel__prev,
.carousel__next {
    background-color: #1e40af !important;
}

</style>
