require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import Vuelidate from 'vuelidate';
import VueI18n from 'vue-i18n';
import VueQrcodeReader from "vue-qrcode-reader";

Vue.mixin({ methods: { route } });
Vue.use(VueI18n);
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueQrcodeReader);
Vue.use(Vuelidate)

const app = document.getElementById('app');

const i18n = new VueI18n({
    locale: 'nl',
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
                users : 'Add user',
                checkedinvisitors : 'Checked-in Visitors',

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
                decline : 'Decline',

                //Receptionist meetings
                start : 'Start',
                end : 'end',
                choosehost : 'Choose host for the meeting',
                nohost : 'You have to select a host!',
                upcoming : 'Upcoming',
                new : 'Newest',
                old : 'Oldest',
                forward : 'Forward meeting',
                cancel : 'Cancel meeting',

                //Add user
                Createuser : 'Create new user',
                email : 'Email address',
                fname : 'First name',
                lname : 'Last name',
                password : 'Password',
                Repassword : 'Repeat password',
                choosecompany : 'Choose company',
                choosedepartment : 'Choose department',
                chooseaccount : 'Choose account type',
                create : "Create"


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
                users : 'Voeg gebruiker toe',
                checkedinvisitors : 'doorgewinterde bezoekers',

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
                decline : 'Afwijzen',

                //Receptionist meetings
                start : 'Begin',
                end : 'Einde',
                choosehost : 'Kies de host voor de vergadering',
                nohost : 'Je moet een host selecteren!',
                upcoming : 'Aankomende',
                new : 'Nieuwste',
                old : 'Oudste',
                forward : 'Vergadering doorsturen',
                cancel : 'Afspraak annuleren',

                //Add user
                Createuser : 'Maak een nieuwe gebruiker aan',
                email : 'E-mailadres',
                fname : 'Voornaam',
                lname : 'Achternaam',
                password : 'Wachtwoord',
                Repassword : 'herhaal wachtwoord',
                choosecompany : 'Kies een bedrijf',
                choosedepartment : 'Kies een afdeling',
                chooseaccount : 'Kies een accounttype',
                create : "Creëer"


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
