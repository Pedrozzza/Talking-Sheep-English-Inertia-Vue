<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Galerie'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">Galerie</h2>
            </div>
            <div>
                <p class="my-8 text-xl 2xl:text-2xl font-bold flex justify-center text-center">
                    Výběr fotek a videí z lekcí a proběhlých akcí
                </p>
            </div>
            <div class="grid grid-cols-1">
                <card class="mx-4 mb-8 p-4 rounded-lg shadow-lg bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8 justify-center">
                        <div class="p-6">
                            <h5 class="text-blue-800 text-xl font-bold mb-6">Víkend s angličtinou pro děti (10. - 12. červen 2022)</h5>
                            <p class="text-gray-700 text-justify text-base mb-4">
                                Chaloupka v Bílé Třemešné.<br><br>
                                Hraní her, soutěžení v týmech, povídání a vyprávění příběhů, zpívání, chození na výlety a
                                opékání buřtíků. Mrkni na video z tohoto výletu.
                            </p>
                        </div>
                        <div  class="flex justify-center">
                            <video class="video" controls>
                                <source src="video/VikendAnglictinaDeti.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </card>
                <card v-for="gallery in galleries.data" :key="gallery.id" class="mx-4 mb-8 p-4 rounded-lg shadow-lg bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8 justify-center">
                        <div class="p-6">
                            <h5 class="text-blue-800 text-xl font-bold mb-6">{{ gallery.name }}</h5>
                            <p class="text-gray-700 text-justify text-base mb-4">
                                {{ gallery.description }}
                            </p>
                        </div>
                        <div  class="flex justify-center">
                            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-10">
                                <div v-for="(item, index) in gallery.images" :key="index" >
                                    <img class="p-2 cursor-pointer" data-fancybox="gallery" :src="`../../../storage/galleries-media/${item}`" alt="talking sheep english" />
                                </div>
                            </div>
                        </div>
                    </div>
                </card>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import WelcomeLayout from "../Layouts/WelcomeLayout";

export default {
    name: "Gallery",
    components: {
        WelcomeLayout,
        Link
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        galleries: {
            type: Object,
        }
    },
}
</script>

<style scoped>

</style>
