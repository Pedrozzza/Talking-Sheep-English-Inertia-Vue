<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- favicon -->
        @include('inc.favicon')

        <!-- Animation -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Cookies -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.0/dist/cookieconsent.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- Permissions sending to Vue -->
        <script type="text/javascript">
            window.Laravel = {
                csrfToken: "{{ csrf_token() }}",
                jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():0 !!}
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv

        <!-- Cookies -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.0/dist/cookieconsent.js"></script>
        <script>
            window.addEventListener('load', function(){
                var cc = initCookieConsent();
                cc.run({
                    current_lang: 'cs',
                    autoclear_cookies: true,
                    theme_css: '',
                    page_scripts: true,
                    onFirstAction: function(user_preferences, cookie){
                    },
                    onAccept: function (cookie) {
                    },
                    onChange: function (cookie, changed_categories) {
                    },
                    languages: {
                        cs: {
                            consent_modal: {
                                title: 'Pou????v??me soubory cookies!',
                                description: ''
                                    + ' S c??lem zlep??it slu??by,'
                                    + ' kter?? nab??z??me.'
                                    + ' <button type="button" data-cc="c-settings" class="cc-link">V??ce mo??nost??</button>',
                                primary_btn: {
                                    text: 'P??ijmout v??e',
                                    role: 'accept_all', // 'accept_selected' or 'accept_all'
                                },
                                secondary_btn: {
                                    text: 'Odm??tnout v??e',
                                    role: 'accept_necessary', // 'settings' or 'accept_necessary'
                                },
                            },
                            settings_modal: {
                                title: 'P??edvolby soubor?? cookies',
                                save_settings_btn: 'Ulo??it nastaven??',
                                accept_all_btn: 'Vybrat v??e',
                                reject_all_btn: 'Odm??tnout v??e',
                                close_btn_label: 'Zav????t',
                                cookie_table_headers: [
                                    { col1: 'N??zev' },
                                    { col2: 'Dom??na' },
                                    { col3: 'Expirace' },
                                    { col4: 'Popis' },
                                ],
                                blocks: [
                                    {
                                        title: 'Pou????v??n?? soubor?? cookies ????',
                                        description: 'Soubory cookie pou????v??me k zaji??t??n?? z??kladn??ch funkc?? webu a '
                                            + 'ke zlep??en?? va??eho online z????itku. Pro ka??dou kategorii si m????ete vybrat, zda '
                                            + 'se chcete p??ihl??sit/odhl??sit, kdykoli budete cht??t.',
                                    }, {
                                        title: 'Nezbytn?? nutn?? cookies',
                                        description: 'Tyto soubory cookie jsou nezbytn?? pro spr??vn?? fungov??n?? '
                                            + 'na??ich webov??ch str??nek. Bez t??chto cookies by web nefungoval spr??vn??',
                                        toggle: {
                                            value: 'necessary',
                                            enabled: true,
                                            readonly: true, // cookie categories with readonly=true are all
                                            // treated as "necessary cookies"
                                        },
                                    }, {
                                        title: 'Preferen??n?? cookies',
                                        description: 'Tyto soubory cookies umo????uj?? webov?? str??nce zapamatovat si informace, '
                                            + 'kter?? m??n?? zp??sob, jak??m se webov?? str??nka chov?? nebo vypad??. Nap????klad jako je v???? '
                                            + 'preferovan?? jazyk nebo region, ve kter??m se nach??z??te.',
                                        toggle: {
                                            value: 'preference', // your cookie category
                                            enabled: false,
                                            readonly: false,
                                        },
                                    }, {
                                        title: 'Analytick?? cookies',
                                        description: 'Tyto soubory cookies se pou????vaj?? ke shroma????ov??n?? informac?? pro anal??zu provozu '
                                            + 'na na??ich webov??ch str??nk??ch a sledov??n?? pou????v??n?? na??ich webov??ch str??nek u??ivateli. '
                                            + 'Tyto soubory cookies mohou nap????klad sledovat v??ci jako je doba kterou na webu tr??v??te, '
                                            + 'nebo str??nky, kter?? nav??t??vujete, co?? n??m pom??h?? pochopit, jak pro v??s m????eme vylep??it '
                                            + 'n???? web. '
                                            + 'Informace shrom????d??n?? prost??ednictv??m t??chto analytick??ch cookies '
                                            + 'neidentifikuj?? ????dn?? osoby.',
                                        toggle: {
                                            value: 'analytics', // your cookie category
                                            enabled: false,
                                            readonly: false,
                                        },
                                    }, {
                                        title: 'Reklamn?? cookies',
                                        description: 'Tyto soubory cookie shroma????uj?? informace o tom, jak'
                                            + ' web pou????v??te, kter?? str??nky jste nav??t??vili a na kter?? odkazy jste klikli. '
                                            + 'V??echna data jsou anonymizov??na a nelze je pou????t k va???? identifikaci',
                                        toggle: {
                                            value: 'marketings',
                                            enabled: false,
                                            readonly: false,
                                        },
                                    }, {
                                        title: 'V??ce informac??',
                                        description: 'M??te-li jak??koli dotazy t??kaj??c?? se na??ich z??sad t??kaj??c??ch se'
                                            + ' soubor?? cookie a va??ich voleb, pros??m <a class="cc-link" href="/contact">'
                                            + 'kontaktujte n??s</a>.',
                                    },
                                ],
                            },
                        },
                    }
                });
            });
        </script>
    </body>
</html>
