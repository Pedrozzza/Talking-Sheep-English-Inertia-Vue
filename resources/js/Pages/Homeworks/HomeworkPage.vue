<template>
    <app-layout title="Odevzdávárna">
        <div>
            <div class="px-4 sm:max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <h2 class="my-4 text-2xl font-extrabold text-blue-800 text-shadow-md">Na tomto místě můžete odevzdat své úkoly</h2>
                        <p class="text-base">Vyplňte číslo úkolu, vyberte soubor a kliknutím na tlačítko "ODEVZDAT ÚKOL" odešlete.</p>
                    </div>

                    <div class="mt-8">
                        <div class="px-6 py-4 bg-blue-800 shadow-md overflow-hidden rounded sm:rounded-lg border-2 border-blue-900">
                            <div class="flex flex-col text-white">
                                <small>Podporované formáty: pfd, doc, docx, jpg, png</small>
                                <small>Maximální velikost souboru: 10 MB</small>
                            </div>
                            <jet-validation-errors class="mb-4" />
                            <Form @submit="submit" enctype="multipart/form-data">

                                <div class="mt-4">
                                    <Field name="homework_number" id="homework_number" type="number" placeholder="Číslo úkolu *" class="mt-1 block w-full placeholder-italic border border-blue-900" v-model="form.homework_number" :rules="'required'"/>
                                    <error-message class="text-sm text-white font-extrabold" name="homework_number"></error-message>
                                </div>

                                <div class="mt-4">
                                    <Field name="file" id="file" type="file" ref="inputFile" @change="selectFile" class="
                                    form-control
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding
                                    border border-blue-900
                                    transition
                                    ease-in-out
                                    m-0"
                                           :rules="'required'"/>
                                    <error-message class="text-sm text-white font-extrabold" name="file"></error-message>
                                </div>

                                <button-reverse-blue class="mt-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Odevzdat úkol
                                </button-reverse-blue>
                            </Form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserTag } from "@fortawesome/free-solid-svg-icons";
import ButtonSecondary from "../../Jetstream/ButtonSecondary";
import { Field, Form, ErrorMessage } from 'vee-validate';
import Swal from "sweetalert2";
import ButtonReverseBlue from "../../Jetstream/ButtonReverseBlue";

library.add(faUserTag);

export default {
    name: "HomeworkPage",
    props: {
        user: {
            type: Object,
            required: true,
        }
    },
    components: {
        ButtonReverseBlue,
        ButtonSecondary,
        JetValidationErrors,
        AppLayout,
        Field,
        Form,
        ErrorMessage,
    },
    data() {
        return {
            form: this.$inertia.form({
                homework_number: '',
                file: null,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('homeworks.store'), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  `Soubor úspěšně odevzdán`,
                        showConfirmButton: false,
                        timer: 3000
                    })
                },
            });
            this.form.homework_number = '';
            this.form.file = null;
            this.$refs.inputFile.value = null;
        },
        selectFile(event) {
            this.form.file = event.target.files[0];
        }
    }
}
</script>

<style scoped>
*:focus {
    outline:none !important;
    border: 1px solid #000;
    box-shadow: none;
}
</style>
