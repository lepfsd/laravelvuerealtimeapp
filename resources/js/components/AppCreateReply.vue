<template>
    <div>
        <v-row>
            <v-col md="12">
                <vue-simplemde v-model="body" ref="markdownEditor" />
            </v-col>
        </v-row>
        <v-row>
            <div class="my-2 mr-4">
                <v-btn text small color="primary" @click="submit">reply</v-btn>
            </div>
        </v-row>
    </div>
</template>

<script>

import VueSimplemde from 'vue-simplemde'
export default {
    components: {
      VueSimplemde
    },
    props: ['questionSlug'],
    data() {
        return {
            body: null
        }
    },
    methods: {
       submit() {
           axios.post(`/api/question/${this.questionSlug}/reply`, {body:this.body})
            .then( res => {
                this.body = ''
                EventBus.$emit('newReply', res.data.reply)
                window.scrollTo(0,0)
            })
       } 
    }
}
</script>