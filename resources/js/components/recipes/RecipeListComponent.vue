<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-five-fifths">
                <div class="box custom-box" v-if="!isEmpty">
                    <recipe-table :recipes="recipes"
                                  @delete="deleteItem"></recipe-table>
                </div>
                <template v-else>
                    No recipes found
                    <!-- todo: implement loading spinner -->
                </template>
            </div>
        </div>


        <!-- delete modal -->
        <div class="modal" v-bind:class="{ 'is-active': deleteEntity }" v-if="deleteEntity">
            <div class="modal-background" v-on:click="closeDeleteModal"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Modal title</p>
                    <button class="delete" aria-label="close" v-on:click="closeDeleteModal"></button>
                </header>
                <section class="modal-card-body">
                    <span>Delete {{deleteEntity.name}} ?</span>
                </section>
                <footer class="modal-card-foot">
                    <button class="button" v-on:click="closeDeleteModal">Cancel</button>
                    <button class="button is-danger" v-on:click="confirmDeletion">Delete</button>
                </footer>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "RecipeListComponent",
        data() {
            return {
                isEmpty: true,
                deleteEntity: null,
                recipes: []
            }
        },
        created: function () {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios["get"]("/list/recipe")
                    .then(res => res.data)
                    .then(res => {
                        this.recipes = res;
                        this.isEmpty = _.isEmpty(this.recipes);
                    })
                    .catch(err => console.error(err));
            },
            deleteItem(recipe) {
                this.deleteEntity = recipe;
            },
            closeDeleteModal() {
                this.deleteEntity = null;
            },
            confirmDeletion() {
                axios['delete']('recipe/' + this.deleteEntity.slug)
                    .then(() => {
                        this.deleteEntity = null;
                        this.fetchData();
                    });
            }
        }
    }
</script>

<style scoped>

</style>
