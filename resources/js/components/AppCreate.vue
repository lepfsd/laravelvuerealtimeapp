<template>
    <v-form @submit.prevent="create">
        <v-container>

            <v-row>
                <v-col md="6">
                    <v-text-field
                        v-model="form.title"
                        label="Title"
                        required
                        type="text"
                    ></v-text-field>
                </v-col> 
                <v-col md="6">
                    <v-select 
                        :items="categories"  
                        item-text="name"
                        item-value="id"
                        item-key="categories"
                        v-model="form.category_id" 
                        label="Category" 
                    ></v-select>
                    
                </v-col> 
            </v-row>
            <v-row>
                <v-col md="12">
                    <vue-simplemde v-model="form.body" ref="markdownEditor" />
                </v-col>
            </v-row>
            <v-row>
                <div class="my-2 mr-4">
                    <v-btn text small color="primary" type="submit">Submit</v-btn>
                </div>

            </v-row>

        </v-container>
    </v-form>
</template>

<script>

import VueSimplemde from 'vue-simplemde'

export default {
    data() {
        return {
            form:{
                title:null,
                category_id: null,
                body: null
            },
            categories:{},
            errors: {}
        }
    },
    components: {
      VueSimplemde
    },
    created() {
        axios.get('/api/category')
            .then( res => this.categories = res.data.data )
            .catch(error => console.log(error.response.data))
    },
    methods: {
        create() {
            axios.post('/api/question', this.form)
                .then( res => this.$router.push(res.data.path))
                .catch(error => this.errors = error.response.data.error)
        }
    }
}
</script>

<style>
  @import '~simplemde/dist/simplemde.min.css';
</style>