<template>
    <app-layout title="Úkoly">
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
                                ID
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Jméno studenta
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Číslo úkolu
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4">
                                Odevzdáno
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4 text-center">
                                Zkontrolováno
                            </th>
                            <th scope="col" class="text-left text-xl font-bold text-white px-6 py-4 text-center">
                                Možnosti
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="homework in homeworks.data" :key="homework.id" class="border hover:bg-blue-100">
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ homework.user_id }}</td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ homework.name }}</td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ homework.homework_number }}</td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ homework.created_at }}</td>
                            <td @click.prevent="changeStatus(homework.id)" class="px-6 py-4 whitespace-nowrap text-center">
                                <div v-if="homework.checked"  class="text-green-600 hover:opacity-50 cursor-pointer">
                                    <font-awesome-icon :icon="['fas', 'check-circle']" class="mr-2"/>Ano
                                </div>
                                <div v-else class="text-red-700 hover:opacity-50 cursor-pointer">
                                   <font-awesome-icon :icon="['fas', 'times-circle']" class="mr-2"/>Ne
                                </div>
                            </td>
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap text-center flex justify-around">
                                <a :href="`/storage/homework_upload/${homework.file}`" class="hover:opacity-50">
                                    <font-awesome-icon :icon="['fas', 'download']" class="mr-2 text-green-600"/>
                                </a>
                                <delete-btn :url="route('homeworks.delete', { homework: homework.id })" :model-name="homework.file"></delete-btn>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <simple-pagination :prev-url="homeworks.links.prev" :next-url="homeworks.links.next"></simple-pagination>
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
import { faUserTag, faDownload, faCheckCircle, faTimesCircle } from "@fortawesome/free-solid-svg-icons";
import Breadcrumbs from "../../Components/Breadcrumbs";

library.add(faUserTag, faDownload, faCheckCircle, faTimesCircle);

export default {
    name: "Students_Index",
    props: {
        homeworks: {
            type: Object,
            required: true,
        },
    },
    components: {
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
                    label: 'Úkoly'
                }
            ];
        },
    },
    methods: {
        changeStatus(homework) {
            this.$inertia.post(route('homeworks.update', {_method:'PUT', homework:homework }), {
                preserveScroll: true,
            });
        }
    }
}
</script>

<style scoped>

</style>
