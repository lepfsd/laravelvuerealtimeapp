<template>
    <v-card class="mt-2">
        <v-card-title primary-title>
            <div>
                <h3 class="headline mb-0">
                    <router-link :to="data.path">
                        {{ data.title }}
                    </router-link> 
                </h3>
                <h6 >{{ data.user }} said {{ data.created_at }}</h6>
            </div>
        </v-card-title>
        <v-card-subtitle>
            {{ data.body }}
        </v-card-subtitle>
    </v-card>
</template>

<script>
export default {
    props: ['data']
}
</script>

<style scoped>

</style>