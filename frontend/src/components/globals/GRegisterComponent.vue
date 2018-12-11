<template>
    <div>
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
                        <v-text-field v-model="req_data.contact" :rules="[v => !!v || 'Phone is required']" label="Phone Number" color="accent"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                        <v-menu :close-on-content-click="false" v-model="menu2" :nudge-right="40" lazy transition="scale-transition" offset-y full-width max-width="290px" min-width="290px">
					        <v-text-field slot="activator" v-model="computedDateFormatted" label="label" persistent-hint prepend-icon="event" readonly></v-text-field>
					        <v-date-picker v-model="date" no-title @input="menu2 = false"></v-date-picker>
					    </v-menu>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                        <v-select v-model="req_data.gender" :items="gender" :rules="[v => !!v || 'Gender is required']" label="Gender"></v-select>
                    </v-flex>
                </v-layout>
                <v-layout row wrap>
                    <v-flex xs12 sm6 md4>
                        <v-text-field v-model="req_data.email" label="Email" :rules="[v => !!v || 'E-mail is required', v => /.+@.+/.test(v) || 'E-mail must be valid']" color="accent"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                        <v-text-field v-model="req_data.password" label="Password" :rules="[v => !!v || 'Password is required']" color="accent"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                        <v-text-field v-model="req_data.password_confirmation" :rules="[v => !!v || 'Password Confirmation is required']" label="Password" color="accent"></v-text-field>
                    </v-flex>
                </v-layout>
                <v-layout row wrap>
                    <v-flex xs12 sm6 md4>
                        <v-select v-model="req_data.group_id" :items="group_data" :rules="[v => !!v || 'Batch  is required']" item-text="name" item-value="id" label="Batch" single-line>
                        </v-select>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-form>
        <v-btn :loading="loading" :disabled="loading" color="info"  @click="register_submit">Submit</v-btn>
    </div>
</template>
<script>
import { bus } from "../../main";
export default {
    data: vm =>  ({
        valid: true,
        gender: ['Male', 'Female'],
        req_data: {},
        drawer: null,
        error_message: [],
        birthdate: "04/11/1994",
        loading: false,
        group_data: [],
        date: new Date().toISOString().substr(0, 10),
        dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
        menu1: false,
        menu2: false,
        
    }),
    computed: {
        computedDateFormatted() {
            return this.formatDate(this.date)

        }
    },
    watch: {
        req_data: function(newValue) {
        	bus.$emit('data', this.req_data);
        }
    },
    methods: {
        get_group() {
            axios.get('/api/get_group').then(res => {
                    this.group_data = res.data;
                })
                .catch(err => {
                    console.log(err);
                });

        },
        formatDate(date) {
            if (!date) return null

            const [year, month, day] = date.split('-')
            return `${month}/${day}/${year}`
        },
        parseDate(date) {
            if (!date) return null

            const [month, day, year] = date.split('/')
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
        },
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
    },
    mounted: function() {
        this.get_group();
    },






    
}
</script>