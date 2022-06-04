<template>
    <app-layout title="Emaily">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
                <p class="flex items-center text-yellow-600 font-bold p-1 border-2 border-yellow-600">
                    <font-awesome-icon :icon="['fas', 'exclamation-triangle']" size="lg" class="mr-1"/>
                    Emaily lze poslat buď všem studentům zaškrtnutím "Poslat email všem studentům" nebo lze vybrat studenty jednotlivě z tabulky
                </p>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="sendEmails">
                        <div class="mb-4 flex items-center">
                            <label class="mr-4 font-bold" for="allSelected">Poslat email všem studentům</label>
                            <input type="checkbox"  id="allSelected" v-model="form.allSelected"/>
                        </div>

                        <table v-if="!form.allSelected" class="w-full rounded-2xl">
                            <thead class="border bg-blue-800 shadow-md">
                            <tr>
                                <th scope="col" class="text-left text-base font-bold text-white px-6 py-2">
                                    Jméno
                                </th>
                                <th scope="col" class="text-left text-base font-bold text-white px-6 py-2">
                                    Email
                                </th>
                                <th scope="col" class="text-left text-base font-bold text-white px-6 py-2">
                                    Registrován
                                </th>
                                <th scope="col" class="text-base font-bold text-white px-6 py-2">
                                    Vybrat
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="student in students.data" :key="student.id" class="border hover:bg-blue-100">
                                    <td class="text-gray-900 px-6 py-2 whitespace-nowrap">{{ student.name }}</td>
                                    <td class="text-gray-900 px-6 py-2 whitespace-nowrap">{{ student.email }}</td>
                                    <td class="text-gray-900 px-6 py-2 whitespace-nowrap">{{ student.created_at_for_human }}</td>
                                    <td class="text-gray-900 px-6 py-2 whitespace-nowrap flex justify-center">
                                        <input type="checkbox"  id="studentIds" v-model="form.studentIds" :value="student.id"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <jet-label for="subject" value="Předmět *" />
                            <jet-input id="subject" type="text" class="mt-1 block w-full" v-model="form.subject"  autocomplete="subject" />
                            <jet-input-error :message="form.errors.subject" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <jet-label for="body" value="Zpráva *" />
                            <ckeditor :editor="editor" v-model="form.body" :config="editorConfig"></ckeditor>
                            <jet-input-error :message="form.errors.body" class="mt-2" />
                        </div>

                        <jet-button class="mt-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Odeslat
                        </jet-button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import SimplePagination from "../../Components/SimplePagination";
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import Swal from "sweetalert2";
import JetButton from '@/Jetstream/Button.vue'
import { library } from "@fortawesome/fontawesome-svg-core";
import { faExclamationTriangle } from "@fortawesome/free-solid-svg-icons";
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Breadcrumbs from "../../Components/Breadcrumbs";

library.add(faExclamationTriangle);

export default {
    name: "Emails_Index",
    props: {
        students: {
            type: Object,
            required: true,
        },
    },
    components: {
        SimplePagination,
        AppLayout,
        JetCheckbox,
        Swal,
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
        Breadcrumbs
    },
    data() {
        return {
            form: this.$inertia.form({
                studentIds: [],
                allSelected: false,
                subject: '',
                body: '',
            }),
            editor: ClassicEditor,
            editorConfig: {},
        }
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Emaily'
                }
            ];
        },

    },
    methods: {
        sendEmails() {
            this.form.post(route('emails.send'), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  `Úspěšně odesláno`,
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
*:focus {
    outline:none !important;
    border: 1px solid #000;
    box-shadow: none;
}
</style>
