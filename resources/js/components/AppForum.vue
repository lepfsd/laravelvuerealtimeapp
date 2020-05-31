<template>
    <div>
        <v-container fluid grid-list-md>
            <v-layout row-grap>
                <v-flex xs8>
                    <app-question v-for="question in questions" :key="question.path" :data=question>

                    </app-question>
                </v-flex>
                sidebar
            </v-layout>
        </v-container>
    </div>
</template>

<script>

import AppQuestion from './AppQuestion'

export default {
    components: { 
        AppQuestion
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