<template>
    <table class="table is-bordered is-fullwidth">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Recipe</th>
            <th>Description</th>
            <th>Last Changed</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="ingredient in ingredients">
            <td>{{ingredient.name}}</td>
            <td>{{ingredient.slug}}</td>
            <td>{{ingredient.recipe.name}}</td>
            <td>{{ingredient.description}}</td>
            <td>{{ingredient.updated_at | dateParse | dateFormat}}</td>
            <td>
                <!-- show -->
                <a class="button is-info" :href="'/ingredient/' + ingredient.slug">
                    <span class="icon is-small"><i class="fa fa-eye"></i></span>
                </a>
                <!-- edit -->
                <a class="button" :href="'/ingredient/' + ingredient.slug + '/edit'">
                    <span class="icon is-small"><i class="fa fa-edit"></i></span>
                </a>
                <!-- delete -->
                <button class="button is-danger" @click="$emit('delete', ingredient)">
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
            ingredients: {
                type: Array,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
