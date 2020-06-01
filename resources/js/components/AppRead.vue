<template>
    <app-showquestion :data=question v-if="question" ></app-showquestion>
</template>

<script>

import AppShowquestion from './AppShowquestion'

export default {
    components: {
        AppShowquestion
    },
    data() {
        return {
            question: {}
        }
    },
    created() {
        axios.get(`/api/question/${this.$route.params.slug}`)
            .then( res => this.question = res.data.data)
            .catch(error => console.log(error.response.data))

    } 
}
</script>