<template>
    <div>
        <v-container fluid grid-list-md>
            <v-layout row-grap>
                <v-flex xs7>
                    <v-form @submit.prevent="create">
                        <v-container>
                            <v-row>
                                <v-col
                                md="6"
                                >
                                <v-text-field
                                    v-model="form.name"
                                    label="Category"
                                    required
                                    type="text"
                                ></v-text-field>
                                </v-col>

                            </v-row>

                            <v-row>

                                <div class="my-2 mr-4">
                                <v-btn large color="teal" type="submit">create</v-btn>
                                </div>

                            </v-row>
                        </v-container>
                    </v-form>
                </v-flex>
                <v-flex xs5>
                    <v-card tile>
                        <v-toolbar color="light-blue lighten-1" dark dense class="mt-2">
                            <v-toolbar-title>categories</v-toolbar-title> 
                        </v-toolbar>
                        <v-list v-for="category in categories" :key="category.id">
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title>{{category.name}}</v-list-item-title>
                                </v-list-item-content>
                                <v-list-item-action>
                                    <v-btn text small color="primary">edit</v-btn>
                                </v-list-item-action>
                                <v-list-item-action>
                                    <v-btn text small color="error">delete</v-btn>
                                </v-list-item-action>
                                
                            </v-list-item>
                            <v-divider></v-divider>
                        </v-list>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        
    </div>
  
</template>

<script>

export default {
    data() {
        return {
            form: {
                name: null
            },
            categories: {}
        }
    },
    created() {
        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(error => console.log(error.response.data))

    },
    methods: {
        create() {
            axios.post('/api/category', this.form)
                .then( res => this.$router.push({name: 'forum'}))
                .catch(error => this.errors = error.response.data.error)
        }
    }
}
</script>

