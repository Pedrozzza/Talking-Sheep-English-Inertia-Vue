<template>
    <footer class="bg-red-800">
        <div class="container mx-auto">
            <div class="border-t-2 border-red-900">
                <div class="text-center p-4 text-white font-bold flex flex-col md:flex-row justify-around items-center">
                    <div class="mb-6 md:mb-0">
                        Copyright ©
                        <a class="text-white font-bold hover:opacity-50" href="https://www.talkingsheepenglish.cz">Talking Sheep English - {{new Date().getFullYear()}}</a>
                    </div>
                    <div class="mb-6 md:mb-0">
                        <a class="hover:opacity-50" href="https://www.facebook.com/talking.sheep.english" target="_blank"><font-awesome-icon :icon="['fab', 'facebook']" size="lg" style="font-size: 2.33rem"/></a>
                        <a class="ml-4 hover:opacity-50" href="#" target="_blank"><font-awesome-icon :icon="['fab', 'instagram']" size="lg" style="font-size: 2.33rem"/></a>
                    </div>
                    <div class="mb-6 md:mb-0">
                        Realizace:
                        <a class="text-white font-bold hover:opacity-50" href="#">webstudio-pedro.cz</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faInstagram,
    faFacebook,
} from "@fortawesome/free-brands-svg-icons";

library.add(faInstagram, faFacebook);

export default {
    name: "Footer"
}
</script>

<style scoped>

</style>
