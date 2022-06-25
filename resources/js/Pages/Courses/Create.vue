<template>
    <app-layout title="Přidat událost">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
            </div>
        </template>

        <div>
            <div class="w-134 mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="saveCourse">
                        <div class="">
                            <jet-label for="title" value="Název *" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title"  autocomplete="title" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="slug" value="Slug (pro URL adresy) *" />
                            <jet-input id="slug" type="text" class="mt-1 block w-full" v-model="form.slug"  autocomplete="slug" />
                            <jet-input-error :message="form.errors.slug" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="description" value="Krátký popis na kartě (nepovinné)" />
                            <TextArea id="description" type="text" class="mt-1 block w-full" v-model="form.description"  autocomplete="description" />
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="main_description" value="Hlavní popis v detailu události (nepovinné)" />
                            <ckeditor :editor="editor" v-model="form.main_description" :config="editorConfig"></ckeditor>
                        </div>
                        <div class="mt-4">
                            <jet-label for="dateStart" value="Začátek (nepovinné)" />
                            <jet-input id="dateStart" type="date" class="mt-1 block w-full" v-model="form.date_start"  autocomplete="dateStart" />
                            <jet-input-error :message="form.errors.date_start" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="dateEnd" value="Konec (nepovinné)" />
                            <jet-input id="dateEnd" type="date" class="mt-1 block w-full" v-model="form.date_end"  autocomplete="dateEnd" />
                            <jet-input-error :message="form.errors.date_end" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="destination" value="Místo konání (nepovinné)" />
                            <jet-input id="destination" type="text" class="mt-1 block w-full" v-model="form.destination"  autocomplete="destination" />
                            <jet-input-error :message="form.errors.destination" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="course_price" value="Cena (nepovinné)" />
                            <jet-input id="course_price" type="number" class="mt-1 block w-full" v-model="form.price"  autocomplete="course_price" />
                            <jet-input-error :message="form.errors.price" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <jet-label for="url" value="Odkaz na registraci (nepovinné)" />
                            <jet-input id="url" type="text" class="mt-1 block w-full" v-model="form.url"  autocomplete="url" />
                            <jet-input-error :message="form.errors.url" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <input type="file" class="hidden"
                                   ref="photo"
                                   @change="updatePhotoPreview">

                            <jet-label for="photo" value="Hlavní fotka (povinné)" />

                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" v-show="photoPreview">
                                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                      :style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                                Vyberte fotku
                            </jet-secondary-button>

                            <jet-input-error :message="form.errors.image" class="mt-2" />
                        </div>

                        <div class="mt-4">

                            <jet-label for="photo" value="Fotky do galerie" class="mb-2" />
                            <input type="file" ref="photos" multiple>

                            <jet-input-error :message="form.errors.images" class="mt-2" />
                        </div>

                        <jet-button class="mt-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Přidat událost
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
import { strSlug } from "../../helpers";
import Swal from "sweetalert2";
import Breadcrumbs from "../../Components/Breadcrumbs";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

library.add(faPlus);

export default {
    name: "Courses_create",
    props: {
        courses: {
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
        JetCheckbox,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                slug: '',
                description: '',
                main_description:'',
                date_start: '',
                date_end: '',
                destination: '',
                price: '',
                image: '',
                show_button: false,
                url: '',
                images: []
            }),
            photoPreview: null,
            editor: ClassicEditor,
            editorConfig: {},
            previewImage: null
        }
    },
    computed: {
      breadcrumbs() {
          return [
              {
                  label: 'Události',
                  url: route('courses.index')
              },
              {
                  label: 'Přidat událost'
              }
          ];
      }
    },
    methods: {
        saveCourse() {
            if (this.$refs.photo) {
                this.form.image = this.$refs.photo.files[0]
            }

            if (this.$refs.photos) {
                this.form.images = this.$refs.photos.files
            }

            this.form.post(route('courses.store'), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  `${this.form.title} byl úspěšně přidán`,
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
    },
    watch: {
        'form.title'(name) {
            this.form.slug = strSlug(name);
        }
    },
}
</script>

<style scoped>

</style>
