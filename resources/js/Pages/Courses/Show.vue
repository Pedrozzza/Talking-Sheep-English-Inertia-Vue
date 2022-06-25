<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Události'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 mb-8 text-xl md:text-2xl 2xl:text-4xl font-extrabold text-blue-800 text-shadow-md">{{ course.data.title }}</h2>
            </div>
            <p v-if="course.data.date_start && course.data.date_end" class="mb-4"><strong>Datum události:</strong> {{ format_date(course.data.date_start) }} - {{ format_date(course.data.date_end) }}</p>
            <p v-if="course.data.destination" class="mb-4"><strong>Místo konání:</strong> {{ course.data.destination }}</p>
            <p v-if="course.data.price" class="mb-4"><strong>Cena:</strong> {{ course.data.price }},- Kč</p>
            <hr>
            <div v-if="course.data.main_description" class="p-6">
                <div class="md:text-justify" v-html="course.data.main_description">
                </div>
            </div>
            <hr>
            <div v-if="course.data.images">
                <p class="my-4">Galerie:</p>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-10">
                    <div v-for="(item, index) in course.data.images" :key="index" >
                        <img class="p-4 cursor-pointer" data-fancybox="gallery" :src="`../../../storage/course-galleries/${item}`" alt="talking sheep english" />
                    </div>
                </div>
            </div>

            <div  class="flex flex-col md:flex-row justify-between my-12 2xl:my-20">
                <Link class="mb-8 md:mb-0 cursor-pointer text-base 2xl:text-xl shadow-md justify-center inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition" :href="route('courses')">
                    Zpět na výpis událostí
                </Link>
                <a :href="`${course.data.url}`" target="_blank" rel="noopener" class="inline-flex justify-center items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md
    font-semibold text-xl 2xl:text-3xl text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none
    focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Chci se zúčastnit!</a>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import WelcomeLayout from "../../Layouts/WelcomeLayout";
import ButtonSecondary from "../../Jetstream/ButtonSecondary";
import moment from 'moment';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "Show",
    components: {
        WelcomeLayout,
        ButtonSecondary,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        course: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            index: null
        }
    },
    methods: {
        format_date(value){
            if (value) {
                return moment(String(value)).format('DD.MM.YYYY')
            }
        },
    }
}
</script>

<style scoped>

</style>
