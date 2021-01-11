require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import Vuelidate from 'vuelidate';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n);
Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(Vuelidate)

const app = document.getElementById('app');

const i18n = new VueI18n({
    locale: 'en',
    messages: {
        en: {
            message: {
                // Navigationbar
                dashboard: 'Dashboard',
                reports : 'Reports',
                meetings : 'Meetings',
                profile : 'Profile',
                manageaccount : 'Manage Account',
                logout : 'Logout',

                //Host Dashboard
                approvemeetings : 'Approve meetings',
                approvemeetingsdesc : 'Here you will be able to see all the pending meeting requests and approve them.',
                approvemeetingslink : 'To pending meetings overview',
                schedulemeetings : 'Schedule meeetings',
                schedulemeetingsdesc : 'Send meeting requests',
                schedulemeetingslink : 'To meeting overview',


                //Host reports
                generatevisitor : 'Generate visitor reports from',
                last : 'Last',
                choosemanually : 'Or choose manually',
                from : 'From',
                to : 'To',
                generate : 'Generate',

                //Host Meetings
                pendingmeeting : 'Pending meetings',
                overview : 'Overview',
                proposedmeetingtime : 'Proposed meeting time',
                meetingwith : 'Meeting with',
                proposedtime : 'Proposed time',
                notes : 'Notes',
                office : 'Office',
                floor : 'Floor',
                phonenumber : 'Phone number',
                fileupload : 'File upload',
                choosefile : 'Choose File',
                accept : 'Accept',
                decline : 'Decline'

            }
        },
        nl: {
            message: {
                // Navigationbar
                dashboard: 'Dashboard',
                reports : 'Rapporten',
                meetings : 'Vergaderingen',
                profile : 'Profiel',
                manageaccount : 'Beheer Account',
                logout : 'Uitloggen',

                //Host Dashboard
                approvemeetings : 'Keur vergaderingen goed',
                approvemeetingsdesc : 'Hier kunt u alle lopende vergaderverzoeken zien en goedkeuren.',
                approvemeetingslink : 'Overzicht van lopende vergaderingen',
                schedulemeetings : 'Plan vergaderingen',
                schedulemeetingsdesc : 'Stuur vergaderverzoeken',
                schedulemeetingslink : 'Naar vergaderoverzicht',

                //Host reports
                generatevisitor : 'Genereer bezoekersrapporten van',
                last : 'Laatste',
                choosemanually : 'Of kies handmatig',
                from : 'Van',
                to : 'Naar',
                generate : 'Genereer',

                //Host Meetings
                pendingmeeting : 'In afwachting van vergaderingen',
                overview : 'Overzicht',
                proposedmeetingtime : 'Voorgestelde vergadertijd',
                meetingwith : 'Ontmoeting met',
                proposedtime : 'Voorgestelde tijd',
                notes : 'Opmerkingen',
                office : 'Kantoor',
                floor : 'Verdieping',
                phonenumber : 'Telefoonnummer',
                fileupload : 'Bestand upload',
                choosefile : 'Kies bestand',
                accept : 'Aanvaarden',
                decline : 'Afwijzen'

            }
        }
    }
})

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
    i18n,

}).$mount(app);
