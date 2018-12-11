<template>
    <div>
        <v-navigation-drawer v-model="drawer" absolute temporary>
            <v-list class="pa-1" style="background: #311B92;">
                <v-list-tile>
                    <img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" class="hidden-sm-and-down" style="height:50px;width:50px;">
                    <v-toolbar-title class="white--text ">Alumni Association</v-toolbar-title>
                </v-list-tile>
            </v-list>
            <v-list class="pt-0" dense>
                <v-divider></v-divider>
                <v-list-tile v-for="item in items" :key="item.title" @click="" :to="item.link">
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <div style="height: 33px;" class="hidden-sm-and-down d-inline row" color="blue lighten-5" width="100">
            <v-layout row wrap>
            <v-flex class="text-xs-left d-inline mt-1" xs6 sm6 md6>
                <div class="font-weight-medium"><v-icon>phone</v-icon> 09367932821 <v-icon>email</v-icon> jamesomosora@gmail.com</div>
               
            </v-flex>
            <v-flex class="text-xs-right d-inline" xs6 sm6 md6>
                Follow Us 
                <v-btn style="height: 25px;width: 25px; ]" v-for="social in socials" :color="social.color" class="white--text text-xs-right" fab icon small>
                    <v-icon style="font-size: 12px;">{{ social.icon }}</v-icon>
                </v-btn>
            </v-flex>
            </v-layout>
        </div>
        <v-toolbar color="deep-purple darken-4" dark width="100">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdvbpHeK93w0AchF4i8axVOxAfzT-razCjo5decEMYE4BAe9JTJQ" class="hidden-sm-and-down" style="height:50px;width:50px;">
            <v-toolbar-side-icon class="hidden-md-and-up" @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>Alumni Association</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn v-for="item in items" :key="item.title" @click="" :to="item.link" flat>{{ item.title }}</v-btn>
            </v-toolbar-items>
        </v-toolbar>
    </div>
</template>
<script>
export default {

    data() {
        return {
            drawer: null,
            items: [
                { title: 'Home', link: 'home', icon: 'dashboard' },
                { title: 'Events', link: 'event', icon: 'question_answer' },
                { title: 'About Us', link: 'about', icon: 'dashboard' },
                { title: 'Contact Us', link: 'contact', icon: 'question_answer' },
                { title: 'Login', link: 'login', icon: 'dashboard' },
                // { title: 'Register', link: 'register', icon: 'question_answer' },
            ],
            socials: [{
                    icon: 'fab fa-facebook',
                    color: 'indigo'
                },
                {
                    icon: 'fab fa-linkedin',
                    color: 'cyan darken-1'
                },
                {
                    icon: 'fab fa-instagram',
                    color: 'red lighten-3'
                }
            ]

        }
    },
    mounted: function() {
        if (this.$store.state.access_token) {
            this.$router.push('/member/dashboard');
        }
    },

}
</script>
<style>
.sub-navbar {
    height: 25px !important;
}
</style>