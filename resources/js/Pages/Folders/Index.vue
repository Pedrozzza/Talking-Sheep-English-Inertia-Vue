<template>
    <app-layout title="Kategorie">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <button-green :href="route('folders.create')" class="mb-8">
                    <div class="flex">
                        <font-awesome-icon :icon="['fas', 'plus']" class="mr-2"/>
                        Přidat kategorii
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
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4 text-center">
                                Viditelnost
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4 text-center">
                                Vytvořeno
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4 text-center">
                                Lekce
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4 text-center">
                                Možnosti
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="folder in folders.data" :key="folder.id" class="border hover:bg-blue-100">
                                <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ folder.id }}</td>
                                <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                                    {{ folder.title.length > 50 ? folder.title.substring(0, 50) + ' ...' : folder.title }}
                                </td>
                                <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                                    <folder-visibility-button :folder="folder" :visibilities="visibilities" class="hover:opacity-50"></folder-visibility-button>
                                </td>
                                <td class="text-gray-900 px-6 py-4 whitespace-nowrap text-center">{{ folder.created_at }}</td>
                                <td class="text-gray-900 px-6 py-4 whitespace-nowrap text-center">
                                    <posts-button :model-name="folder.title" :folder="folder"></posts-button>
                                </td>
                                <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap flex justify-center">
                                    <edit-btn :url="route('folders.edit', { folder: folder.id })" class="mr-4"></edit-btn>
                                    <delete-btn :url="route('folders.delete', { folder: folder.id })" :model-name="folder.title"></delete-btn>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <simple-pagination :prev-url="folders.links.prev" :next-url="folders.links.next"></simple-pagination>
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
import FolderVisibilityButton from "../../Components/FolderVisibilityButton";
import ButtonGreen from "../../Jetstream/ButtonGreen";
import SimplePagination from "../../Components/SimplePagination";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faPlus } from "@fortawesome/free-solid-svg-icons";
import Breadcrumbs from "../../Components/Breadcrumbs";
import PostsButton from "../../Components/PostsButton";

library.add(faPlus);

export default {
    name: "Folders_Index",
    props: {
        folders: {
            type: Object,
            required: true,
        },
        visibilities: {
            type: Array,
            required: true,
        }
    },
    components: {
        PostsButton,
        SimplePagination,
        DeleteBtn,
        AppLayout,
        Breadcrumbs,
        EditBtn,
        ButtonGreen,
        FolderVisibilityButton
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Kategorie'
                }
            ];
        },
    },
}
</script>

<style scoped>

</style>
