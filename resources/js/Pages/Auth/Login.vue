<template>
    <Head title="Přihlášení" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 font-extrabold">
            {{ status }}
        </div>

        <Form @submit="submit">
            <div class="mt-4 text-white text-xl font-bold">
                <p>Vyplňte Vaše přihlašovací údaje</p>
            </div>
            <div class="mt-4">
                <Field name="email" id="email" type="email" placeholder="Email" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.email" :rules="'required|email'" autocomplete="nope" />
                <error-message class="text-sm text-white font-extrabold" name="email"></error-message>
            </div>

            <div class="mt-4">
                <Field name="password" id="password" type="password" placeholder="Heslo" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.password" :rules="'required'" autocomplete="new-password" />
                <error-message class="text-sm text-white font-extrabold" name="password"></error-message>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox class="border border-red-900" name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-white font-bold">Zapamatovat heslo</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-white hover:opacity-50">
                    Zapomněli jste heslo?
                </Link>

                <button-reverse class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Přihlásit se
                </button-reverse>
            </div>
        </Form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
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
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
            Field,
            Form,
            ErrorMessage
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
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
