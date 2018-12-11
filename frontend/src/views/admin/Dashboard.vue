<template>


    <v-app id="dashboard">
    <a-header-component></a-header-component>
    <v-content>
        <v-container fluid fill-height>
            <v-layout justify-center align-center>
                <g-table-component></g-table-component>
            </v-layout>
        </v-container>
    </v-content>
    <a-footer-component></a-footer-component>
    </v-app>
</template>
<script>

  export default {
    data: () => ({
      
    }),
    
  }
</script>