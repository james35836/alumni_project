<template>
    <v-app id="announcement">
        <m-header-component></m-header-component>
        <v-content>
            <v-container>
                <v-card>
                    <v-flex row wrap>
                        <v-timeline dense clipped class=" ml-5 mr-5">
                            <v-timeline-item fill-dot class="white--text mb-5" color="deep-purple" large>
                                <span slot="icon">New</span>
                                <v-textarea box name="input-1-1" label="Post Announcement" rows="2" v-model="req_data.content" value="The Woodman set to work at once, and so sharp was his axe that the tree was soon chopped nearly through.">
                                    <template slot="append">
                                        <v-btn class="mx-0" depressed @click="submit_announcement">
                                            Post
                                        </v-btn>
                                    </template>
                                </v-textarea>
                            </v-timeline-item>
                            <v-slide-x-transition group>
                                <v-timeline-item v-for="event in timeline" :key="event.id" class="mb-3" color="pink" small>
                                    <!-- <v-layout justify-center> -->
                                        <v-flex xs12 v-text="event.content"></v-flex>
                                        <v-flex xs6 text-xs-right v-text="event.created_at"></v-flex>
                                        <v-flex xs6 text-xs-left v-text="event.created_at"></v-flex>
                                    <!-- </v-layout> -->
                                </v-timeline-item>
                            </v-slide-x-transition>
                            <v-timeline-item class="mb-4" hide-dot>
                                <span>TODAY</span>
                            </v-timeline-item>
                            <v-timeline-item class="mb-3" color="grey" icon-color="grey lighten-2" small>
                                <v-layout justify-space-between>
                                    <v-flex xs7>This order was archived.</v-flex>
                                    <v-flex xs5 text-xs-right>15:26 EDT</v-flex>
                                </v-layout>
                            </v-timeline-item>
                            <v-timeline-item class="mb-3" small>
                                <v-layout justify-space-between>
                                    <v-flex xs7>
                                        <v-chip class="white--text ml-0" color="purple" label small>
                                            APP
                                        </v-chip>
                                        Digital Downloads fulfilled 1 item.
                                    </v-flex>
                                    <v-flex xs5 text-xs-right>15:25 EDT</v-flex>
                                </v-layout>
                            </v-timeline-item>
                            <v-timeline-item class="mb-3" color="grey" small>
                                <v-layout justify-space-between>
                                    <v-flex xs7>
                                        Order confirmation email was sent to John Leider (john@vuetifyjs.com).
                                    </v-flex>
                                    <v-flex xs5 text-xs-right>15:25 EDT</v-flex>
                                </v-layout>
                            </v-timeline-item>
                            <v-timeline-item class="mb-3" hide-dot>
                                <v-btn class="mx-0" color="white">
                                    Resend Email
                                </v-btn>
                            </v-timeline-item>
                            <v-timeline-item class="mb-3" color="grey" small>
                                <v-layout justify-space-between>
                                    <v-flex xs7>
                                        A $15.00 USD payment was processed on PayPal Express Checkout
                                    </v-flex>
                                    <v-flex xs5 text-xs-right>15:25 EDT</v-flex>
                                </v-layout>
                            </v-timeline-item>
                            <v-timeline-item color="grey" small>
                                <v-layout justify-space-between>
                                    <v-flex xs7>
                                        John Leider placed this order on Online Store (checkout #1937432132572).
                                    </v-flex>
                                    <v-flex xs5 text-xs-right>15:25 EDT</v-flex>
                                </v-layout>
                            </v-timeline-item>
                        </v-timeline>
                    </v-flex>
                </v-card>
            </v-container>
        </v-content>
        <m-footer-component></m-footer-component>
    </v-app>
</template>
<script>
export default {
    data: () => ({
        events: [],
        content: null,
        req_data : {},
        nonce: 0
    }),

    computed: {
        timeline() {
            return this.events.slice().reverse()
        }
    },

    methods: {
        submit_announcement() 
        {
            this.req_data.picture = "None";
            this.req_data.group_id = 1;
            this.req_data.user_id = 1;
            axios.post('/api/announcements', this.req_data).then(res => 
            {
                this.events.push(res.data);
            })
            .catch(err => {
                this.error_message = err.response.data.message;
                this.loading = false;
            });
        
        },
        get_announcement() 
        {
            this.req_data.picture = "None";
            this.req_data.group_id = 1;
            this.req_data.user_id = 1;
            axios.get('/api/announcements', this.req_data).then(res => 
            {
                this.events = res.data;
                console.log(this.events);
            })
            .catch(err => {
                this.error_message = err.response.data.message;
                this.loading = false;
            });
        
        },
        submit_announcements() {
            const time = (new Date()).toTimeString()
            this.events.push({
                id: this.nonce++,
                text: this.content,
                time: time.replace(/:\d{2}\sGMT-\d{4}\s\((.*)\)/, (match, contents, offset) => {
                    return ` ${contents.split(' ').map(v => v.charAt(0)).join('')}`
                })
            })

            this.content = null
        }
    },
    mounted: function()
    {
        this.get_announcement();
    }
}
</script>