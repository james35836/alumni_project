<template>
    <v-app id="announcement">
        <m-header-component></m-header-component>
        <v-content>
            <v-container>
                <v-tabs slot="extension" v-model="tabs" icons-and-text fixed-tabs color="transparent">
                    <v-tabs-slider></v-tabs-slider>
                    <v-tab href="#tab-1" class="darken-4--text">
                        GENERAL
                        <v-icon>account_circle</v-icon>
                    </v-tab>
                    <v-tab href="#tab-2" class="darken-4--text">
                        BATCH
                        <v-icon>account_box</v-icon>
                    </v-tab>
                </v-tabs>
                <v-tabs-items v-model="tabs" class="white elevation-1">
                    <v-tab-item v-for="i in 2" :value="'tab-' + i" :key="i">
                        <v-card>
                            <v-card class="scroll-y" id="scrolled-content" height="300">
                                <v-layout class="chat-container" v-if="messages" row wrap v-for="message in messages">
                                    <v-card :class="{ 'green mt-2 xs7   sm7 md7 mt-2 text-xs-right self-card': message.user_id == 1, 'purple xs7 offset-xs0 offset-mg2 offset-lg5 mt-2 text-xs-right': message.user_id != 1 }">
                                        <v-card-text class="highlights-go-here">
                                            {{ message.message }}
                                        </v-card-text>
                                    </v-card>
                                </v-layout>
                                <v-layout v-if="!messages" row wrap>
                                    <v-card class="white mt-2 xs7 sm7 md7 mt-2">
                                        <v-card-text class="highlights-go-here">
                                            No Messages
                                        </v-card-text>
                                    </v-card>
                                </v-layout>
                            </v-card>
                            <v-card-actions>
                                <v-textarea solo v-model="send.message" name="input-1-1" rows="2" label="Type message.."></v-textarea>
                                <v-btn round class="primary" @click="send_message">Send <v-icon>send</v-icon>
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-container>
        </v-content>
        <m-footer-component></m-footer-component>
    </v-app>
</template>
<script>
export default {
    data: () => ({

        send: {},
        messages: null,
        tabs: null,
    }),
    methods: {
        send_message() {
            // this.scrollToEnd();
            this.send.group_id = 1;
            this.send.user_id = 1;
            axios.post('/api/send_message', this.send).then(res => {

                    this.messages.push(res.data);
                    this.send.message = "";
                    this.scrollToEnd();
                })
                .catch(err => {
                    this.error_message = err.response.data.message;
                    this.loading = false;
                });
        },
        scrollToEnd() {
            var container = document.getElementById("scrolled-content")
            container.scrollTop = container.scrollHeight;
        },



        get_messages() {
            axios.get('/api/message').then((response) => {
                this.messages = response.data;
            });
        }
    },
    mounted: function() {

        this.scrollToEnd()
        this.get_messages()
    },


}
</script>
<style>
.highlighted {
    font-weight: bold;
}

.chat-container .v-card {
    width: 60%;
}

.self-card {
    margin-left: 40%;
}

.scroll {
    overflow-y: auto;
}
</style>