<template>
    <app-layout title="Zprávy">
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
                            <th scope="col" class="w-1/2 text-left text-xl font-bold text-white px-6 py-4">
                                Jméno
                            </th>
                            <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                Email
                            </th>
                            <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                Telefon
                            </th>
                            <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                Zpráva
                            </th>
                            <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                Datum
                            </th>
                            <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                Možnosti
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="message in messages.data" :key="message.id" class="border hover:bg-blue-100">
                            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ message.name }}</td>
                            <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap">{{ message.email }}</td>
                            <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap">{{ message.phone_number }}</td>
                            <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap">
                                <message-button :message="message.message" :name="message.name"></message-button>
                            </td>
                            <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap">{{ message.created_at }}</td>
                            <td class="text-center text-gray-900 px-6 py-4 whitespace-nowrap flex justify-center">
                                <delete-btn :url="route('messages.delete', { message: message.id })" :model-name="message.name"></delete-btn>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <simple-pagination :prev-url="messages.links.prev" :next-url="messages.links.next"></simple-pagination>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteBtn from "../../Components/DeleteBtn";
import SimplePagination from "../../Components/SimplePagination";
import Breadcrumbs from "../../Components/Breadcrumbs";
import MessageButton from "../../Components/MessageButton";

export default {
    name: "Index",
    props: {
        messages: {
            type: Object,
            required: true,
        },
    },
    components: {
        MessageButton,
        SimplePagination,
        DeleteBtn,
        AppLayout,
        Breadcrumbs,
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Zprávy'
                }
            ];
        },
    }
}
</script>

<style scoped>

</style>
