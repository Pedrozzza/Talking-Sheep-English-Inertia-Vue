<template>
    <div class="h-16  bg-gradient-to-b from-red-900 to-red-500 border-b-2 border-red-900 shadow-lg shadow-red-500/50">
        <div class=" mx-auto px-20">
            <nav class="md:text-xl font-extrabold text-white relative">
                <ul class="flex items-center">
                    <Link :href="route('welcome')">
                        <jet-application-mark class="block w-auto mr-2" />
                    </Link>
                    <li class="p-2 hover:opacity-50"><Link :href="route('info')">Informace</Link></li>
                    <li class="p-2 hover:opacity-50"><Link :href="route('courses')">Události</Link></li>
                    <li class="p-2 hover:opacity-50"><Link :href="route('about')">O Lektorce</Link></li>
                    <li class="p-2 hover:opacity-50"><Link :href="route('price_list')">Ceník</Link></li>
                    <li class="p-2 hover:opacity-50"><Link :href="route('contacts')">Kontakty</Link></li>
                    <li v-if="canLogin" class="pl-4 p-2 text-sm ml-auto">
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
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'

export default {
    name: "Navbar",
    components: {
        Head,
        Link,
        JetApplicationMark
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>

<style scoped>

</style>
