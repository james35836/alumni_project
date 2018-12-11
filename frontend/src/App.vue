<template>
    <router-view></router-view>
</template>

<script>
    export default {
        data: () => ({
            drawer          : null,
            username        : "",
            password        : "",
            error_message   : "",
            loading: false,
        }),
        props: {
            source: String
        },
        methods:
        {
            loginAuthentication()
            {
                let req_data = {};
                req_data.username       = this.username;
                req_data.password       = this.password;
                // req_data.username       = "elven@gmail.com";
                // req_data.password       = "water123";
                req_data.grant_type     = "password";
                req_data.client_id      = this.$store.state.client_id;
                req_data.client_secret  = this.$store.state.client_secret;
                req_data.scope          = "*";
                this.loading            = true;
                axios.post('/oauth/token', req_data).then(res =>
                {
                    this.$store.commit('login', res.data);
                    this.loading        = false;
                    this.$router.push('/member/dashboard');
                })
                .catch(err =>
                {
                    this.error_message  = err.response.data.message;
                    this.loading        = false;
                });
            },
        }
    }
</script>
