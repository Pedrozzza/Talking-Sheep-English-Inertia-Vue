<template>
    <div>
        <Head :title="title" />

        <div class="flex flex-col h-screen">
            <navbar :can-login="canLogin" :can-register="canRegister"></navbar>
            <main class="flex-grow">
                <slot></slot>
            </main>
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from "../Components/Navbar";
import Footer from "../Components/Footer";

export default {
    name: "WelcomeLayout",
    components: {
        Head,
        Link,
        Navbar,
        Footer
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        title: String
    }
}
</script>

<style scoped>

</style>
