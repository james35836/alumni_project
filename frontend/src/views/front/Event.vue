<template>
    <v-app id="event" class="grey lighten-3">
        <f-header-component></f-header-component>
        <v-container fluid>
            <v-layout justify-center>
                <v-flex xs12>
                    <v-card>
                        <v-card-title class="justify-center">
                            <div class="headline">EVENTS</div>
                        </v-card-title>
                        <v-card-text>
                            <v-flex xs12>
                                <div v-for="post in posts" :key="post.title">
                                    <v-card class="my-3" hover>
                                        <v-img class="white--text" height="170px" :src="post.imgUrl">
                                            <v-container fill-height fluid>
                                                <v-layout>
                                                    <v-flex xs12 align-end d-flex>
                                                        <span class="headline">{{ post.title }}</span>
                                                    </v-flex>
                                                </v-layout>
                                            </v-container>
                                        </v-img>
                                        <v-card-text>
                                            {{ post.content }}
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn icon class="red--text">
                                                <v-icon medium>fa-reddit</v-icon>
                                            </v-btn>
                                            <v-btn icon class="light-blue--text">
                                                <v-icon medium>fa-twitter</v-icon>
                                            </v-btn>
                                            <v-btn icon class="blue--text text--darken-4">
                                                <v-icon medium>fa-facebook</v-icon>
                                            </v-btn>
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
                                </div>
                            </v-flex>
                        </v-card-text>
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
        posts: [{
                title: 'Fusce ullamcorper tellus',
                content: 'Fusce ullamcorper tellus sed maximus rutrum. Donec imperdiet ultrices maximus. Donec non tellus non neque pellentesque fermentum. Aenean in pellentesque urna.',
                imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/drop.jpg'
            },
            {
                title: 'Donec vitae suscipit lectus, a luctus diam.',
                content: 'Donec vitae suscipit lectus, a luctus diam. Proin vitae felis gravida, lobortis massa sit amet, efficitur erat. Morbi vel ultrices nisi.',
                imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/docks.jpg'
            },
            {
                title: 'Vestibulum condimentum quam',
                content: 'At sagittis sapien vulputate. Vivamus laoreet lacus id magna rutrum dapibus. Donec vel pellentesque arcu. Maecenas mollis odio tempus felis elementum commodo.',
                imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/plane.jpg'
            }
        ],
    }),


}
</script>