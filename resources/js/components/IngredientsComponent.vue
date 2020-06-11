<template>
    <div class="container">
        <!--        <hero main-title="Blogs"></hero>-->
        <div class="columns is-multiline">
            <div class="column is-five-fifths">
                <!--                <success-box :message="successMessage" v-if="showSuccessMessage">/success-box>-->
                <div class="box custom-box" v-if="hasIngredients">
                    <table class="table is-bordered is-fullwidth">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Last Changed</th>
                            <!--                            <th><abbr title="Points">Pts</abbr></th>-->
                            <!--                            <th>Qualification or relegation</th>-->
                        </tr>
                        </thead>
                        <!--                        <tfoot>-->
                        <!--                        <tr>-->
                        <!--                            <th><abbr title="Position">Pos</abbr></th>-->
                        <!--                            <th>Team</th>-->
                        <!--                            <th><abbr title="Played">Pld</abbr></th>-->
                        <!--                            <th><abbr title="Won">W</abbr></th>-->
                        <!--                            <th><abbr title="Drawn">D</abbr></th>-->
                        <!--                            <th><abbr title="Lost">L</abbr></th>-->
                        <!--                            <th><abbr title="Goals for">GF</abbr></th>-->
                        <!--                            <th><abbr title="Goals against">GA</abbr></th>-->
                        <!--                            <th><abbr title="Goal difference">GD</abbr></th>-->
                        <!--                            <th><abbr title="Points">Pts</abbr></th>-->
                        <!--                            <th>Qualification or relegation</th>-->
                        <!--                        </tr>-->
                        <!--                        </tfoot>-->
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>Slug</td>
                            <td>Description</td>
                            <td>Last changed</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--                <error-box message="No blogs found" v-if="!hasBlogs"></error-box>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "IngredientsComponent",
        data() {
            return {
                hasIngredients: true,
                ingredients: []
            }
        },
        created: function () {
            this.fetchIngredients("/list/ingredient");
        },
        methods: {
            fetchIngredients(uri) {
                console.log("fetching " + uri);
                axios["get"](uri)
                    .then(res => res.data)
                    .then(res => {
                        this.ingredients = res;
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>

</style>
