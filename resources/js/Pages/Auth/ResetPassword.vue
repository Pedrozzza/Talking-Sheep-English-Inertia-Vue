<template>
    <Head title="Změna hesla" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <Form @submit="submit">
            <div class="mb-4 text-white text-xl font-bold">
                <p>Zadejte Váš email a zvolte si nové heslo</p>
            </div>
            <div>
                <Field name="email" id="email" type="email" placeholder="Email" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.email" :rules="'required|email'" autocomplete="nope" />
                <error-message class="text-sm text-white font-extrabold" name="email"></error-message>
            </div>

            <div class="mt-4">
                <Field name="password" id="password" type="password" placeholder="Heslo" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.password" :rules="'required|min:6|max:50'" autocomplete="new-password" />
                <error-message class="text-sm text-white font-extrabold" name="password"></error-message>
            </div>

            <div class="mt-4">
                <Field name="password_confirmation" id="password_confirmation" placeholder="Potvrzení hesla" type="password" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.password_confirmation" :rules="'required|confirmed:@password'" autocomplete="new-password" />
                <error-message class="text-sm text-white font-extrabold" name="password_confirmation"></error-message>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button-reverse :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Změnit heslo
                </button-reverse>
            </div>
        </Form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue';
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
            ErrorMessage,
        },

        props: {
            email: String,
            token: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.update'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
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
