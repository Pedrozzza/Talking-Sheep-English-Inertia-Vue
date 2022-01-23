<template>
    <div class="h-160 flex justify-center items-center">
        <div class="container">
            <div id="tab-1-content" class="grid grid-cols-2 gap-36">
                <div class="self-center">
                    <h1 class="text-black text-3xl font-bold mb-12">Výuka hravým stylem, pohodová přátelská atmoška, vtípky, real talks. Žádná cvičení v učebnici, ale povídání o tom, co tě zájímá.</h1>
                    <h1 class="text-black text-3xl font-bold mb-12">Možností jsou také procházky spojené s venčením psisek. Strukturované online cally s rodilými mluvčími</h1>
                    <ButtonSecondary class="text-xl shadow-md">Podrobnější info zde</ButtonSecondary>
                </div>
                <div>
                    <p class="text-black text-xl font-bold mb-4">Shlédni tohle informační video:</p>
                    <vue-player-video src="storage/video/TalkingSheepPromo.mp4"></vue-player-video>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonSecondary from "../../Jetstream/ButtonSecondary";
import VuePlayerVideo from "vue3-player-video";

export default {
    name: "Tab1",
    components: {
        ButtonSecondary,
        VuePlayerVideo
    }
}
</script>

<style scoped>

</style>
