<template>
    <div>
        <!-- <v-navigation-drawer :clipped="$vuetify.breakpoint.lgAndUp" v-model="drawer" fixed app>
            <v-toolbar flat class="transparent" v-if="user_info">
                <v-list class="pa-0">
                    <v-list-tile avatar>
                        <v-list-tile-avatar>
                            <img :src="user_info.profile">
                    </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>{{user_info.name}}</v-list-tile-title>
                            </v-list-tile-content>
                            <v-list-tile-action>
                                <v-btn icon @click.stop="drawer = false">
                                    <v-icon>chevron_left</v-icon>
                                </v-btn>
                            </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-toolbar>
            <v-list class="pt-0" dense>
                <v-divider></v-divider>
                <v-list-tile class="pa-0" to="/member/dashboard">
                    <v-list-tile-action>
                        <v-icon>dashboard</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Dashboard</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/announcement">
                    <v-list-tile-action>
                        <v-icon>email</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Announcement</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/alumni-directory">
                    <v-list-tile-action>
                        <v-icon>email</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Alumni Directory</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/faculty-directory">
                    <v-list-tile-action>
                        <v-icon>email</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Faculty Directory</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/messages">
                    <v-list-tile-action>
                        <v-icon>chat</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Chat Room</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/messages">
                    <v-list-tile-action>
                        <v-icon>email</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Announcement</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer> -->
        <v-navigation-drawer :mini-variant.sync="mini" :clipped="$vuetify.breakpoint.lgAndUp" v-model="drawer" fixed app hide-overlay stateless class="nav-bars">
            <v-toolbar flat class="transparent">
                <v-list class="pa-0">
                    <v-list-tile avatar v-if="user_info">
                        <v-list-tile-avatar>
                            <img v-if="user_info.gender == 'female'" src="../assets/profile/female.png">
                            <img v-if="user_info.gender != 'female'" src="../assets/profile/male.png">
                            <!-- <img :src="user_info.profile"> -->
                        </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>{{user_info.name}}</v-list-tile-title>
                            </v-list-tile-content>
                            <v-list-tile-action>
                                <v-btn icon @click.stop="mini = !mini">
                                    <v-icon>chevron_left</v-icon>
                                </v-btn>
                            </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-toolbar>
           
            <v-list class="pt-0" dense>
                <v-divider></v-divider>
                
                <v-list-tile to="/member/announcement" class="mt-2 mb-2">
                    <v-list-tile-action>
                        <v-icon  large>language</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Announcement</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/alumni-directory"  class="mt-2 mb-2">
                    <v-list-tile-action>
                        <v-icon large>view_list</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Alumni Directory</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/faculty-directory"  class="mt-2 mb-2">
                    <v-list-tile-action>
                        <v-icon large>storage</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Faculty Directory</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/messages"  class="mt-2 mb-2">
                    <v-list-tile-action>
                        <v-icon large>chat</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Chat Room</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile to="/member/messages"  class="mt-2 mb-2">
                    <v-list-tile-action>
                        <v-icon large>email</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Announcement</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar :clipped-left="$vuetify.breakpoint.lgAndUp" color="deep-purple darken-4" dark app fixed>
            <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <span class="hidden-sm-and-down">Website</span>
            </v-toolbar-title>
            <v-text-field flat solo-inverted hide-details prepend-inner-icon="search" label="Search" class="hidden-sm-and-down">
            </v-text-field>
            <v-spacer></v-spacer>
            <v-btn icon to="/member/log">
                <v-icon>apps</v-icon>
            </v-btn>
            <v-menu bottom origin="center center" transition="scale-transition">
                <v-btn icon slot="activator">
                    <v-icon @click="">notifications</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile v-for="(item, i) in items" :key="i" @click="">
                        <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
            <v-btn icon>
                <v-icon @click="">email</v-icon>
            </v-btn>
            <v-btn icon>
                <v-icon @click="logout">present_to_all</v-icon>
            </v-btn>
            <!-- <v-btn icon large v-if="user_info">
                <v-avatar size="32px" tile>
                    <v-icon dark>account_circle</v-icon>
                </v-avatar>
            </v-btn> -->
            <g-menu-component></g-menu-component>
        </v-toolbar>
    </div>
</template>
<script>
export default {
    data: () => ({
        user_info: null,
        dialog: false,
        drawer: true,

        items: [
            { title: 'Anouncement', link: '/member/anouncement', icon: 'email' },
            { title: 'Alumni List', link: '/member/alumni', icon: 'dashboard' },
            { title: 'Faculty List', link: '/member/faculty', icon: 'dashboard' },
            { title: 'Chat Room', link: '/member/room', icon: 'dashboard' },
        ],
        mini: true,
    }),
    methods: {
        logout() {
            this.$store.commit('logout');
            this.$router.push('/login');
        },
    },
    mounted: function() 
    {
        if (this.$store.state.access_token) 
        {
            if(!this.$store.state.user.id) 
            {
                this.$router.push('/initialize');
            } 
            else 
            {
                if(this.$store.state.user.access == "member")
                {
                    this.user_info = this.$store.state.user;
                }
                if(this.$store.state.user.access == "admin")
                {
                    this.$router.push('/initialize');
                }
                
            }
        } 
        else 
        {
            this.$router.push('/initialize');
        }
    },
}
</script>
<style>

</style>