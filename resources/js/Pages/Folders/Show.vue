<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>
        <div class="py-12 px-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl rounded md:rounded-lg">
                    <div class="mb-8">
                        <div class="mb-8 p-8 flex flex-col md:flex-row md:justify-between md:items-center" :style="{'background-color': `${folder.data.color}`}">
                            <h2 class="ml-0 mb-8 md:ml-8 md:mb-0 text-2xl font-extrabold text-white text-shadow-md">{{ folder.data.title }}</h2>
                            <p class="mr-8 text-white text-shadow-md">Úroveň: <span class="font-bold">{{ level }}</span></p>
                        </div>
                        <div v-if="folder.data.description" class="p-6">
                            <p class="text-xl font-bold mb-4">Popis:</p>
                            <div class="md:text-justify" v-html="folder.data.description">
                            </div>
                        </div>
                    </div>
                    <hr class="my-2"/>
                    <div class="p-6">
                        <p class="text-xl font-bold mb-4">Lekce:</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-3 lg:grid-cols-4 lg:gap-4">
                            <post-card v-for="post in folder.data.posts" :key="post.id" :post="post"></post-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import PostCard from "../../Components/PostCard";
import Breadcrumbs from "../../Components/Breadcrumbs";

export default {
    name: "Folder_show",
    props: {
        folder: {
            type: Object,
            required: true,
        }
    },
    components: {
        PostCard,
        AppLayout,
        Breadcrumbs,
    },
    computed: {
        level() {
            switch (this.folder.data.visibility) {
                case 'beginner': {
                    return 'začátečník';
                }
                case 'intermediate': {
                    return 'středně pokročilý';
                }
                case 'advanced': {
                    return 'pokročilý';
                }
            }
        },
        breadcrumbs() {
            return [
                {
                    label: 'Studovna',
                    url: route('dashboard')
                },
                {
                    label: `${this.folder.data.title}`
                }
            ];
        }
    }
}
</script>

<style scoped>

</style>
