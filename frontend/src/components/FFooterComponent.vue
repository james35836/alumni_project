<template>
    <v-footer dark height="auto">
        <v-card flat tile class="deep-purple darken-4 white--text text-xs-center">
            <v-card-text>
                <v-btn v-for="icon in icons" :key="icon" class="mx-3 white--text" icon>
                    <v-icon size="24px">{{ icon }}</v-icon>
                </v-btn>
            </v-card-text>
            <v-card-text class="white--text pt-0">
                Paloc Elementary School Alumni Association was built to keep our connection strong to all graduates. To find friends old and new. Join special events, take classes and  enjoy travel programs. Let us invite our friends to join our upcoming events.
            </v-card-text>
            <v-divider></v-divider>
            <v-card-text class="white--text">
                &copy;2018 — <strong>PES Alumni Association</strong>
            </v-card-text>
        </v-card>
    </v-footer>
</template>
<script>
export default {

    data: () => ({

        icons: [

            'fab fa-facebook',

            'fab fa-twitter',

            'fab fa-linkedin',

            'fab fa-instagram'

        ]

    })

}
</script>