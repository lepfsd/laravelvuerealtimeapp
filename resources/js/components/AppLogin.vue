<template>
  <v-form @submit.prevent="login">
    <v-container>
      <v-row>
        <v-col
          cols="12"
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
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.password"
            label="Password"
            required
            type="password"
          ></v-text-field>
        </v-col>

        <div class="my-2">
        <v-btn large color="green" type="submit">Login</v-btn>
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
    methods: {
        login(){
            axios.post('/api/auth/login', this.form)
            .then(res => console.log(res))
            .catch(error => console.log(error))
        }
    }
}
</script>

<style>

</style>