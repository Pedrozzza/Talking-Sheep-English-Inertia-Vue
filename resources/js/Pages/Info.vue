<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Informace'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.info_main_title ?? 'Jak probíhá výuka?' }}</h2>
            </div>
            <div>
                <p class="my-8 text-2xl font-bold flex justify-center">
                    {{ settings?.data?.info_main_subtitle ?? 'Volba je především na tobě a tvých preferencí. S rozhodováním ti mohou pomoci následující informace rozdělené dle kategorií.' }}
                </p>
            </div>
            <div class="flex justify-between px-2">
                <card>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a href="#!">
                                <img class="rounded-t-lg" src="../../img/info_cards/card1.png" alt=""/>
                            </a>
                            <div class="p-6">
                                <h5 class="text-blue-800 text-center text-xl font-bold mb-2">{{ settings?.data?.info_first_card_title ?? 'NA ŽIVO / ONLINE' }}</h5>
                                <p class="text-gray-700 text-justify text-base mb-4">
                                    {{ settings?.data?.info_first_card_text1 ?? 'Kurzy poběží naživo v Chrudimi, a také online po síti skrze videohovory pro ty, kteří to mají za námi daleko. Pokud jsi z vesnice vedle a zvažuješ, zda se učit se mnou na živo, nebo online, doporučuji se „hecnout“ a jít do toho s námi na živo. Při výuce na živo totiž můžeme využít spoustu super výukových technik a metod, které jsou při online výuce částečně omezené. Výuka na živo je díky tomu šťavnatější a výživnější, a studenta ještě více vtáhne do dění.' }}
                                    <br><br>
                                    {{ settings?.data?.info_first_card_text2 ?? 'Online výuku využívají především studenti, kteří chtějí individuální lekce, nebo ti kteří jsou opravdu daleko.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a href="#!">
                                <img class="rounded-t-lg" src="../../img/info_cards/card2.png" alt=""/>
                            </a>
                            <div class="p-6">
                                <h5 class="text-blue-800 text-center text-xl font-bold mb-2">{{ settings?.data?.info_second_card_title ?? 'NA POHODU / INTENZIVNĚ' }}</h5>
                                <p class="text-gray-700 text-justify text-base mb-4">
                                    {{ settings?.data?.info_second_card_text1 ?? 'Na pohodu znamená jednou týdně na 2 hodiny. Intenzivně znamená dvakrát týdně na 2 hodiny. Na pohodu si to dej, pokud na angličtinu nemáš tolik času, chceš se zlepšit, ale nemáš v  plánu se do toho opřít silou. Intenzivně si to dej, pokud se chceš rychle posunout, máš odhodlání a jsi rozhodnutý tomu věnovat nemalou časovou dotaci.' }}
                                    <br><br>
                                    {{ settings?.data?.info_second_card_text2 ?? 'V obou případech počítej se zadávanými domácími úkoly, který jsou dalším chytře investovaným časem do tvého vzdělání, i časem na samostudium které zadávám, například filmy, knížky (ale neboj, žádná nuda to nebude!)' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a href="#!">
                                <img class="rounded-t-lg" src="../../img/info_cards/card3.png" alt=""/>
                            </a>
                            <div class="p-6">
                                <h5 class="text-blue-800 text-center text-xl font-bold mb-2">{{ settings?.data?.info_third_card_title ?? 'INDIVIDUÁLNĚ / VE SKUPINĚ' }}</h5>
                                <p class="text-gray-700 text-justify text-base mb-4">
                                    {{ settings?.data?.info_third_card_text1 ?? 'Výhodou individuální výuky je především to, že celý čas výuky je věnovaný tobě. Intenzita je tedy daleko větší než během výuky ve skupině a progres učení a pochopení problematiky je rychlejší. Také je větší prostor se zaměřit především na ty situace, kde nejvíce chybuješ. Lekce jsou tedy více šité na míru.' }}
                                    <br><br>
                                    {{ settings?.data?.info_third_card_text2 ?? 'Výhodou skupinové výuky může být naopak větší motivace díky ostatním studentům. Lekce bývají také maličko zajímavější a zábavnější formou a učení tak může jít někdy snáze. Samozřejmostí je také, že poznáš nové parťáky a procvičíš si konverzace, které jsou ve větší skupince rozmanitější.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </card>
            </div>
            <div class="flex justify-center text-center">
                <h2 class="my-16 text-3xl font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.info_bottom_subtitle ?? 'Bude to jiné, bude to sranda, bude to hravé a bude to efektivní. Buď u toho!' }}</h2>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import WelcomeLayout from "../Layouts/WelcomeLayout";

export default {
    name: "Info",
    components: {
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
