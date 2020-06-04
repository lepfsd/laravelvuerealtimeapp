<template>
    <v-card tile>
        <v-toolbar color="light-blue lighten-1" dark dense class="mt-2">
            <v-toolbar-title>categories</v-toolbar-title> 
        </v-toolbar>
        <v-list v-for="category in categories" :key="category.id">
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>{{category.name}}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
        </v-list>
    </v-card>
</template>

<script>
export default {
    data() {
        return {
            categories: {}
        }
    },
    created() {
        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(error => console.log(error.response.data))
    }
}
</script>