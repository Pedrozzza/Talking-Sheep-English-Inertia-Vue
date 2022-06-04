<template>
    <app-layout title="Události">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <button-green :href="route('courses.create')" class="mb-8">
                    <div class="flex">
                        <font-awesome-icon :icon="['fas', 'plus']" class="mr-2"/>
                        Přidat událost
                    </div>
                </button-green>
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="w-full rounded-2xl">
                        <thead class="border bg-blue-800 shadow-md">
                            <tr>
                                <th scope="col" class="w-1/2 text-left text-xl font-bold text-white px-6 py-4">
                                    Název události
                                </th>
                                <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                    Vytvořeno
                                </th>
                                <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                    Uchazeči
                                </th>
                                <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                    Možnosti
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="course in courses.data" :key="course.id" class="border hover:bg-blue-100">
                                <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ course.title }}</td>
                                <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap">{{ course.created_at_for_human }}</td>
                                <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap">
                                    <div v-if="course.show_button" class="hover:opacity-50">
                                        <course-users-btn :model-name="course.title" :course="course"></course-users-btn>
                                    </div>
                                    <div v-else></div>
                                </td>
                                <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap flex justify-center">
                                    <edit-btn :url="route('courses.edit', { course: course.id })" class="mr-4"></edit-btn>
                                    <delete-btn :url="route('courses.delete', { course: course.id })" :model-name="course.title"></delete-btn>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <simple-pagination :prev-url="courses.links.prev" :next-url="courses.links.next"></simple-pagination>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout.vue'
import EditBtn from "../../Components/EditBtn";
import DeleteBtn from "../../Components/DeleteBtn";
import ButtonSecondary from "../../Jetstream/ButtonSecondary";
import SimplePagination from "../../Components/SimplePagination";
import ButtonGreen from "../../Jetstream/ButtonGreen";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faPlus, faUsers } from "@fortawesome/free-solid-svg-icons";
import Breadcrumbs from "../../Components/Breadcrumbs";
import CourseUsersBtn from "../../Components/CourseUsersButton";

library.add(faPlus, faUsers);

export default {
    name: "Courses_Index",
    props: {
        courses: {
            type: Object,
            required: true,
        },
    },
    components: {
        CourseUsersBtn,
        ButtonGreen,
        SimplePagination,
        ButtonSecondary,
        DeleteBtn,
        EditBtn,
        AppLayout,
        Breadcrumbs,
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Události'
                }
            ];
        },
    }
}
</script>

<style scoped>

</style>
