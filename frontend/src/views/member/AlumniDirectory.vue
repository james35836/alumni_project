<template>
    <v-app id="dashboard">
        <m-header-component></m-header-component>
        <v-content>
            <v-card>
                <v-container fluid grid-list-md>
                    <v-layout row wrap>
                        <v-flex xs12 sm6 md4 v-for="users in user_list">
                            <v-card>
                                <v-img :src="users.profile" height="300px">
                                    <v-layout column fill-height>
                                        <v-card-title>
                                            <v-btn dark icon>
                                                <v-icon>chevron_left</v-icon>
                                            </v-btn>
                                            <v-spacer></v-spacer>
                                            <v-btn dark icon class="mr-3">
                                                <v-icon>edit</v-icon>
                                            </v-btn>
                                            <v-btn dark icon>
                                                <v-icon>more_vert</v-icon>
                                            </v-btn>
                                        </v-card-title>
                                        <v-spacer></v-spacer>
                                        <v-card-title class="gray--text pl-5 pt-5">
                                            <div class="display-6 pl-5 pt-5">{{users.name}}</div>
                                        </v-card-title>
                                    </v-layout>
                                </v-img>
                                <v-list two-line>
                                    <v-list-tile @click="">
                                        <v-list-tile-action>
                                            <v-icon color="indigo">phone</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>(650) 555-1234</v-list-tile-title>
                                            <v-list-tile-sub-title>Mobile</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                        <v-list-tile-action>
                                            <v-icon>chat</v-icon>
                                        </v-list-tile-action>
                                    </v-list-tile>
                                    
                                    <v-divider inset></v-divider>
                                    <v-list-tile @click="">
                                        <v-list-tile-action>
                                            <v-icon color="indigo">mail</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>aliconnors@example.com</v-list-tile-title>
                                            <v-list-tile-sub-title>Personal</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    
                                    <v-divider inset></v-divider>
                                    <v-list-tile @click="">
                                        <v-list-tile-action>
                                            <v-icon color="indigo">location_on</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>1400 Main Street</v-list-tile-title>
                                            <v-list-tile-sub-title>Orlando, FL 79938</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
                <div class="text-xs-center">
                    <v-pagination
                      v-model="page"
                      :length="4"
                      prev-icon="mdi-menu-left"
                      next-icon="mdi-menu-right"
                    ></v-pagination>
                  </div>
            </v-card>
        </v-content>
        <m-footer-component></m-footer-component>
    </v-app>
</template>
<script>
export default {
    data: () => ({
        user_list: null,
        page: 1,

    }),
    methods: {
        get_users() {
            axios.get('/api/users').then(res => {

                    this.user_list = res.data;
                    console.log(this.user_list);
                })
                .catch(err => {
                    this.$router.push('/initialize');
                });
        }

    },
    mounted: function() {
        this.get_users();
    },
}
</script>