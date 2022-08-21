<template>
    <app-layout title="Galerie">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <button-green :href="route('galleries.create')" class="mb-8">
                    <div class="flex">
                        <font-awesome-icon :icon="['fas', 'plus']" class="mr-2"/>
                        Přidat galerii
                    </div>
                </button-green>
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="w-full rounded-2xl">
                        <thead class="border bg-blue-800 shadow-md">
                        <tr>
                            <th scope="col" class="w-1/2 text-left text-xl font-bold text-white px-6 py-4">
                                Název galerie
                            </th>
                            <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                Možnosti
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="gallery in galleries.data" :key="gallery.id" class="border hover:bg-blue-100">
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ gallery.name }}</td>
                            <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap flex justify-center">
                                <edit-btn :url="route('galleries.edit', { gallery: gallery.id })" class="mr-4"></edit-btn>
                                <delete-btn :url="route('galleries.delete', { gallery: gallery.id })" :model-name="gallery.name"></delete-btn>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <simple-pagination :prev-url="galleries.links.prev" :next-url="galleries.links.next"></simple-pagination>
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
    name: "Galleries_Index",
    props: {
        galleries: {
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
                    label: 'Galerie'
                }
            ];
        },
    }
}
</script>

<style scoped>

</style>
