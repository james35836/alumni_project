<template>
    <div>
        <v-carousel hide-controls  height="550">
            <v-carousel-item gradient="to top right, rgba(184, 209, 241, 0.33), rgba(25, 32, 72, 0.7)" style="Background-size: cover" v-for="(item,i) in items" :key="i" :src="item.src">
                <v-layout column align-center justify-center class="white--text container" style="margin-top:150px">
                    <h1 class="white--text mb-2 font-weight-bold display-1 text-xs-center">{{item.title}}</h1>
                    <div class="headline mb-3 font-weight-light text-xs-center font-italic">{{item.qoute}}</div>
                    <v-btn class="deep-purple darken-4 mt-5" dark large to="/register">
                        Get Started
                    </v-btn>
                </v-layout>
            </v-carousel-item>
        </v-carousel>
    </div>
</template>
<script>
export default {
    data() {
        return {
            items: [
                { src: 'https://images.pexels.com/photos/1043506/pexels-photo-1043506.jpeg?auto=compress&cs=tinysrgb',title : "Determination", qoute : "“A dream doesn't become reality through magic; it takes sweat, determination and hard work.”" },
                { src: 'https://images.pexels.com/photos/1204649/pexels-photo-1204649.jpeg?auto=compress&cs=tinysrgb',title : "Motivation", qoute : "“There will be obstacles. There will be doubters. There will be mistakes. But with hard work, there are no limits.”"  },
                { src: 'https://images.pexels.com/photos/1345089/pexels-photo-1345089.jpeg?auto=compress&cs=tinysrgb',title : "Hard Work", qoute : "“A dream doesn't become reality through magic; it takes sweat, determination and hard work.”"  },
                { src: 'https://images.pexels.com/photos/990818/pexels-photo-990818.jpeg?auto=compress&cs=tinysrgb',title : "Inspiration", qoute : "“Happiness is not something you postpone for the future; it is something you design for the present.”"  }
            ]
        }
    }
}
</script>
<style>
.container {
    padding: none !important;
}

.v-carousel {
    height: 100%;
}
</style>