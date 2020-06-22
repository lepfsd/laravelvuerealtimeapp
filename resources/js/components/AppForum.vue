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

                    <div class="text-center">
                        <v-pagination
                            v-model="meta.current_page"
                            :length="meta.total"
                            @input="changePage"
                        ></v-pagination>
                    </div>
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
            questions: {},
            meta: {},
            page: 2
        }
    },
    created() {
        this.fetchQuestions()
    },
    methods: {    
        fetchQuestions(page) {
            let url = page ? `/api/question?page=${page}` : `/api/question`
            axios.get(url)
                .then( res => {
                    this.questions = res.data.data
                    this.meta = res.data.meta
                })
                .catch(error => console.log(error.response.data))
        },
        changePage(page) {
            this.fetchQuestions(page)
        }
        
    }
}
</script>

<style>

</style>