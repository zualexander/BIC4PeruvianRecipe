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
                            url="/recipe"></navigation-message>
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
        description: null
    };
    export default {
        name: "RecipeFormComponent",
        data: function () {
            return {
                form: null,
                createdData: null
            }
        },
        props: {
            recipe: {type: Object},
            editable: {type: Boolean, default: true}
        },
        created: function () {
            if (this.recipe) {
                this.form = new Form(this.recipe);
            } else {
                this.form = new Form(DEFAULT_FORM);
            }
            this.form.noReset = ['id', 'name', 'description'];
        },
        methods: {
            sendForm: function () {
                const formId = this.form['id'];
                const formSlug = this.form['slug'];
                const isUpdate = !!formId;
                const formPromise = formId ?
                    this.form.patch('/recipe/' + formSlug) :
                    this.form.post('/recipe');
                formPromise
                    .then((createdRecipe) => {
                        this.createdData = createdRecipe;
                        if (isUpdate) {
                            window.location.href = '/recipe/';
                        }
                    }).catch((error) => {
                        console.error(error);
                    }
                );
            }
        }
    }
</script>

<style scoped>

</style>
