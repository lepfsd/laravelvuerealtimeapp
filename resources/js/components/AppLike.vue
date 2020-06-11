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
    created() {
        Echo.channel('likeChannel')
            .listen('LikeEvent', (e) => {
                if(this.content.id == e.id) {
                    e.type == 1 ? this.count++ : this.count--
                }
            })
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