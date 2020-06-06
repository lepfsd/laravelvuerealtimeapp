<template>
    <div>
        <app-reply 
            v-for="(reply, index) in content" 
            :data="reply" 
            :key="reply.id" 
            :index = index
            v-if="content">
        </app-reply>
    </div>
</template>

<script>
import AppReply from './AppReply'
export default {
    components: {
        AppReply
    },
    props: ['question'],
    data() {
        return {
            content: this.question.replies
        }
    },
    created() {
        this.listen()
    },
    methods: {
        listen() {
            EventBus.$on('newReply', (reply) => {
                this.content.unshift(reply)
            })
            EventBus.$on('deleteReply', (index) => {
                axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                    .then(res => {
                        this.content.splice(index, 1)
                    })
            })
        }
    }
}
</script>