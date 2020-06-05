<template>
  <v-form @submit.prevent="signup">

    <v-container>

        <v-row>
            <v-col md="6">
                <v-text-field
                    v-model="form.name"
                    label="Name"
                    required
                    type="text"
                ></v-text-field>
                <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
            </v-col> 
            <v-col md="6">
                <v-text-field
                    v-model="form.email"
                    label="E-mail"
                    required
                    type="email"
                ></v-text-field>
                <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>
            </v-col>
        </v-row>
        <v-row>
            <v-col md="6">
                <v-text-field
                    v-model="form.password"
                    label="Password"
                    required
                    type="password"
            ></v-text-field>
            <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
            </v-col>
            <v-col md="6">
                <v-text-field
                    v-model="form.password_confirm"
                    label="Password Confirm"
                    required
                    type="password"
                ></v-text-field>
            </v-col>
        </v-row>
        <v-row>
            <div class="my-2 mr-4">
                <v-btn text small color="primary" type="submit">Submit</v-btn>
            </div>

            <div class="my-2 mr-4">
                <router-link to="/login">
                    <v-btn text small color="primary">Login</v-btn>
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
                name: null, 
                email: null,
                password: null,
                password_confirm: null
            },
            errors: {}
        }
    },
    created() {
      if(User.loggedIn()){
        this.$router.push({name: 'forum'})
      }
    },
    methods: {
        signup(){
            axios.post('/api/auth/signup', this.form)
                .then(res => {
                    User.responseAfterLogin(res)
                    this.$router.push({name: 'forum'})
                })
                .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style>
