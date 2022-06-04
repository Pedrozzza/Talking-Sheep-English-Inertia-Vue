<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'O Lektorce'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="my-16 text-4xl font-extrabold text-blue-800 text-shadow-md">Poznej svoji budoucí lektorku</h2>
            </div>
            <div>
                <img :src="'../../storage/about-photos/lector.jpg'" alt="talking sheep english" class="shadow-xl rounded-xl float-left mb-4 mr-8" style="width: 556px">
                <div class="text-xl font-bold text-justify">
                    <p>
                        Jmenuji se Monika a mám za sebou pár let života na cestách.
                        Nejdříve jsem 2 roky žila v Anglii, konrétně v Lake District. Pak jsem si střihla ještě rok na
                        Novým Zelí. V mezičase jsem si ze Zelíčka odskočila na měsíc na Filipíny, a později, po cestě
                        zpět domů jsem to vzala ještě přes pár metropolitních zastávek včetně jednoho měsíce ve Vietnamu.
                        Cestování je úžasná věc, a strávit někde v zahraničí delší dobu než jen víkendovou opalovačku můžu
                        jedině doporučit. Je neuvěřitelně obohacující zkusit si v cizí zemi chvíli žít, nebo i pracovat.
                        Spousta lidí to ale neudělá, i když je to láká, a častou výmluvou je “Neumím anglicky.”
                    <br>
                    <br>
                        Prozradím ti tajemství. Taky jsem neuměla anglicky. Na základce mě angličtina nebavila a nosila
                        jsem domů od dvojek až po čtverce. Na střední jsem stále ještě učení se jazyku moc pozornosti
                        nevěnovala, protože jsem měla pocit, že mi to stejně nikdy nepůjde nějak vyjímečně, a že to
                        nebudu stejně nikdy potřebovat. Představovala jsem si, že na to, aby člověk uměl mluvit dobře
                        cizím jazykem, by musel mít nějaký superschopnosti komiksových hrdinů.
                        Ani ve snu mě tehdy nenapadlo, že budu jednou hovořit plynule, celkem bez obav cestovat po celým světě,
                        žít a pracovat v zahraničí, natož že bych někdy mohla angličtinu učit.
                    <br>
                    <br>
                        A wualaaaa: TADY JSEM. Jsem jasnej důkaz toho, že žádný superschopnosti nejsou potřeba. Stačí se
                        rozhodnout, že na tom chci pravidelně pracovat, a že pro to chci něco dělat. No, a pak je
                        samozřejmě důležitý učit se to tak, aby mě to nenudilo, neštvalo, neotravovalo a nebolelo.
                        Už dávno se ví, že mozek si všecko mnohem líp zapamatuje, když k tomu vidí obrázky, videa,
                        nebo je to proložené nějakým pohybem, když si s tou látkou může hrát, a když to prostě celé
                        má pořádný kontext. Pokud se opakovaně snažíme si prostě jen zapamatovat to, co se pokoušíme
                        naučit, často to nefunguje. Co to zkusit jinak? Zkusit si vytvořit vzpomínku, ve které je zahrnuté
                        to, co se pokoušíme naučit. Pro spoustu lidí takový způsob učení funguje mnohem lépe.
                    <br>
                    <br>
                        Učit mě baví, a baví mě kontakt s lidmi. A najdu ty nejšílenější způsoby, jak zapříčinit, aby
                        to bavilo i tebe! Bude to jiné, bude to nové, bude to trhlé a neotřelé. Bude to sranda a navíc
                        si z toho budeš hodně věcí pamatovat! Učíme se s kontextem, hrajeme hry, a kombinujeme bláznivé
                        věci s neuvěřitelnými, protože čím větší šílenost, tím pro mozek zapamatovatelnější. Pořádáme
                        občasné konverzační procházky, pikniky, večery u vína! Socializace, sranda + English.
                    </p>
                </div>
                <div class="flex justify-center text-center">
                    <h2 class="my-12 text-3xl font-extrabold text-blue-800 text-shadow-md">Moje kvalifikace</h2>
                </div>
                <div class="mb-16">
                    <img :src="'../../storage/about-photos/about.jpg'" alt="talking sheep english" class="shadow-xl rounded-xl float-right mb-4 ml-8" style="width: 521px">
                    <div class="text-xl font-bold text-justify">
                        <p>
                            Nemám akademické vzdělání na výuku angličtiny. Znám spoustu lidí, co ano. Ale ačkoliv angličtině
                            dokonale rozumí, a znají perfektně všechny zákonitosti, nemají nervy na to, někoho to učit.
                            Někteří na to zase mají nervy, ale když se jich zeptáte na “Proč je to takhle a proč to nemůže
                            být onak” - odpoví vám složitou šifrou mistra Leonarda, která místo odpovědi přinese do vašich
                            hlav jen více otazníků.
                        <br>
                            Já jsem jeden z vás. Byla jsem s angličtinou dlouho tam kde vy, ať už si svou aktuální pozici
                            definujete jakkoliv, a pokud jste u toho sprostí, tak ano, i tam jsem byla. Moje kvalifikace je
                            získaná praxí - životem a prací v zahraničí, a doplněná samostudiem. No a mám na to už i ten
                            papír ! certifikát z Cambridge:)
                        <br>
                        <br>
                            Pro studenty, kteří chtějí vést jednou obchodní jednání na Manhattnu je všude kolem spousta
                            akademicky vzdělaných učitelů angličtiny.
                            Já se chci ale zaměřit na vás, kteří si chcete být schopní zařídit věci na cestách,
                            pokecat u bazénu s fešákem z vedlejšího hotelovýho pokoje, sehnat si v cizí zemi parťáka
                            na třídenní tůru horami, nebo se prostě jen zeptat na cestu. A také na vás, školou povinné
                            studenty, kteří prostě mají v té angličtině stále chaos! No a v neposlední řadě na malý špunty,
                            u kterých je důležitý vzbudit radost a nadšení pro jazyk dříve, než to případně školní
                            systém výuky jazků stihne kompletně zabít.
                        <br>
                        <br>
                            Po tom co jsem si zažila na cestách, jsem se rozhodla, že chci pomáhat lidem, kteří se bojí
                            do zahraničí vyjet kvůli jazyku. Chci pomáhat přemoci toho bubáka, který lidi brzdí v rozletu.
                            Protože věřte mi, ono to vůbec není tak těžké, se prostě sebrat a někam vyrazit. Stačí se v
                            jazyce základně zorientovat, a s tím vám pomohu!
                        <br>
                        <br>
                            Je důležitý se přestat bát promluvit. A pak se věci začnou dít. Díky tomu, že jsem se vydala
                            do zahraničí a donutila se tak mluvit, i přesto že to tehdy zdaleka ještě nebylo perfektní,
                            jsem zažila spoustu neuvěřitelně úžasných věcí. Ale o tom si můžeme vyprávět později,
                            v angličtině, naživo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import WelcomeLayout from "../Layouts/WelcomeLayout";

export default {
    name: "About",
    components: {
        WelcomeLayout
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean
    }
}
</script>

<style scoped>

</style>
