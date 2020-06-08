<template>
    <v-container>
        <v-row>
            <v-col md="12">
                <vue-simplemde v-model="reply.reply" ref="markdownEditor" />
            </v-col>
        </v-row>
        <v-row>
            <v-card-actions>
                <v-btn text small color="primary" @click="update" >save</v-btn>
                <v-btn text small color="primary" @click="cancel" >cancel</v-btn>
            </v-card-actions>
        </v-row>
    </v-container>
</template>

<script>
import VueSimplemde from 'vue-simplemde'
export default {
    components: {
      VueSimplemde
    },
    props: ['reply'],
    methods: {
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`, {body: this.reply.reply})
                .then(res => this.cancel())
        }
    }
}
</script>





