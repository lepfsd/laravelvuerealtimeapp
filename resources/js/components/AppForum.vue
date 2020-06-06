<template>
    <div>
        <v-container fluid grid-list-md>
            
            <v-layout row-grap>
                <v-flex xs8>
                    <v-toolbar color="light-blue lighten-1" dark dense class="mt-2">
                        <v-toolbar-title>questions</v-toolbar-title> 
                    </v-toolbar>
                    <app-question v-for="question in questions" :key="question.path" :data=question>

                    </app-question>
                </v-flex>
                <v-flex xs4>
                    <app-sidebar></app-sidebar>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>

import AppQuestion from './AppQuestion'
import AppSidebar from './AppSidebar'

export default {
    components: { 
        AppQuestion,
        AppSidebar
    },
    data() {
        return {
            questions: {}
        }
    },
    created() {
        axios.get('/api/question')
            .then( res => this.questions = res.data.data)
            .catch(error => console.log(error.response.data))
    }
}
</script>

<style>

</style>