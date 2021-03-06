require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import * as ValidationRules from './validationRules';
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs';
import CKEditor from '@ckeditor/ckeditor5-vue';
import CoolLightBox from 'vue-cool-lightbox'
import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(ValidationRules)
            .use(plugin)
            .use(LaravelPermissionToVueJS)
            .use(CKEditor)
            .use(CoolLightBox)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
