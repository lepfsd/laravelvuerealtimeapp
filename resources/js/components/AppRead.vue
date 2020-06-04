<template>
    <div v-if="question">
        <app-editquestion v-if="editing" :data = question ></app-editquestion>
        <app-showquestion :data=question v-else ></app-showquestion>       
    </div>
</template>

<script>

import AppShowquestion from './AppShowquestion'
import AppEditquestion from './AppEditquestion'

export default {
    components: {
        AppShowquestion, 
        AppEditquestion
    },
    data() {
        return {
            question: null,
            editing: false
        }
    },
    created() {
        this.listen()
        this.getQuestion()
    },
    methods: {
        listen() {
            EventBus.$on('startEditing', () => {
                this.editing = true
            })
            EventBus.$on('cancelEditing', () => {
                this.editing = false
            })
        },
        getQuestion() {
            axios.get(`/api/question/${this.$route.params.slug}`)
                .then( res => this.question = res.data.data)
                .catch(error => console.log(error.response.data))
        }
    }
}
</script>