<template>
    <v-app id="app">
        <main>
            <v-container fluid fill-height>
                <v-layout flex align-center justify-center>
                    <div class="text-xs-center initialize-loader">
                        <v-progress-circular :size="70" :width="7" color="blue" indeterminate></v-progress-circular>
                        <p class="text-xs-center">Initializing</p>
                        <v-progress-linear :indeterminate="true"></v-progress-linear>
                    </div>
                </v-layout>
            </v-container>
        </main>
    </v-app>
</template>
<script>
export default {

    methods: {
        get_user_info() 
        {
            axios.get('/api/user_info')
            .then(res => 
            {
                this.$store.commit('store_user', res.data);
                this.check_user_state();
            })
            .catch(err => {
                this.check_state();
            });
        },
        check_user_state()
        {
            if(!this.$store.state.user.id)
            {
                this.get_user_info();
            }
            else
            {
                if(this.$store.state.user.access == "member")
                {
                    this.$router.push('/member/announcement');
                }
                if(this.$store.state.user.access == "admin")
                {
                    this.$router.push('/admin/dashboard');
                }
            }
        },
        check_state()
        {
            if(!this.$store.state.access_token) 
            {
                
                this.$store.commit('logout', this.logout_user);
                this.$router.push('/login');
            } 
            else 
            {
                this.get_user_info();
            }
        }

    },
    mounted: function() {
        setTimeout(this.check_state(), 8000)
    },

}
</script>
<style>
.initialize-loader
{
    margin-top:250px;
}
</style>