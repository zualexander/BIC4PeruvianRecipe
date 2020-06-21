<template>
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    {{title}}
                </h1>
                <h2 class="subtitle" v-if="!!subTitle">
                    {{subTitle}}
                </h2>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "HeroComponent",
        props: {
            title: {
                type: String,
                required: true
            },
            subTitle: {
                type: String
            }
        }
    }
</script>

<style scoped>

</style>
