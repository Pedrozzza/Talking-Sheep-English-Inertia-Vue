<template>
    <Head title="Zapomenuté heslo" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-white text-xl font-bold">
            Zapomněli jste heslo? Žádný problém. Dejte nám vědět svou e-mailovou adresu a my vám zašleme e-mail s odkazem pro obnovení hesla, který vám umožní vybrat si nové.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 font-extrabold">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <Form @submit="submit">
            <div>
                <Field name="email" id="email" type="email" placeholder="Email" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.email" :rules="'required|email'" />
                <error-message class="text-sm text-white font-extrabold" name="email"></error-message>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button-reverse :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Zaslat odkaz ke změně hesla
                </button-reverse>
            </div>
        </Form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Field, Form, ErrorMessage } from 'vee-validate';
    import ButtonReverse from "../../Jetstream/ButtonReverse";

    export default defineComponent({
        components: {
            ButtonReverse,
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            Field,
            Form,
            ErrorMessage
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
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
