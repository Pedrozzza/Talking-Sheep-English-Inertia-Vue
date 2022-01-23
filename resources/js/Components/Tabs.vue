<template>
    <div>
        <div class="bg-red-800 flex justify-center items-center text-center">
            <div class="container">
                <div class="grid grid-cols-3 gap-4">
                    <div @click="tab1"
                         class="py-8 cursor-pointer transition-all duration-150 ease-in-out hover:bg-red-700 hover:text-white text-3xl hover:border-l-8 hover:border-t-8 hover:border-r-8 hover:sm:rounded-tl-lg hover:sm:rounded-tr-lg hover:border-white"
                         :class="{ 'bg-red-700 text-white text-3xl border-l-8 border-t-8 border-r-8 sm:rounded-tl-lg sm:rounded-tr-lg border-white' : show_tab1, 'text-gray-300' : !show_tab1 }"
                    >
                        <font-awesome-icon :icon="['fas', 'user-graduate']" size="lg" class="mb-4"/>
                        <p class="hide-sm">Co nabízím?</p>
                    </div>
                    <div @click="tab2"
                         class="py-8 cursor-pointer transition-all duration-150 ease-in-out hover:bg-red-700 hover:text-white text-3xl hover:border-l-8 hover:border-t-8 hover:border-r-8 hover:sm:rounded-tl-lg hover:sm:rounded-tr-lg hover:border-white"
                         :class="{ 'bg-red-700 text-white text-3xl border-l-8 border-t-8 border-r-8 sm:rounded-tl-lg sm:rounded-tr-lg border-white' : show_tab2, 'text-gray-300' : !show_tab2 }"
                    >
                        <font-awesome-icon :icon="['fas', 'undo']" size="lg" class="mb-4"/>
                        <p class="hide-sm">Co když mně to nesedne?</p>
                    </div>
                    <div @click="tab3"
                         class="py-8 cursor-pointer transition-all duration-150 ease-in-out hover:bg-red-700 hover:text-white text-3xl hover:border-l-8 hover:border-t-8 hover:border-r-8 hover:sm:rounded-tl-lg hover:sm:rounded-tr-lg hover:border-white"
                         :class="{ 'bg-red-700 text-white text-3xl border-l-8 border-t-8 border-r-8 sm:rounded-tl-lg sm:rounded-tr-lg border-white' : show_tab3, 'text-gray-300' : !show_tab3 }"
                    >
                        <font-awesome-icon :icon="['fas', 'coins']" size="lg" class="mb-4"/>
                        <p class="hide-sm">Kolik zaplatím?</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <tab1 v-if="show_tab1"></tab1>
            <tab2 v-if="show_tab2"></tab2>
            <tab3 v-if="show_tab3"></tab3>
        </div>

    </div>
</template>

<script>
import { library } from "@fortawesome/fontawesome-svg-core";
import { faBars, faUserClock, faUsersCog, faCoins, faUserGraduate, faUndo } from "@fortawesome/free-solid-svg-icons";
import {
    faTwitter,
    faFacebook,
} from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import Tab1 from "./Tabs/Tab1";
import Tab2 from "./Tabs/Tab2";
import Tab3 from "./Tabs/Tab3";

library.add(faBars, faUserClock, faTwitter, faUsersCog, faCoins, faFacebook, faUserGraduate, faUndo);

export default {
    name: "Tabs",
    components: {
        FontAwesomeIcon,
        Tab1,
        Tab2,
        Tab3
    },
    data: () => ({
        show_tab1: true,
        show_tab2: false,
        show_tab3: false,
    }),
    methods: {
        tab1() {
            this.show_tab1 = true;
            this.show_tab2 = false;
            this.show_tab3 = false;
        },
        tab2() {
            this.show_tab1 = false;
            this.show_tab2 = true;
            this.show_tab3 = false;
        },
        tab3() {
            this.show_tab1 = false;
            this.show_tab2 = false;
            this.show_tab3 = true;
        }

    }
}
</script>

<style scoped>

</style>
