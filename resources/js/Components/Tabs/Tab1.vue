<template>
    <div class="my-8 md:my-0 md:h-128 2xl:h-160 flex justify-center items-center">
        <div class="container">
            <div id="tab-1-content" class="grid grid-cols-1 md:grid-cols-2 md:gap-36">
                <div class="self-center p-4 md:p-0 text-center md:text-left">
                    <h1 class="text-black text-base md:text-xl 2xl:text-3xl font-bold mb-6 md:mb-12">{{ settings?.data?.hero_first_card_text1 ??
                    'Výuka hravým stylem, pohodová přátelská atmoška, vtípky, real talks. Žádná cvičení v učebnici, ale povídání o tom, co tě zájímá.' }}
                    </h1>
                    <h1 class="text-black text-base md:text-xl 2xl:text-3xl font-bold mb-6 md:mb-12">{{ settings?.data?.hero_first_card_text2 ??
                    'Možností jsou také procházky spojené s venčením psisek. Strukturované online cally s rodilými mluvčími.' }}
                    </h1>
                    <Link class="cursor-pointer text-base 2xl:text-xl shadow-md inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" :href="route('info')">
                        {{ settings?.data?.hero_first_card_button ?? 'Podrobnější info zde' }}
                    </Link>
                </div>
                <div class="p-4 md:p-0 mt-4 md:mt-0">
                    <p class="text-center md:text-left text-black text-base md:text-xl font-bold mb-4">Shlédni tohle informační video:</p>
                    <video class="video" controls>
                        <source src="video/TalkingSheepPromo.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import ButtonSecondary from "../../Jetstream/ButtonSecondary";

export default {
    name: "Tab1",
    components: {
        ButtonSecondary,
        Link,
    },
    props: {
        settings: {
            type: Object,
            default: null
        },
    },
}
</script>

<style scoped>

</style>
