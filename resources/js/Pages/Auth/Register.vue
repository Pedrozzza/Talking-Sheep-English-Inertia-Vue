<template>
    <Head title="Registrace" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />
        <Form @submit="submit">
            <div class="mt-4 text-white text-xl font-bold">
                <p>Prosím pozor! Registrovat se můžeš pouze s platným <strong>registračním kódem.</strong> Nejdříve nás tedy <a class="underline hover:opacity-50" href="#">kontaktuj.</a></p>
            </div>

            <div class="mt-4">
                <Field name="name" id="name" type="text" placeholder="Jméno *" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.name" :rules="'required|min:3|max:50'" autocomplete="nope"/>
                <error-message class="text-sm text-white font-extrabold" name="name"></error-message>
            </div>

            <div class="mt-4">
                <Field name="email" id="email" type="email" placeholder="Email *" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.email" :rules="'required|email|min:3|max:50'" autocomplete="nope"/>
                <error-message class="text-sm text-white font-extrabold" name="email"></error-message>
            </div>

            <div class="mt-4">
                <Field name="register_code" id="register_code" type="text" placeholder="Registrační kód *" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.register_code" :rules="validateRegistrationCode" autocomplete="nope" />
                <error-message class="text-sm text-white font-extrabold" name="register_code"></error-message>
            </div>

            <div class="mt-4">
                <Field name="password" id="password" type="password" placeholder="Heslo *" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.password" :rules="'required|min:6|max:50'" autocomplete="new-password" />
                <error-message class="text-sm text-white font-extrabold" name="password"></error-message>
            </div>

            <div class="mt-4">
                <Field name="password_confirmation" id="password_confirmation" placeholder="Potvrzení hesla *" type="password" class="mt-1 block w-full placeholder-italic border border-red-900" v-model="form.password_confirmation" :rules="'required|confirmed:@password'" autocomplete="new-password" />
                <error-message class="text-sm text-white font-extrabold" name="password_confirmation"></error-message>
            </div>

            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center text-white">
                        <Field name="terms" id="terms" type="checkbox" class="border border-red-900" :value="true" @click="rulesChecked" :rules="'required'"/>

                        <div class="ml-2">
                            Souhlasím se zpracováním osobních údajů dle <a target="_blank" :href="route('terms.show')" class="underline text-sm hover:opacity-50">Licenčních podmínek</a>
                        </div>
                    </div>
                    <error-message class="text-sm text-white font-extrabold" name="terms"></error-message>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-white hover:opacity-50">
                    Máte již účet?
                </Link>

                <button-reverse class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrovat
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
        props: {
          codes: Array,
        },
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
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    register_code: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            },
            validateRegistrationCode(value) {

                if (!value) {
                    return 'Pole je povinné'
                }

                if (!this.codes.includes(value)) {
                    return 'Neplatný registrační kód'
                }

                return true;
            },
            rulesChecked() {
                const terms = document.getElementById('terms').checked;
                if(terms === true) {
                    this.form.terms = true;
                } else {
                    this.form.terms = false;
                }

            },
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
