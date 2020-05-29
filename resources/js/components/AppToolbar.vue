<template>
  <v-card
    color="grey lighten-4"
    flat
    height="200px"
    tile
  >
    <v-toolbar>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
      <v-toolbar-title>forum.io</v-toolbar-title>
      <v-spacer></v-spacer>     
        <div class="hidden-sm-and-down">
          <router-link to="/forum">
            <v-btn flat>Forum</v-btn>
          </router-link>
          <router-link to="/question">
            <v-btn flat>Ask Question</v-btn>
          </router-link>
          <router-link to="/category">
            <v-btn flat>Category</v-btn>
          </router-link>
          <router-link to="/login">
            <v-btn flat>Login</v-btn>
          </router-link>
        </div>
    </v-toolbar>
  </v-card>
</template>

<script>
export default {

}
</script>

<style>

</style>