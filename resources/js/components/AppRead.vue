<template>
    <div v-if="question">
        <app-editquestion v-if="editing" :data = question ></app-editquestion>
        <app-showquestion :data=question v-else ></app-showquestion>    

        <v-container>
            <app-replies :question="question" ></app-replies>
            <app-create-reply :questionSlug="question.slug"></app-create-reply>
        </v-container>
    </div>
</template>

<script>

import AppShowquestion from './AppShowquestion'
import AppEditquestion from './AppEditquestion'
import AppReplies from './AppReplies'
import AppCreateReply from './AppCreateReply'

export default {
    components: {
        AppShowquestion, 
        AppEditquestion,
        AppReplies,
        AppCreateReply
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