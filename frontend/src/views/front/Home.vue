<template>
    <v-app light>
        <f-header-component></f-header-component>
        <v-content>
            <section id="carousel">
                <!-- <v-parallax src="https://images.unsplash.com/photo-1515965885361-f1e0095517ea" height="600"> -->
                <g-carousel-component></g-carousel-component>
                <!--  <v-parallax src="https://cdn.vuetifyjs.com/images/parallax/material.jpg" height="600">
                    <v-layout column align-center justify-center class="white--text">
                        <img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="logo.js" height="200">
                        <h1 class="white--text mb-2 display-1 text-xs-center">My Website</h1>
                        <div class="subheading mb-3 text-xs-center">Powered by James Omosora</div>
                        <v-btn class="blue darken-3 mt-5" dark large to="/register">
                            Get Started
                        </v-btn>
                    </v-layout>
                </v-parallax> -->
            </section>
            <section>
                <v-container>
                    <v-layout row wrap justify-center>
                        <v-flex xs12>
                            <v-card class="elevation-0 transparent text-xs-center">
                                <v-card-title primary-title class="layout justify-center">
                                    <div class="headline font-weight-bold">Dear Alumni</div>
                                </v-card-title>
                                <v-card-text class="subheading">
                                    We invite you to be part of the alumni community of Paloc Elementary School, Alumni Association.<br>
                                    We’re also very interested to know how you’re doing so far. Participate in our Alumni Tracker Survey and tell us more about your achievements.
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </section>
            <section>
                <v-parallax src="https://images.unsplash.com/photo-1489289827069-adf270f4f417?dpr=1&auto=format&fit=crop&w=1500&h=2250&q=80&cs=tinysrgb&crop=" height="380">
                    <v-layout column align-center justify-center>
                        <div class=" white--text mb-3 headline font-weight-bold">Let us build our family for the future.</div>
                        <em>Click the button below to register.</em>
                        <v-btn class="deep-purple darken-4 mt-5" dark large to="/register">
                            Get Started
                        </v-btn>
                    </v-layout>
                </v-parallax>
            </section>
            <section>
                <v-layout column wrap class="my-5" align-center>
                    <v-flex xs12 sm4 class="my-3">
                        <div class="text-xs-center">
                            <h2 class="headline font-weight-bold">Alumni Association</h2>
                        </div>
                    </v-flex>
                    <v-flex xs12>
                        <v-container>
                            <v-layout row wrap align-center>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <div class="deep-purple darken-3" style="width:170px;height:170px;border-radius:50%;margin:auto;">
                                                <v-icon style="font-size: 100px;" class="white--text mt-5">directions_walk</v-icon>
                                            </div>
                                            <!-- <v-img justify-center class="rounded-image" src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" style="width:200px;height:200px;border-radius:50%;margin:auto;">
                                            </v-img> -->
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline font-weight-bold">Mission</div>
                                        </v-card-title>
                                        <v-card-text class="subheading">
                                            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse
                                            potenti.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <div class="deep-purple darken-3" style="width:170px;height:170px;border-radius:50%;margin:auto;">
                                                <v-icon style="font-size: 100px;" class="white--text mt-5">transfer_within_a_station</v-icon>
                                            </div>
                                            <!-- <v-img justify-center class="rounded-image" src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" style="width:200px;height:200px;border-radius:50%;margin:auto;">
                                            </v-img> -->
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline font-weight-bold">Vision</div>
                                        </v-card-title>
                                        <v-card-text class="subheading">
                                            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse
                                            potenti.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <div class="deep-purple darken-3" style="width:170px;height:170px;border-radius:50%;margin:auto;">
                                                <v-icon style="font-size: 100px;" class="white--text mt-5">streetview</v-icon>
                                            </div>
                                            <!-- <v-img justify-center class="rounded-image" src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" style="width:200px;height:200px;border-radius:50%;margin:auto;">
                                            </v-img> -->
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline font-weight-bold">Goals</div>
                                        </v-card-title>
                                        <v-card-text class="subheading">
                                            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse
                                            potenti.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </section>
            <f-footer-component></f-footer-component>
        </v-content>
    </v-app>
</template>
<style>
</style>