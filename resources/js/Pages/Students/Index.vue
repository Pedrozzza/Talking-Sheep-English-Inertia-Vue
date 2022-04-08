<template>
    <app-layout title="Studenti">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="w-full rounded-2xl">
                        <thead class="border bg-blue-800 shadow-md">
                        <tr>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Jméno
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Email
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Role
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Registrován
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Možnosti
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="student in students.data" :key="student.id" class="border">
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ student.name }}</td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ student.email }}</td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                                <span v-for="(role, index) in student.role" :key="index" >
                                    <user-roles-button :student="student" :role="role" :roles="roles" class="hover:opacity-50"></user-roles-button>
                                </span>
                            </td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ student.created_at_for_human }}</td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap flex justify-center">
<!--                                <edit-btn :url="route('courses.edit', { course: course.id })" class="mr-4"></edit-btn>-->
                                <delete-btn :url="route('students.delete', { user: student.id })" :model-name="student.name"></delete-btn>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <simple-pagination :prev-url="students.links.prev" :next-url="students.links.next"></simple-pagination>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteBtn from "../../Components/DeleteBtn";
import ButtonSecondary from "../../Jetstream/ButtonSecondary";
import SimplePagination from "../../Components/SimplePagination";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserTag } from "@fortawesome/free-solid-svg-icons";
import Breadcrumbs from "../../Components/Breadcrumbs";
import UserRolesButton from "../../Components/UserRolesButton";

library.add(faUserTag);

export default {
    name: "Students_Index",
    props: {
        students: {
            type: Object,
            required: true,
        },
        roles: {
            type: Array,
            required: true,
        }
    },
    components: {
        UserRolesButton,
        SimplePagination,
        ButtonSecondary,
        DeleteBtn,
        AppLayout,
        Breadcrumbs,
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Studenti'
                }
            ];
        },
    }
}
</script>

<style scoped>

</style>
