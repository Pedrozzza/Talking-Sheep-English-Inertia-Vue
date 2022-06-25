<template>
    <div class="bg-gradient-to-b from-red-900 to-red-800 shadow-lg shadow-red-500/50">
        <div class=" mx-auto px-4 sm:px-6 lg:px-8 py-2 sm:py-0">
            <nav class="md:text-xl font-extrabold text-white relative">
                <!-- Primary Navigation Menu -->
                <div class="flex justify-between h-16">
                    <div>
                        <Link :href="route('welcome')">
                            <div class="flex items-center logo">
                                <jet-application-mark class="absolute block w-auto -mt-1.5 md:mt-0 border-8 border-red-800"/>
                                <h2 class="ml-28 md:ml-20 2xl:ml-28 mt-5 uppercase text-xs md:text-base 2xl:text-xl text-white text-shadow-md block md:hidden lg:block">Talking Sheep English</h2>
                            </div>
                        </Link>
                    </div>
                    <div class="flex">
                        <div class="hidden space-x-8 sm:-my-px sm:mx-4 md:flex">
                            <jet-nav-link :href="route('welcome')" :active="route().current('welcome')">Úvod</jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:mx-4 md:flex">
                            <jet-nav-link :href="route('info')" :active="route().current('info')">Informace</jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:mx-4 md:flex">
                            <jet-nav-link :href="route('courses')" :active="route().current('courses')">Události</jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:mx-4 md:flex">
                            <jet-nav-link :href="route('about')" :active="route().current('about')">O Lektorce</jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:mx-4 md:flex">
                            <jet-nav-link :href="route('price_list')" :active="route().current('price_list')">Ceník</jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:mx-4 md:flex">
                            <jet-nav-link :href="route('contacts')" :active="route().current('contacts')">Kontakty</jet-nav-link>
                        </div>
                    </div>
                    <div class="hidden md:flex sm:items-center sm:ml-6">
                        <div v-if="canLogin" class="pl-4 py-2 ml-auto text-sm font-bold text-shadow">
                            <Link v-if="$page.props.user" :href="route('dashboard')">
                                Studovna
                            </Link>

                            <template v-else>
                                <Link :href="route('login')" class="hover:opacity-50">
                                    Přihlásit se
                                </Link>

                                <Link v-if="canRegister" :href="route('register')" class="ml-4 hover:opacity-50">
                                    Registrovat
                                </Link>
                            </template>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center md:hidden">
                        <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="md:hidden">
            <div class="py-8 space-y-1 flex flex-col items-center justify-center border-t border-gray-200">
                <jet-responsive-nav-link :href="route('welcome')" :active="route().current('welcome')">Úvod</jet-responsive-nav-link>
                <jet-responsive-nav-link :href="route('info')" :active="route().current('info')">Informace</jet-responsive-nav-link>
                <jet-responsive-nav-link :href="route('courses')" :active="route().current('courses')">Události</jet-responsive-nav-link>
                <jet-responsive-nav-link :href="route('about')" :active="route().current('about')">O Lektorce</jet-responsive-nav-link>
                <jet-responsive-nav-link :href="route('price_list')" :active="route().current('price_list')">Ceník</jet-responsive-nav-link>
                <jet-responsive-nav-link :href="route('contacts')" :active="route().current('contacts')">Kontakty</jet-responsive-nav-link>
            </div>
            <div class="py-4 space-y-1 px-4 flex flex-col items-center border-t border-gray-200">
                <div v-if="canLogin" class="py-2 text-white font-bold">
                    <Link v-if="$page.props.user" :href="route('dashboard')">
                        Studovna
                    </Link>

                    <template v-else>
                        <Link :href="route('login')" class="hover:opacity-50">
                            Přihlásit se
                        </Link>

                        <Link v-if="canRegister" :href="route('register')" class="ml-4 hover:opacity-50">
                            Registrovat
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'

export default {
    name: "Navbar",
    components: {
        Head,
        Link,
        JetApplicationMark,
        JetNavLink,
        JetResponsiveNavLink
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
    data() {
        return {
            showingNavigationDropdown: false,
        }
    },
}
</script>

<style scoped>
.logo:hover {
    transform: scale(1.05);
}
</style>
