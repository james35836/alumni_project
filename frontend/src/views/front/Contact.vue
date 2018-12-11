<template>
    <v-app>
        <f-header-component></f-header-component>
        <v-container fluid>
            <v-layout justify-center>
                <v-flex xs12>
                    <v-card>
                        <v-card-title class="justify-center">
                            <div class="headline">CONTACT US</div>
                        </v-card-title>
                        <v-card-text>
                            <v-form ref="form" v-model="valid" lazy-validation>
                                <v-container>
                                    <v-layout row wrap>
                                        <v-flex xs12 md6>
                                            <v-flex xs12>
                                                <v-text-field :rules="[v => !!v || 'Full name is required']" v-model="req_data.full_name" label="Full Name" color="accent"></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-text-field :rules="[v => !!v || 'Email is required']" v-model="req_data.email" label="Email Address" color="accent"></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-text-field :rules="[v => !!v || 'Phone number is required']" v-model="req_data.contact" label="Phone Number" color="accent"></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-text-field :rules="[v => !!v || 'Subject is required']" v-model="req_data.subject" label="Subject" color="accent"></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-textarea name="input-7-1" :rules="[v => !!v || 'Message is required']" v-model="req_data.message"  label="Message" auto-grow></v-textarea>
                                            </v-flex>
                                            <v-card-actions>
                                                <!-- <v-btn flat>Clear</v-btn> -->
                                                <v-spacer></v-spacer>
                                                <v-btn :loading="loading" :disabled="loading" color="info" @click="sendMessage">Submit</v-btn>
                                            </v-card-actions>
                                        </v-flex>
                                        <v-flex xs12 md6>
                                            <v-flex xs12>
                                                <v-layout row wrap>
                                                    <v-card-text>
                                                        <span>Email   : jamesomosora@gmail.com</span><br>
                                                        <span>Phone   : 09876543210</span><br>
                                                        <span>Address : Paloc Elementary School, Paloc Maragusan Comval</span>
                                                    </v-card-text>
                                                </v-layout>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-layout row wrap>
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0151545495983!2d126.15235231426917!3d7.352193915015465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32fbf13ffffff1ef%3A0x7155881fb6736887!2sPaloc+Elementary+School!5e0!3m2!1sfil!2sph!4v1542199065210" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </v-layout>
                                            </v-flex>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-form>
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
        valid : true,
        drawer: null,
        error_message: "",
        success_message : "",
        req_data: {},
        loading: false,
    }),
    props: {
        source: String
    },
    methods: {
        sendMessage() {
            if(this.$refs.form.validate()) {
             
                this.loading = true;

                axios.post('/api/guest/send_message', this.req_data).then(response => {
                        this.success_message = response.data;
                        this.loading = false;

                    })
                    .catch(err => {
                        this.error_message = err.response.data.message;
                        this.loading = false;
                    });
            }
        },
        get() {
            axios.get('/api/users').then(({}) => {
                console.log(data);
            });
        }
    }
}
</script>
<style>
.application--wrap {
    max-width: none;
}
</style>