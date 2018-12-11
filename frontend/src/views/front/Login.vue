<template>
    <v-app>
        <f-header-component></f-header-component>
        <v-container>
            <v-layout justify-center>
                <v-flex xs12 sm8 md6>
                    <v-card>
                        <v-card-title class="justify-center">
                            <div class="headline">SIGN IN</div>
                            <v-flex xs12 v-if="error_message">
                                <v-alert :value="true" color="error" icon="warning" outline>
                                    {{error_message}}
                                </v-alert>
                            </v-flex>
                        </v-card-title>
                        <v-card-text>
                            <v-form ref="form" v-model="valid" lazy-validation>
                                <v-container>
                                    <v-layout row wrap>
                                        <v-flex xs12>
                                            <v-text-field v-model="req_data.username" :rules="[v => !!v || 'Email is required']" label="Email" color="accent"></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs12>
                                            <v-text-field :type="'password'" :rules="[v => !!v || 'Password is required']" hint="At least 8 characters" min="8" v-model="req_data.password" label="Password" color="accent"></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-form>
                        </v-card-text>
                        <v-card-text>
                            <div>Don't have an account? <router-link to="register">click here</router-link></div>
                        </v-card-text>
                        <v-divider class="mt-5"></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-slide-x-reverse-transition>
                            </v-slide-x-reverse-transition>
                            <v-btn :loading="loading" :disabled="loading" color="deep-purple darken-4 white--text" @click="loginAuthentication">Submit</v-btn>
                        </v-card-actions>
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
        valid           :  true,
        loading         :  false,
        error_message   :  "",
        req_data        :  {},

    }),
    methods: {
        loginAuthentication() {
            this.loading                = true;
            this.req_data.grant_type    = this.$store.state.grant_type;
            this.req_data.client_id     = this.$store.state.client_id;
            this.req_data.client_secret = this.$store.state.client_secret;
            this.req_data.scope         = "*";
            axios.post('/oauth/token', this.req_data).then(res => 
            {
                this.$store.commit('login', res.data);
                this.$router.push('/initialize');
            })
            .catch(err => {
                this.error_message = err.response.data.message;
                this.loading = false;
            });
        },
    }
}
</script>