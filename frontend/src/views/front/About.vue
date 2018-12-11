<template>
    <v-app class="grey lighten-3">
        <f-header-component></f-header-component>
        <v-container fluid>
            <v-layout justify-center>
                <v-flex xs12>
                    <v-card>
            <v-card-title class="justify-center">
                <div class="headline">ABOUT US</div>
            </v-card-title>
            <v-card-title class="justify-center">
                <div class="subheading font-weight-bold">Our Mission</div>
            </v-card-title>
            <v-container grid-list-lg>
                <v-layout row wrap>
                    <v-flex xs12 justify-center >
                        <!-- <v-card   > -->
                            <v-card-text class="subheading">
                                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse
                                potenti.
                            </v-card-text>
                        <!-- </v-card> -->
                    </v-flex>
                </v-layout>
            </v-container>
            <v-card-title class="justify-center">
                <div class="subheading font-weight-bold">Our Vision</div>
            </v-card-title>
            <v-container grid-list-lg>
                <v-layout row wrap>
                    <v-flex xs12 justify-center >
                        <!-- <v-card   > -->
                            <v-card-text class="subheading">
                                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse
                                potenti.
                            </v-card-text>
                        <!-- </v-card> -->
                    </v-flex>
                </v-layout>
            </v-container>
            <v-card-title class="justify-center">
                <div class="subheading font-weight-bold">Our Goals</div>
            </v-card-title>
            <v-container grid-list-lg>
                <v-layout row wrap>
                    <v-flex xs12 justify-center >
                        <!-- <v-card   > -->
                            <v-card-text class="subheading">
                                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse
                                potenti.
                            </v-card-text>
                        <!-- </v-card> -->
                    </v-flex>
                </v-layout>
            </v-container>
            <v-card-title class="justify-center">
                <div class="subheading font-weight-bold">Our Officers</div>
            </v-card-title>
            <v-container grid-list-lg>
                <v-layout row wrap>
                    <v-flex v-for="officer in items" xs12 sm6 md4 justify-center class="text-xs-center">
                        <v-card class=" transparent text-xs-center pt-3" style="text-align:center;" justify-center>
                            <v-img justify-center class="rounded-image" src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" style="width:200px;height:200px;border-radius:50%;margin:auto;">
                            </v-img>
                            <v-card-title primary-title>
                                <div style="margin:auto;">
                                    <div class="subheading">{{officer}}</div>
                                    <span class="grey--text">The President</span>
                                </div>
                            </v-card-title>
                            <v-card-actions class="text-xs-center">
                                <!-- <v-btn flat>Share</v-btn> -->
                                <v-spacer></v-spacer>
                                <v-btn icon @click="show = !show">
                                    <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
                                </v-btn>
                            </v-card-actions>
                            <v-slide-y-transition>
                                <v-card-text v-show="show">
                                    I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
                                </v-card-text>
                            </v-slide-y-transition>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
            
        </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        
        <f-footer-component></f-footer-component>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        show: false,
        items: ['James Omosora','Events','about', 'Contact Us', 'question_answer','Register' ],
    })
}
</script>
<style>
</style>