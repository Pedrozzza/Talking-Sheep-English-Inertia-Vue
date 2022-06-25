<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Kontakty'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.contact_main_title ?? 'Kontaktní údaje' }}</h2>
            </div>
            <div>
                <p class="my-8 text-xl 2xl:text-2xl font-bold flex justify-center text-center">
                    {{ settings?.data?.contact_main_subtitle ?? 'Pokud máš zájem o kurz nebo nějaké dotazy, neváhej napsat či zavolat a domluvíme se.' }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-28 mb-16">
                <div class="mx-auto">
                    <ul class="text-base 2xl:text-xl font-bold mb-6">
                        <li class="mb-4 hover:opacity-50"><a href=""><font-awesome-icon :icon="['fas', 'envelope']" size="lg" class="mr-4 text-blue-800" style="width: 30px"/>{{ settings?.data?.contact_email ?? 'talking.sheep.english@gmail.com' }}</a></li>
                        <li class="mb-4 hover:opacity-50"><a href=""><font-awesome-icon :icon="['fas', 'mobile-alt']" size="lg" class="mr-4 text-blue-800" style="width: 30px"/>{{ settings?.data?.contact_phone ?? '(+420) 728 648 959' }}</a></li>
                        <li class="mb-4"><font-awesome-icon :icon="['fas', 'map-marker-alt']" size="lg" class="mr-4 text-blue-800" style="width: 30px"/>{{ settings?.data?.contact_address ?? 'Husova 1138, Chrudim 537 01' }}</li>
                        <li class="mb-4 hover:opacity-50"><a :href="'https://' + settings?.data?.contact_website ?? 'www.talkingsheepenglish.cz'" target="_blank"><font-awesome-icon :icon="['fas', 'globe']" size="lg" class="mr-4 text-blue-800" style="width: 30px"/>{{ settings?.data?.contact_website ?? 'www.talkingsheepenglish.cz' }}</a></li>
                    </ul>
                    <contact-form :title="''" class="w-full mb-8 md:mb-0"></contact-form>
                </div>
                <div class="flex justify-center items-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41078.76085651689!2d15.771031989378978!3d49.94717550277093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470dc9f57d62f68d%3A0x400af0f6614e7d0!2sChrudim!5e0!3m2!1scs!2scz!4v1654350570889!5m2!1scs!2scz"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import WelcomeLayout from "../Layouts/WelcomeLayout";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faEnvelope, faMobileAlt, faMapMarkerAlt, faGlobe } from "@fortawesome/free-solid-svg-icons";
import ContactForm from "../Components/ContactForm";


library.add(faEnvelope, faMobileAlt, faMapMarkerAlt, faGlobe);

export default {
    name: "Contacts",
    components: {
        ContactForm,
        WelcomeLayout
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        settings: Object,
    }
}
</script>

<style scoped>

</style>
