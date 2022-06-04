<template>
    <div class="px-6 py-4 bg-red-800 shadow-md overflow-hidden sm:rounded-lg border-4 border-red-900">

        <jet-validation-errors class="mb-4" />
        <Form @submit="submit">
            <div class="mt-4 text-white text-xl font-bold">
                <p>{{ title }}</p>
            </div>

            <div class="mt-4">
                <Field name="name" id="name" type="text" placeholder="Jméno a Přijmení *" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.name" :rules="'required|min:3|max:50'" autocomplete="nope"/>
                <error-message class="text-sm text-white font-extrabold" name="name"></error-message>
            </div>

            <div class="mt-4">
                <Field name="email" id="email" type="email" placeholder="Email *" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.email" :rules="'required|email|min:3|max:50'" autocomplete="nope"/>
                <error-message class="text-sm text-white font-extrabold" name="email"></error-message>
            </div>

            <div class="mt-4">
                <Field name="phone_number" id="phone_number" type="text" placeholder="Telefonní číslo *" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.phone_number" :rules="'required|regex:^(\\+420)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$'" autocomplete="nope" />
                <error-message class="text-sm text-white font-extrabold" name="phone_number"></error-message>
            </div>

            <div class="mt-4">
                <Field name="message" v-slot="{ field }"   v-model="form.message" :rules="'required|min:3|max:1000'" autocomplete="nope">
                    <textarea v-bind="field" id="message" placeholder="Zpráva *" rows="4"  class="mt-1 block w-full placeholder-italic border border-red-900"></textarea>
                </Field>
                <error-message class="text-sm text-white font-extrabold" name="message"></error-message>
            </div>

            <div class="flex items-center justify-end mt-4">

                <button-reverse class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Odeslat
                </button-reverse>
            </div>
        </Form>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import ButtonReverse from "../Jetstream/ButtonReverse";
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Field, Form, ErrorMessage } from 'vee-validate';
import Swal from 'sweetalert2';

export default defineComponent({
    props: {
        title: {
            type: String,
            required: true,
        }
    },
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetLabel,
        ButtonReverse,
        JetValidationErrors,
        Link,
        Field,
        Form,
        ErrorMessage,
        Swal
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                phone_number: '',
                message: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('apply'), {
                onFinish: () => this.form.reset('name', 'email', 'phone_number', 'message'),
            })

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Kontakt odeslán, děkuji za zájem',
                showConfirmButton: true,
                timer: 4000
            })

            this.form.name = '';
            this.form.email = '';
            this.form.phone_number = '';
            this.form.message = '';
        }
    }
})
</script>

<style scoped>
*:focus {
    outline:none !important;
    border: 1px solid #000;
    box-shadow: none;
}
</style>
