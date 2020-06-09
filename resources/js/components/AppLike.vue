<template>
    <div>
        <v-btn text small color="error" @click="likedIt" > {{count}} fav </v-btn>
    </div>
</template>

<script>
export default {
    props: ['content'],
    data() {
        return {
            liked: this.content.liked,
            count: this.content.like_count
        }
    },
    methods: {
        likedIt() {
            if(User.loggedIn()) {
                this.liked ? this.incr() : this.decr()
                this.liked = !this.liked
            }
        },
        incr() {
            axios.post(`/api/like/${this.content.id}`)
                .then(res => this.count++)
            
        }, 
        decr() {
            axios.delete(`/api/like/${this.content.id}`)
                .then(res => this.count--)
        }
    }
}
</script>