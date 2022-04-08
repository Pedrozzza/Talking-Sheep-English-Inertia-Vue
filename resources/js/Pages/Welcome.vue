<template>
    <Head title="Vítejte" />

    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Vítejte'">
        <welcome-section :settings="settings"></welcome-section>
        <info-section :settings="settings"></info-section>
    </welcome-layout>

<!--    <div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">-->
<!--        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">-->
<!--            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">-->
<!--                Dashboard-->
<!--            </Link>-->

<!--            <template v-else>-->
<!--                <Link :href="route('login')" class="text-sm text-gray-700 underline">-->
<!--                    Přihlásit se-->
<!--                </Link>-->

<!--                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">-->
<!--                    Registrovat-->
<!--                </Link>-->
<!--            </template>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Navbar from "../Components/Navbar";
    import WelcomeSection from "../Components/WelcomeSection";
    import InfoSection from "../Components/InfoSection";
    import WelcomeLayout from "../Layouts/WelcomeLayout";

    export default defineComponent({
        components: {
            Head,
            Link,
            Navbar,
            WelcomeSection,
            InfoSection,
            WelcomeLayout
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            settings: Object,
        }
    })
</script>
