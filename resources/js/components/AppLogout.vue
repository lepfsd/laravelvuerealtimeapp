<template>
    
</template>
<script>
    import {EventBus} from '../app'
    export default {
        created(){
            axios.post('/api/auth/logout', null)
                .then(res => {
                    User.logout()
                    this.$router.push({name: 'forum'})
                })
                .catch(error => this.errors = error.response.data.errors)
                User.logout()
                this.$router.push({name: 'forum'})
            
            
        }
    }
</script>

