<template>
    <app-layout title="Přidat lekci">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="w-256 mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="savePost">
                        <div class="my-8">
                            <jet-label for="folder" value="Vyberte kategorii, ke které bude tato lekce přiřazena *" />
                            <select v-model="form.folder" class="form-select appearance-none
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding bg-no-repeat
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                <option v-for="(folder, index) in folders" :key="index" :value="folder.id">
                                    {{ folder.title }}
                                </option>
                            </select>
                            <jet-input-error :message="form.errors.folder" class="mt-2" />
                        </div>

                        <div class="">
                            <jet-label for="title" value="Název *" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title"  autocomplete="title" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="body" value="Obsah lekce *" />
                            <ckeditor :editor="editor" v-model="form.body" :config="editorConfig"></ckeditor>
                            <jet-input-error :message="form.errors.body" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="color" value="Barva *" />
                            <ColorPicker :color="form.color" default-format="hex" @color-change="updateColor"/>
                            <jet-input-error :message="form.errors.color" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="file_upload" value="Soubory k lekcím (nahrát lze maximálně 5 souborů)" />
                            <jet-input name="file_upload" id="file_upload" type="file" ref="fileUpload" @change="selectFile" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_upload" class="mt-2" />
                            <jet-input name="file_upload1" id="file_upload1" type="file" ref="fileUpload1" @change="selectFile1" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_upload1" class="mt-2" />
                            <jet-input name="file_upload2" id="file_upload2" type="file" ref="fileUpload2" @change="selectFile2" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_upload2" class="mt-2" />
                            <jet-input name="file_upload3" id="file_upload3" type="file" ref="fileUpload3" @change="selectFile3" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_upload3" class="mt-2" />
                            <jet-input name="file_upload4" id="file_upload4" type="file" ref="fileUpload4" @change="selectFile4" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_upload4" class="mt-2" />
                        </div>
                        <hr class="my-4"/>
                        <div class="mt-4">
                            <jet-label for="file_homework" value="Soubory - domácí úkoly (nahrát lze maximálně 5 souborů)" />
                            <jet-input name="file_homework" id="file_homework" type="file" ref="fileHomework" @change="selectFileHomework" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_homework" class="mt-2" />

                            <jet-input name="file_homework1" id="file_homework1" type="file" ref="fileHomework1" @change="selectFileHomework1" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_homework1" class="mt-2" />

                            <jet-input name="file_homework2" id="file_homework2" type="file" ref="fileHomework2" @change="selectFileHomework2" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_homework2" class="mt-2" />

                            <jet-input name="file_homework3" id="file_homework3" type="file" ref="fileHomework3" @change="selectFileHomework3" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_homework3" class="mt-2" />

                            <jet-input name="file_homework4" id="file_homework4" type="file" ref="fileHomework4" @change="selectFileHomework4" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_homework4" class="mt-2" />
                        </div>
                        <hr class="my-4"/>
                        <div class="mt-4">
                            <jet-label for="file_conversation" value="Soubor - konverzace" />
                            <jet-input name="file_conversation" id="file_conversation" type="file" ref="fileConversation" @change="selectFileConversation" class="
                                    mt-4 form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out focus:outline-none" style="box-shadow: none"/>
                            <jet-input-error :message="form.errors.file_conversation" class="mt-2" />
                        </div>

                        <jet-button class="mt-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Přidat lekci
                        </jet-button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import JetButton from '@/Jetstream/Button.vue'
import Swal from "sweetalert2";
import Breadcrumbs from "../../Components/Breadcrumbs";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { ColorPicker } from 'vue-accessible-color-picker'

export default {
    name: "Posts_Create",
    props: {
        folders: {
            type: Array,
            required: true,
        }
    },
    components: {
        Breadcrumbs,
        AppLayout,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        JetButton,
        ColorPicker,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                body: '',
                color: '#981b1b',
                folder: '',
                file_upload: '',
                file_upload1: '',
                file_upload2: '',
                file_upload3: '',
                file_upload4: '',
                file_homework: '',
                file_homework1: '',
                file_homework2: '',
                file_homework3: '',
                file_homework4: '',
                file_conversation: '',
            }),
            photoPreview: null,
            editor: ClassicEditor,
            editorConfig: {},
        }
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Lekce',
                    url: route('posts.index')
                },
                {
                    label: 'Přidat lekci'
                }
            ];
        }
    },
    methods: {
        savePost() {
            this.form.post(route('posts.store'), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  `Lekce <strong>${this.form.title}</strong> byla úspěšně přidána`,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            })
        },
        updateColor (eventData) {
            this.form.color = eventData.cssColor
        },
        selectFile(event) {
            this.form.file_upload = event.target.files[0];
        },
        selectFile1(event) {
            this.form.file_upload1 = event.target.files[0];
        },
        selectFile2(event) {
            this.form.file_upload2 = event.target.files[0];
        },
        selectFile3(event) {
            this.form.file_upload3 = event.target.files[0];
        },
        selectFile4(event) {
            this.form.file_upload4 = event.target.files[0];
        },
        selectFileHomework(event) {
            this.form.file_homework = event.target.files[0];
        },
        selectFileHomework1(event) {
            this.form.file_homework1 = event.target.files[0];
        },
        selectFileHomework2(event) {
            this.form.file_homework2 = event.target.files[0];
        },
        selectFileHomework3(event) {
            this.form.file_homework3 = event.target.files[0];
        },
        selectFileHomework4(event) {
            this.form.file_homework4 = event.target.files[0];
        },
        selectFileConversation(event) {
            this.form.file_conversation = event.target.files[0];
        }
    },
}
</script>

<style scoped>

</style>
