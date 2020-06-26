<template>
    <table class="table is-bordered is-fullwidth">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Last Changed</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="recipe in recipes">
            <td>{{recipe.name}}</td>
            <td>{{recipe.description}}</td>
            <td>{{recipe.updated_at | dateParse | dateFormat}}</td>
            <td>
                <!-- show -->
                <a class="button is-info" :href="'/recipe/' + recipe.slug">
                    <span class="icon is-small"><i class="fa fa-eye"></i></span>
                </a>
                <!-- edit -->
                <a class="button" :href="'/recipe/' + recipe.slug + '/edit'">
                    <span class="icon is-small"><i class="fa fa-edit"></i></span>
                </a>
                <!-- delete -->
                <button class="button is-danger" @click="$emit('delete', recipe)">
                    <span class="icon is-small"><i class="fa fa-trash"></i></span>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "RecipeTableComponent",
        props: {
            recipes: {
                type: Array,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
