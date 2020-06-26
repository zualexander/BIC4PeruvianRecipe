<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-five-fifths">
                <div class="box custom-box">
                    <div class="field">
                        <label class="label">Search Ingredients: </label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input " type="text" placeholder="Search Ingredient" v-model="searchQuery">
                            <span class="icon is-small is-left"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <hr>
                    <ingredient-table v-if="filteredIngredients.length > 0"
                                      :ingredients="filteredIngredients"
                                      @delete="deleteItem"></ingredient-table>
                    <template v-else>
                        No ingredients found
                        <!-- todo: implement loading spinner -->
                    </template>
                </div>
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
        name: "IngredientSearchComponent",
        data() {
            return {
                searchQuery: '',
                ingredients: [],
                deleteEntity: null,
            }
        },
        created: function () {
            this.initData();
        },
        computed: {
            filteredIngredients: function () {
                return this.ingredients.filter((ingredient) => ingredient.name.toLowerCase().startsWith(this.searchQuery.toLowerCase()));
            },
        },
        methods: {
            initData() {
                this.fetchData();
                this.deleteEntity = null;
            },
            fetchData() {
                axios["get"]("/list/ingredient")
                    .then(res => res.data)
                    .then(res => {
                        this.ingredients = res;
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
                axios['delete']('/ingredient/' + this.deleteEntity.slug)
                    .then(() => {
                        this.deleteEntity = null;
                        this.initData();
                    });
            },
            setIngredients(ingredients) {
                this.ingredients = ingredients;
            }
        }
    }
</script>

<style scoped>

</style>
