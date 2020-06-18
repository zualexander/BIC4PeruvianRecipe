
<template>
    <div class="container">
        <!--        <hero main-title="Blogs"></hero>-->
        <div class="columns is-multiline">
            <div class="column is-five-fifths">
                <!--                <success-box :message="successMessage" v-if="showSuccessMessage">/success-box>-->
                <div class="box custom-box">
                    <form v-on:submit.prevent="sendForm">
                        <!-- ingredient name -->
                        <div class="field">
                            <label class="label">Ingredient name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Name of the ingredient"
                                       v-model="form.name">
                            </div>
                        </div>
                        <!-- description -->
                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Description of the ingredient"
                                          v-model="form.description"></textarea>
                            </div>
                        </div>

                        <!-- submit buttons -->
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link"
                                        @click.prevent="sendForm">Submit</button>
                            </div>
                            <div class="control">
                                <button class="button is-link is-light">Cancel</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!--                <error-box message="No blogs found" v-if="!hasBlogs"></error-box>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateIngredientComponent",
        data() {
            return {
                form: {
                    name: null,
                    description: null
                }
            }
        },
        created: function () {

        },
        methods: {
            sendForm: function () {
                const formObject = new window.Form(this.form);
                console.log(formObject);
                formObject.post('/ingredient').then(x=>console.log(x), y=>console.error(y));
            }
        }
    }
</script>

<style scoped>

</style>
