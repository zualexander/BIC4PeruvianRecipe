<template>
    <article class="message is-success">
        <div class="message-body">
            <span v-if="entity.name"><a
                v-bind:href="url + '/' + entity.slug">{{entity.slug}}</a> was successfully created!</span>
            <span v-else>successfully updated!</span>
        </div>
    </article>
</template>

<script>
    export default {
        name: "QueryMessage",
        props: {
            url: {
                type: String,
                required: true
            },
            entity: {
                required: true
            }
        }
    }
</script>
