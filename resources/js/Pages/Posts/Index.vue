<template>
    <app-layout title="Lekce">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <button-green :href="route('posts.create')" class="mb-8">
                    <div class="flex">
                        <font-awesome-icon :icon="['fas', 'plus']" class="mr-2"/>
                        Přidat lekci
                    </div>
                </button-green>
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="w-full rounded-2xl">
                        <thead class="border bg-blue-800 shadow-md">
                        <tr>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                ID
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Název
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Vytvořeno
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4 text-center">
                                Možnosti
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="post in posts.data" :key="post.id" class="border hover:bg-blue-100">
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ post.id }}</td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                                {{ post.title.length > 50 ? post.title.substring(0, 50) + ' ...' : post.title }}
                            </td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ post.created_at }}</td>
                            <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap flex justify-center">
                                <edit-btn :url="route('posts.edit', { post: post.id })" class="mr-4"></edit-btn>
                                <delete-btn :url="route('posts.delete', { post: post.id })" :model-name="post.title"></delete-btn>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <simple-pagination :prev-url="posts.links.prev" :next-url="posts.links.next"></simple-pagination>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteBtn from "../../Components/DeleteBtn";
import EditBtn from "../../Components/EditBtn";
import ButtonGreen from "../../Jetstream/ButtonGreen";
import SimplePagination from "../../Components/SimplePagination";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faPlus } from "@fortawesome/free-solid-svg-icons";
import Breadcrumbs from "../../Components/Breadcrumbs";

library.add(faPlus);

export default {
    name: "Posts_Index",
    props: {
        posts: {
            type: Object,
            required: true,
        },
    },
    components: {
        SimplePagination,
        DeleteBtn,
        AppLayout,
        Breadcrumbs,
        EditBtn,
        ButtonGreen,
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Lekce'
                }
            ];
        },
    },
}
</script>

<style scoped>

</style>
