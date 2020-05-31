<template>
    
</template>
<script>
    import {EventBus} from '../app'
    export default {
        created(){
            EventBus.$emit('logout')
        }
    }
</script>

