<template>
  <v-form @submit.prevent="login">
    <v-container>
      <v-row>
        <v-col
          md="4"
        >
          <v-text-field
            v-model="form.email"
            label="E-mail"
            required
            type="email"
          ></v-text-field>
        </v-col>

        <v-col
          md="4"
        >
          <v-text-field
            v-model="form.password"
            label="Password"
            required
            type="password"
          ></v-text-field>
        </v-col>

      </v-row>

      <v-row>

        <div class="my-2 mr-4">
          <v-btn text small color="primary" type="submit">Login</v-btn>
        </div>

        <div class="my-2 mr-4">
          <router-link to="/signup">
            <v-btn text small color="primary">Signup</v-btn>
          </router-link>
        </div>
        
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: null,
                password: null
            }
        }
    },
    created() {
      if(User.loggedIn()){
        this.$router.push({name: 'forum'})
      }
    },
    methods: {
        login(){
            User.login(this.form)
        }
    }
}
</script>

<style>

</style>