<template>
    <div>
        <v-container fluid grid-list-md>
            <v-layout row-grap>
                <v-flex xs8>
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