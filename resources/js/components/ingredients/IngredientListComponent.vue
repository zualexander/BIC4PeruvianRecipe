<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-five-fifths">
                <div class="box custom-box" v-if="!isEmpty">
                    <ingredient-table :ingredients="ingredients"
                                  @delete="deleteItem"></ingredient-table>
                </div>
                <template v-else>
                    No ingredients found
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
        name: "IngredientListComponent",
        data() {
            return {
                isEmpty: true,
                deleteEntity: null,
                ingredients: []
            }
        },
        created: function () {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios["get"]("/list/ingredient")
                    .then(res => res.data)
                    .then(res => {
                        this.ingredients = res;
                        this.isEmpty = _.isEmpty(this.ingredients);
                    })
                    .catch(err => console.error(err));
            },
            deleteItem(ingredient) {
                this.deleteEntity = ingredient;
            },
            closeDeleteModal() {
                this.deleteEntity = null;
            },
            confirmDeletion() {
                axios['delete']('ingredient/' + this.deleteEntity.slug)
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
