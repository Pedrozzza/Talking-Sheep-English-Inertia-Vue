<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Události'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">Seznam aktuálních událostí</h2>
            </div>
            <div>
                <p class="my-8 text-2xl font-bold flex justify-center">
                    Na této strance můžes najít přehled všech aktuálních událostí. Registrovaní uživatelé se mohou také přímo přihlašovat.
                </p>
            </div>
            <div class="flex justify-between px-2 mb-16">
                <div class="grid grid-cols-4">
                    <card v-for="course in courses.data" :key="course.id" class="mx-4 mb-8">
                        <div class="flex justify-center">
                            <div class="rounded-lg shadow-lg bg-white max-w-sm">
                                <a href="#!">
                                    <img v-if="course.image" class="w-full rounded-t-lg" :src="`../../storage/courses-photos/${course.image}`" alt="" style="max-height: 185px"/>
                                    <img v-else class="w-full rounded-t-lg" :src="`../../storage/default-photo/default-photo.png`" alt="" style="max-height: 185px"/>
                                </a>
                                <div class="p-6">
                                    <h5 class="text-blue-800 text-center text-xl font-bold mb-2">{{ course.title }}</h5>
                                    <p v-if="course.description" class="text-gray-700 text-justify text-base mb-4">
                                        {{ course.description }}
                                    </p>
                                    <p v-if="course.date_start && course.date_end"><strong>Datum:</strong> {{ format_date(course.date_start) }} - {{ format_date(course.date_end) }}</p>
                                    <p v-if="course.destination"><strong>Místo konání:</strong> {{ course.destination }}</p>
                                    <p v-if="course.price"><strong>Cena:</strong> {{ course.price }},- Kč</p>
                                </div>
                                <div  v-if="course.show_button && $page.props.user" class="flex justify-center mb-6">
                                    <course-btn :model-name="course.title" :course-id="course.id"></course-btn>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import WelcomeLayout from "../Layouts/WelcomeLayout";
import CourseBtn from "../Components/CourseButton";
import moment from 'moment';

export default {
    name: "Courses",
    components: {
        CourseBtn,
        WelcomeLayout,
        ButtonSecondary
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
