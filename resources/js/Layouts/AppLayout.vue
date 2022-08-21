<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="min-h-screen bg-gray-100 dashboard-bg">
            <nav class="bg-gradient-to-b from-blue-900 to-blue-800 shadow-lg">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto px-4 sm:px-6 lg:px-8 py-2 sm:py-0">
                    <div class="flex justify-between h-16">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <Link :href="route('welcome')">
                                <div class="flex items-center logo">
                                    <jet-application-mark class="absolute block w-auto -mt-1.5 md:mt-0 border-8 border-blue-800"/>
                                    <h2 class="ml-28 md:ml-20 2xl:ml-28 mt-3 uppercase text-white text-shadow-md text-xs text-base 2xl:text-xl md:hidden lg:block">Talking Sheep English</h2>
                                </div>
                            </Link>
                        </div>
                        <div class="flex">
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                                    Studovna
                                </jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('homeworks.homework-page')" :active="route().current('homeworks.homework-page')">
                                    Odevzdávárna
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('settings.create')" :active="route().current('settings.create')">
                                    Obsah webu
                                </jet-nav-link>
                            </div>
                            <div v-if="can('control lessons')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('courses.index')" :active="route().current('courses.index')">
                                    Události
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('galleries.index')" :active="route().current('galleries.index')">
                                    Galerie
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('codes.index')" :active="route().current('codes.index')">
                                    Reg. kódy
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('students.index')" :active="route().current('students.index')">
                                    Studenti
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('homeworks.index')" :active="route().current('homeworks.index')">
                                    Úkoly
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('folders.index')" :active="route().current('folders.index')">
                                    Kategorie
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('posts.index')" :active="route().current('posts.index')">
                                    Lekce
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('emails.index')" :active="route().current('emails.index')">
                                    Emaily
                                </jet-nav-link>
                            </div>
                            <div v-if="can('edit web')" class="hidden space-x-8 sm:-my-px sm:mx-1 2xl:mx-4 md:flex">
                                <jet-nav-link :href="route('messages.index')" :active="route().current('messages.index')">
                                    Zprávy
                                </jet-nav-link>
                            </div>
                        </div>

                        <div class="hidden md:flex sm:items-center sm:ml-6">

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="p-1 h-16 w-16 rounded-full bg-white object-cover border border-logo-blue logo" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ $page.props.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Spravovat účet
                                        </div>

                                        <jet-dropdown-link :href="route('profile.show')">
                                            Nastavení profilu
                                        </jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Odhlásit se
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
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
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="md:hidden">
                    <div class="py-8 space-y-1 flex flex-col items-center justify-center border-t border-gray-200">
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Studovna
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link :href="route('homeworks.homework-page')" :active="route().current('homeworks.homework-page')">
                            Odevzdávárna
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('settings.create')" :active="route().current('settings.create')">
                            Obsah webu
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('control lessons')" :href="route('courses.index')" :active="route().current('courses.index')">
                            Události
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('galleries.index')" :active="route().current('galleries.index')">
                            Galerie
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('codes.index')" :active="route().current('codes.index')">
                            Reg. kódy
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('students.index')" :active="route().current('students.index')">
                            Studenti
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('homeworks.index')" :active="route().current('homeworks.index')">
                            Úkoly
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('folders.index')" :active="route().current('folders.index')">
                            Kategorie
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('posts.index')" :active="route().current('posts.index')">
                            Lekce
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('emails.index')" :active="route().current('emails.index')">
                            Emaily
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link v-if="can('edit web')" :href="route('messages.index')" :active="route().current('messages.index')">
                            Zprávy
                        </jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="py-8 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-12 w-12 rounded-full object-cover p-0.5 bg-white border border-logo-blue" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-white font-bold">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-white">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1 px-4">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                <span style="color: white">Nastavení profilu</span>
                            </jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    <span style="color: white">Odhlásit se</span>
                                </jet-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    })
</script>

<style scoped>
.logo:hover {
    transform: scale(1.05);
}
</style>
