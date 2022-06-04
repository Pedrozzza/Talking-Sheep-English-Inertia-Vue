<template>
    <app-layout title="Editovat kategorii">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="w-256 mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="editFolder">
                        <div class="">
                            <jet-label for="title" value="Název *" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title"  autocomplete="title" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="description" value="Popis (nepovinné)" />
                            <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                        </div>
                        <div class="mt-4">
                            <jet-label for="color" value="Barva *" />
                            <ColorPicker :color="form.color" default-format="hex" @color-change="updateColor"/>
                            <jet-input-error :message="form.errors.color" class="mt-2" />
                        </div>
                        <div class="my-8">
                            <jet-label for="visibility" value="Viditelnost *" />
                            <select v-model="form.visibility" class="form-select appearance-none
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
                                <option v-for="(visibility, index) in visibilities" :key="index">
                                    {{ visibility }}
                                </option>
                            </select>
                            <jet-input-error :message="form.errors.visibility" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <input type="file" class="hidden"
                                   ref="photo"
                                   @change="updatePhotoPreview">

                            <jet-label for="photo" value="Obrázek (nepovinné, v případě, že nebude obrázek vložen, bude použit univerzální)" />

                            <!-- Current course image -->
                            <div v-if="folder.data.image" class="mt-2" v-show="! photoPreview">
                                <img :src="'/storage/folders-photos/' + folder.data.image"  class="rounded-full h-20 w-20 object-cover">
                            </div>

                            <!-- New Folder Photo Preview -->
                            <div class="mt-2" v-show="photoPreview">
                                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                      :style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                                Vyberte obrázek
                            </jet-secondary-button>

                            <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="folder.data.image || photoPreview">
                                Odebrat obrázek
                            </jet-secondary-button>

                            <jet-input-error :message="form.errors.image" class="mt-2" />
                        </div>

                        <jet-button class="mt-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Editovat kategorii
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
    name: "Folders_edit",
    props: {
        folder: {
            type: Object,
            required: true,
        },
        visibilities: {
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
                _method: 'PUT',
                title: this.folder.data.title,
                description: this.folder.data.description,
                color: this.folder.data.color,
                visibility: this.folder.data.visibility,
                image: this.folder.data.image,
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
                    label: 'Kategorie',
                    url: route('folders.index')
                },
                {
                    label: `Editovat kategorii - ${this.folder.data.title}`
                }
            ];
        }
    },
    methods: {
        editFolder() {
            if (this.$refs.photo) {
                this.form.image = this.$refs.photo.files[0]
            }

            this.form.post(route('folders.update', {folder: this.folder.data.id}), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  `Kategorie <strong>${this.form.title}</strong> byla úspěšně editován`,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            })


        },

        selectNewPhoto() {
            this.$refs.photo.click();
        },

        updatePhotoPreview() {
            const photo = this.$refs.photo.files[0];

            if (! photo) return;

            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(photo);
        },
        deletePhoto() {
            this.$inertia.delete(route('folders.delete-photo', {folder: this.folder.data.id}), {
                preserveScroll: true,
                onSuccess: () => {
                    this.photoPreview = null;
                    this.clearPhotoFileInput();
                },
            });
        },
        clearPhotoFileInput() {
            if (this.$refs.photo?.value) {
                this.$refs.photo.value = null;
            }
        },
        updateColor (eventData) {
            this.form.color = eventData.cssColor
        }
    },
}
</script>

<style scoped>

</style>
