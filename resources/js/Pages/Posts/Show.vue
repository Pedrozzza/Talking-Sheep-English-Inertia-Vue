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
                        <div class="mb-8 p-8 flex justify-between items-center" :style="{'background-color': `${post.data.color}`}">
                            <h2 class="ml-8 text-2xl font-extrabold text-white text-shadow-md">{{ post.data.title }}</h2>
                        </div>
                        <div v-if="post.data.body" class="p-6">
                            <p class="text-xl font-bold mb-4">Popis:</p>
                            <div class="md:text-justify" v-html="post.data.body">
                            </div>
                        </div>
                    </div>
                    <hr class="my-2"/>
                    <div class="p-6">
                        <p class="text-xl font-bold">Soubory ke stažení:</p>
                        <div class="grid grid-cols-1 md:grid-cols-3">
                            <div>
                                <p class="my-4">Lekce:</p>
                                <div v-if="post.data.file_upload">
                                    <a :href="`/storage/file_upload/${post.data.file_upload}`" class="hover:opacity-50" target="_blank">
                                        {{ post.data.file_upload }}
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-green-600"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload1">
                                    <a :href="`/storage/file_upload/${post.data.file_upload1}`" class="hover:opacity-50" target="_blank">
                                        {{ post.data.file_upload1 }}
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-green-600"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload2">
                                    <a :href="`/storage/file_upload/${post.data.file_upload2}`" class="hover:opacity-50" target="_blank">
                                        {{ post.data.file_upload2 }}
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-green-600"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload3">
                                    <a :href="`/storage/file_upload/${post.data.file_upload3}`" class="hover:opacity-50" target="_blank">
                                        {{ post.data.file_upload3 }}
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-green-600"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload4">
                                    <a :href="`/storage/file_upload/${post.data.file_upload4}`" class="hover:opacity-50" target="_blank">
                                        {{ post.data.file_upload4 }}
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-green-600"/>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p v-if="post.data.file_homework" class="my-4">Úkol:</p>
                                <div v-if="post.data.file_homework">
                                    <a :href="`/storage/file_upload/${post.data.file_homework}`" class="hover:opacity-50" target="_blank">
                                        {{ post.data.file_homework }}
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-green-600"/>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p v-if="post.data.file_conversation" class="my-4">Konverzace:</p>
                                <div v-if="post.data.file_conversation">
                                    <a :href="`/storage/file_upload/${post.data.file_conversation}`" class="hover:opacity-50" target="_blank">
                                        {{ post.data.file_conversation }}
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-green-600"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Breadcrumbs from "../../Components/Breadcrumbs";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faDownload } from "@fortawesome/free-solid-svg-icons";

library.add(faDownload);

export default {
    name: "Post_show",
    props: {
        post: {
            type: Object,
            required: true,
        }
    },
    components: {
        AppLayout,
        Breadcrumbs,
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Studovna',
                    url: route('dashboard')
                },
                {
                    label: `${this.post.data.folder_title}`,
                    url: route('folders.show', this.post.data.folder)
                },
                {
                    label: `${this.post.data.title}`,
                }
            ];
        }
    }
}
</script>

<style scoped>

</style>
