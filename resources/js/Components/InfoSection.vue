<template>
    <div class="h-32 md:h-28 2xl:h-52 bg-gradient-to-b from-red-900 to-red-800">
        <div class="flex justify-around text-center md:hidden">
            <h1 class="flex justify-center text-center text-3xl md:text-6xl pt-8 md:pt-20 text-white font-bold">Chrudim a okolí naživo. Online kdekoliv po ČR</h1>
        </div>
        <div class="hidden flex justify-around text-center md:flex">
            <h1 class="flex justify-center text-center text-3xl md:text-4xl xl:text-3xl 2xl:text-6xl pt-8 2xl:pt-20 text-white font-bold">Chrudim a okolí naživo</h1>
            <div class="arrow bounce 2xl:mt-12">
                <a href="#tabs">
                    <img class="mx-auto" src="../../img/logo/logo_small.png" alt="Anglictina Chrudim" style="width: 40px">
                    <p class="font-bold text-base 2xl:text-2xl text-white" style="align-items:center">Více info</p>
                    <font-awesome-icon :icon="['fas', 'angle-double-down']" size="lg" class="text-white" style="width: 30px"/>
                </a>
            </div>
            <h1 class="flex justify-center text-center text-3xl md:text-4xl xl:text-3xl 2xl:text-6xl pt-8 2xl:pt-20 text-white font-bold">Online kdekoliv po ČR</h1>
        </div>
    </div>
    <tabs :settings="settings"></tabs>
    <div class="bg-split-white-red flex justify-center items-center">
        <div class="container">
            <div class="pb-8 grid grid-cols-1 md:grid-cols-3 2xl:gap-4">
                <div class="hidden p-10 md:block">
                    <img class="mx-auto mt-12" src="../../img/logo/logo_bw_left2.png" alt="Anglictina Chrudim">
                </div>
                <div class="p-4 md:p-10">
                    <contact-form :title="'V případě zájmu nebo jakýkoliv dotazů, mě neváhej kontaktovat.'"></contact-form>
                </div>
                <div class="p-0 md:p-10">
                    <img class="mx-auto mt-12 sheep" src="../../img/logo/logo_bw_right2.png" alt="Anglictina Chrudim">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Tabs from "./Tabs";
import ContactForm from "./ContactForm";
import { Head, Link } from '@inertiajs/inertia-vue3';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faAngleDoubleDown } from "@fortawesome/free-solid-svg-icons";

library.add(faAngleDoubleDown);

export default {
    name: "InfoSection",
    components: {
        ContactForm,
        Tabs,
        Link
    },
    props: {
        settings: {
            type: Object,
            default: null
        },
    },

}
</script>

<style scoped>

.arrow {
    text-align: center;
}
.bounce {
    -moz-animation: bounce 2s infinite;
    -webkit-animation: bounce 2s infinite;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-30px);
    }
    60% {
        transform: translateY(-15px);
    }
}

@media (max-width: 640px) {
    .sheep {
        width: 50%;
    }
}
</style>
