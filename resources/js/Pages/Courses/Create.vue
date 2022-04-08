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
                            <jet-label for="description" value="Popis (nepovinné)" />
                            <TextArea id="description" type="text" class="mt-1 block w-full" v-model="form.description"  autocomplete="description" />
                            <jet-input-error :message="form.errors.description" class="mt-2" />
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
                            <input type="file" class="hidden"
                                   ref="photo"
                                   @change="updatePhotoPreview">

                            <jet-label for="photo" value="Fotka (nepovinné, v případě, že nebude fotka vložena, bude použita defaultní)" />

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
                            <div class="flex items-center">
                                <jet-checkbox id="showButton" class="mr-4" v-model="form.show_button" :checked="form.show_button"/>
                                <jet-label for="showButton" value='Zobrazit tlačítko "MÁM ZÁJEM" u události (Registrování uživatelé se budou moci přihlásit k události)' />
                            </div>
                            <jet-input-error :message="form.errors.show_button" class="mt-2" />
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
        JetCheckbox
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                slug: '',
                description: '',
                date_start: '',
                date_end: '',
                destination: '',
                price: '',
                image: '',
                show_button: false,
            }),
            photoPreview: null,
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
