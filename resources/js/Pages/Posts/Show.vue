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
                        <div class="mb-8 p-6 2xl:p-8 flex flex-col md:flex-row md:justify-between md:items-center" :style="{'background-color': `${post.data.color}`}">
                            <h2 class="ml-8 text-2xl md:text-lg 2xl:text-2xl font-extrabold text-white text-shadow-md">{{ post.data.title }}</h2>
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
                        <div class="grid grid-cols-1 md:grid-cols-4">
                            <div>
                                <p class="my-4">Lekce:</p>
                                <div v-if="post.data.file_upload" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.1
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload1" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload1}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.2
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload2" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload2}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.3
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload3" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload3}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.4
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload4" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload4}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.5
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload5" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload5}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.6
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload6" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload6}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.7
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload7" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload7}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.8
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload8" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload8}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.9
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_upload9" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_upload9}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Soubor č.10
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p v-if="post.data.file_homework" class="my-4">Úkol:</p>
                                <div v-if="post.data.file_homework" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.1
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>

                                <div v-if="post.data.file_homework1" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework1}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.2
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>

                                <div v-if="post.data.file_homework2" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework2}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.3
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>

                                <div v-if="post.data.file_homework3" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework3}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.4
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>

                                <div v-if="post.data.file_homework4" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework4}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.5
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_homework5" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework5}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.6
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_homework6" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework6}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.7
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_homework7" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework7}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.8
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_homework8" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework8}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.9
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                                <div v-if="post.data.file_homework9" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_homework9}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Úkol č.10
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p v-if="post.data.file_conversation" class="my-4">Konverzace:</p>
                                <div v-if="post.data.file_conversation" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_conversation}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        Konverzace
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p v-if="post.data.file_goldlist" class="my-4">GOLDLIST:</p>
                                <div v-if="post.data.file_goldlist" class="file-button my-8">
                                    <a :href="`/storage/file_upload/${post.data.file_goldlist}`" class="rounded-full px-4 py-2 font-bold text-white" target="_blank" :style="{'background-color': `${post.data.color}`}">
                                        GOLDLIST
                                        <font-awesome-icon :icon="['fas', 'download']" class="ml-2 text-white"/>
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
.file-button:hover {
    opacity: 0.9;
    transform: scale(1.05);
}
</style>
