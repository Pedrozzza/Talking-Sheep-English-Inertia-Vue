<template>
    <app-layout title="Editovat galerii">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="w-134 mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="editGallery">
                        <div class="">
                            <jet-label for="name" value="Název *" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name"  autocomplete="name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="description" value="Popisek *" />
                            <TextArea id="description" type="text" class="mt-1 block w-full" v-model="form.description"  autocomplete="description" />
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                        </div>

                        <div class="mt-4">

                            <jet-label for="photo" value="Fotky do galerie * (NENAHRÁVAT VIDEA!)" class="mb-2" />
                            <input type="file" ref="photos" multiple>

                            <jet-input-error :message="form.errors.images" class="mt-2" />
                        </div>

                        <jet-button class="mt-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Editovat galerii
                        </jet-button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ButtonGreen from "../../Jetstream/ButtonGreen"
import { library } from "@fortawesome/fontawesome-svg-core"
import { faPlus } from "@fortawesome/free-solid-svg-icons"
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import TextArea from "../../Components/TextArea"
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import Swal from "sweetalert2";
import Breadcrumbs from "../../Components/Breadcrumbs";

library.add(faPlus);

export default {
    name: "Courses_edit",
    props: {
        gallery: {
            type: Object,
            required: true,
        }
    },
    components: {
        Breadcrumbs,
        ButtonGreen,
        AppLayout,
        JetInput,
        JetInputError,
        JetLabel,
        TextArea,
        JetSecondaryButton,
        JetButton,
        JetCheckbox
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                name: this.gallery.data.name,
                description: this.gallery.data.description,
                images: this.gallery.data.images
            }),
        }
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Galerie',
                    url: route('galleries.index')
                },
                {
                    label: `Editovat galerii - ${this.gallery.data.name}`
                }
            ];
        }
    },
    methods: {
        editGallery() {

            if (this.$refs.photos) {
                this.form.images = this.$refs.photos.files
            }

            this.form.post(route('galleries.update', {gallery: this.gallery.data.id}), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  `<strong>${this.form.name}</strong> byla úspěšně editována`,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            })


        },
    },
}
</script>

<style scoped>

</style>
