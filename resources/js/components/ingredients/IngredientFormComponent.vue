<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-five-fifths">
                <div class="box custom-box">
                    <form v-on:submit.prevent="sendForm">
                        <!-- ingredient name -->
                        <div class="field">
                            <label class="label">Ingredient name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Name of the ingredient"
                                       v-model="form.name" v-bind:disabled="!editable">
                            </div>
                        </div>
                        <!-- description -->
                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Description of the ingredient"
                                          v-model="form.description" v-bind:disabled="!editable"></textarea>
                            </div>
                        </div>

                        <!-- recipe -->
                        <div class="field ">
                            <label class="label">Recipe</label>
                            <div class="select is-fullwidth" v-bind:class="{'is-loading': recipesLoading}">
                                <select v-model="form.recipe_id" v-bind:disabled="!editable">
                                    <option v-for="recipe in recipes" :value="recipe.id">{{recipe.name}}</option>
                                </select>
                            </div>
                        </div>

                        <!-- submit buttons when view is editable-->
                        <div class="field is-grouped" v-if="editable">
                            <div class="control">
                                <button class="button is-link"
                                        @click.prevent="sendForm">Submit
                                </button>
                            </div>
                            <div class="control">
                                <button class="button is-link is-light">Cancel</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <navigation-message v-if="createdData"
                            :entity="createdData"
                            url="/ingredient"></navigation-message>
        <query-message v-else-if="form.isFail()"
                       :success="form.isSuccess()"
                       :fail="form.isFail()"
                       :message="form.failMessage"></query-message>
    </div>
</template>

<script>
    const DEFAULT_FORM = {
        id: null,
        name: null,
        description: null,
        recipe_id: null
    };
    export default {
        name: "IngredientFormComponent",
        data: function () {
            return {
                form: null,
                createdData: null,
                recipes: [],
                recipesLoading: false
            }
        },
        props: {
            ingredient: {type: Object},
            editable: {type: Boolean, default: true}
        },
        created: function () {
            if (this.ingredient) {
                this.form = new Form(this.ingredient);
            } else {
                this.form = new Form(DEFAULT_FORM);
            }
            this.form.noReset = ['id', 'name', 'description', 'recipe_id'];
            this.fetchRecipes();
        },
        methods: {
            sendForm: function () {
                const formId = this.form['id'];
                const formSlug = this.form['slug'];
                const isUpdate = !!formId;
                const formPromise = formId ?
                    this.form.patch('/ingredient/' + formSlug) :
                    this.form.post('/ingredient');
                formPromise
                    .then((createdIngredient) => {
                        this.createdData = createdIngredient;
                        if (isUpdate) {
                            window.location.href = '/ingredient/';
                        }
                    }).catch((error) => {
                        console.error(error);
                    }
                );
            }, fetchRecipes() {
                this.recipesLoading = true;
                axios["get"]("/list/recipe")
                    .then(res => res.data)
                    .then(res => {
                        this.recipes = res;
                        this.recipesLoading = false;
                        this.isEmpty = _.isEmpty(this.recipes);
                    })
                    .catch(err => console.error(err));
            },
        }
    }
</script>

<style scoped>

</style>
