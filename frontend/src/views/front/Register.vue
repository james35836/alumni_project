<template>
    <v-app>
        <f-header-component></f-header-component>
        <v-container fluid>
            <v-layout justify-center >
                <v-flex xs12 sm10 md10>
                    <v-card>
                        <v-card-title class="justify-center">
                            <div>
                                <div class="headline">SIGN UP</div>
                            </div>
                        </v-card-title>
                        <v-card-text>
                            <v-form ref="form" v-model="valid" lazy-validation>
                                <v-container>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field v-model="req_data.first_name" :rules="[v => !!v || 'First Name is required']" label="First Name" color="accent"></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field v-model="req_data.middle_name" :rules="[v => !!v || 'Middle Name is required']" label="Middle Name" color="accent"></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field v-model="req_data.last_name" :rules="[v => !!v || 'Last Name is required']" label="Last Name" color="accent"></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field v-model="req_data.contact" :rules="[v => !!v || 'Phone Number is required']" label="Phone Number" color="accent"></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <g-datepicker-component></g-datepicker-component>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <v-select v-model="req_data.gender" :items="gender" :rules="[v => !!v || 'Gender is required']" label="Gender"></v-select>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field v-model="req_data.email" label="Email" :rules="[v => !!v || 'Email is required']" color="accent"></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field v-model="req_data.password" label="Password" :type="'password'" :rules="[v => !!v || 'Password is required']" hint="At least 8 characters" color="accent"></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field v-model="req_data.password_confirmation" :type="'password'" :rules="[v => !!v || 'Confirm Password is required']" hint="At least 8 characters" label="Confirm Password" color="accent"></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm6 md4>
                                            <v-select v-model="req_data.group_id" :items="group_data" :rules="[v => !!v || 'Batch Year is required']"  item-text="name" item-value="id" label="Batch" single-line>
                                            </v-select>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-form>
                        </v-card-text>
                        <v-divider class="mt-5"></v-divider>
                        <v-card-actions>
                            <div>Already have an account? <router-link to="register">click here</router-link></div>
                            <v-spacer></v-spacer>
                            <v-slide-x-reverse-transition>
                                <!--  <v-tooltip v-if="formHasErrors" left>
                                    <v-btn slot="activator" icon class="my-0" @click="resetForm">
                                        <v-icon>refresh</v-icon>
                                    </v-btn>
                                    <span>Refresh form</span>
                                </v-tooltip> -->
                            </v-slide-x-reverse-transition>
                            <v-btn :loading="loading" :disabled="loading" color="info"  @click="register_submit">Submit</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        <f-footer-component></f-footer-component>
    </v-app>
</template>
<script>
import { bus } from "../../main";
export default {
    data: () => ({
        valid: true,
        gender: ['Male', 'Female'],
        req_data: {},
        drawer: null,
        error_message: [],
        birthdate: "04/11/1994",
        loading: false,
        group_data: [],
        
    }),
    watch: {
        req_data: function(newValue) {
            console.log(newValue);
        }
    },
    methods: {
        register_submit() {

            if (this.$refs.form.validate()) {
                this.req_data.birthdate = this.birthdate;
                this.req_data.access = "member";
                this.loading = true;

                axios.post('/api/register/submit', this.req_data).then(response => {
                        if (response.data.status == "success") {
                            this.loginAuthentication(response.data['status_data'].email, response.data['status_data'].descrypted_password);
                        }
                        if (response.data.status == "error") {

                        }

                    })
                    .catch(err => {
                        this.error_message = err.response.data.message;
                        this.loading = false;
                    });
            }
        },
        loginAuthentication(auto_email, auto_password) {
            let auto_login = {};
            auto_login.username = this.req_data.email;
            auto_login.password = this.req_data.password;
            auto_login.grant_type = this.$store.state.grant_type;
            auto_login.client_id = this.$store.state.client_id;
            auto_login.client_secret = this.$store.state.client_secret;
            auto_login.scope = "*";
            this.loading = true;
            axios.post('/oauth/token', auto_login).then(res => {
                    this.$store.commit('login', res.data);
                    this.loading = false;
                    this.$router.push('/initialize');
                })
                .catch(err => {
                    this.error_message = err.response.data.message;
                    this.loading = false;
                });
        },
        get_group() {
            axios.get('/api/get_group').then(res => {
                    this.group_data = res.data;
                })
                .catch(err => {
                    console.log(err);
                });

        },
        resetForm() {

        },
    },
    mounted: function() {
        this.get_group();
    },
    created() {
        bus.$on('date', (data) => {
            this.birthdate = data;
        });
    }
}
</script>