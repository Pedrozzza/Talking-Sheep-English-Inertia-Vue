<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Události'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">Seznam aktuálních událostí</h2>
            </div>
            <div>
                <p class="my-8 text-xl 2xl:text-2xl font-bold flex justify-center text-center">
                    Na této strance můžes najít přehled všech aktuálních událostí.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 md:gap-4 xl:gap-12">
                <card v-for="course in courses.data" :key="course.id" class="mx-4 mb-8">
                    <Link :href="route('courses.show', course.id)">
                        <div class="flex justify-center">
                            <div class="rounded-lg shadow-lg bg-white max-w-sm">
                                <div>
                                    <img v-if="course.image" class="w-full rounded-t-lg" :src="`../../storage/courses-photos/${course.image}`" alt="" style="max-height: 185px"/>
                                    <img v-else class="w-full rounded-t-lg" :src="`../../storage/default-photo/default-photo.png`" alt="" style="max-height: 185px"/>
                                </div>
                                <div class="p-6">
                                    <h5 class="text-blue-800 text-center text-xl font-bold mb-2">{{ course.title }}</h5>
                                    <p v-if="course.description" class="text-gray-700 text-justify text-base mb-4">
                                        {{ course.description }}
                                    </p>
                                    <p v-if="course.date_start && course.date_end"><strong>Datum:</strong> {{ format_date(course.date_start) }} - {{ format_date(course.date_end) }}</p>
                                    <p v-if="course.destination"><strong>Místo konání:</strong> {{ course.destination }}</p>
                                    <p v-if="course.price"><strong>Cena:</strong> {{ course.price }},- Kč</p>
                                </div>
                                <div  class="flex justify-center mb-6">
                                    <button-secondary :href="route('courses.show', course.id)">Více info</button-secondary>
                                </div>
                            </div>
                        </div>
                    </Link>
                </card>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import WelcomeLayout from "../Layouts/WelcomeLayout";
import CourseBtn from "../Components/CourseButton";
import moment from 'moment';
import ButtonSecondary from "../Jetstream/ButtonSecondary";

export default {
    name: "Courses",
    components: {
        ButtonSecondary,
        CourseBtn,
        WelcomeLayout,
        Link
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        courses: {
            type: Object,
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
