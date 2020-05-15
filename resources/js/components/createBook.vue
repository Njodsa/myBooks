<template >
<div>
    <div class="alert alert-success" v-if="saved">
        <strong>Success!</strong> Your book has been saved successfully.
    </div>
    <div id="book-form">
        <form method="post" @submit.prevent="onSubmit">
            <fieldset>
                <div class='row text-left'>
                    <div class="form-group col-lg-5 col-md-12 offset-lg-1">
                        <label class="control-label" for="name">Name</label>
                        <div :class="{'has-error': errors.name}">
                            <input id="name" v-model="book.name" type="text" placeholder="Your name" class="form-control">
                            <span v-if="errors.name" class="help-block text-danger">{{ errors.name[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-md-12">
                        <label class="control-label" for="authorname">Authorname</label>
                        <div :class="{'has-error': errors.authorname}">
                            <input id="authorname" v-model="book.authorname" type="text" placeholder="who is authorname" class="form-control">
                            <span v-if="errors.authorname" class="help-block text-danger">{{ errors.authorname[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-md-12 offset-md-1">
                        <label class="control-label" for="body">isbn</label>
                        <div :class="{'has-error': errors.isbn}">
                            <input class="form-control" id="isbn" v-model="book.isbn" placeholder="Please enter isbn: 908-5877-54-45...">
                            <span v-if="errors.isbn" class="help-block text-danger">{{ errors.isbn[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group col-lg-3 col-md-12">
                        <label class="control-label" for="body">Genres</label>
                        <div :class="{'has-error': errors.genres}">
                            <select name="genres" id="genres" class="form-control" v-model="book.genres">
                                <option selected>Choose genre...</option>
                                <option value="Children">Children's</option>
                                <option value="Drama">Drama</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="Romance">Romance</option>
                                <option value="Art">Art</option>
                                <option value="Diary">Diary</option>
                                <option value="Biography">Biography</option>
                                <option value="History">History</option>
                                <option value="Math">Math</option>
                                <option value="Science">Science</option>
                                <option value="Self help">Self help</option>
                                <option value="Travel">Travel</option>
                                <option value="Health">Health</option>
                                <option value="Cookbook">Cookbook</option>
                                <option value="Journal">Journal</option>
                                <option value="Poetry">Poetry</option>
                                <option value="Political">Political</option>
                            </select>
                            <span v-if="errors.genres" class="help-block text-danger">{{ errors.genres[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group col-lg-3 col-md-12 ">
                        <label class="control-label" for="body">Price</label>
                        <div :class="{'has-error': errors.price}">
                            <input class="form-control" id="price" v-model="book.price" placeholder="Please enter price...">
                            <span v-if="errors.price" class="help-block text-danger">{{ errors.price[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mt-4">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Save Book</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            errors: [],
            saved: false,
            book: {
                name: '',
                authorname: '',
                isbn: '',
                genres: 'Choose genre...',
                price: '',

            }
        };
    },

    methods: {
        onSubmit() {
            this.saved = false;
            axios.post('api/book', this.book)
                .then(({
                    data
                }) => this.setSuccessMessage())
                .catch(({
                    response
                }) => this.setErrors(response));
        },

        setErrors(response) {
            this.errors = response.data.errors;
        },

        setSuccessMessage() {
            this.reset();
            this.saved = true;
        },

        reset() {
            this.errors = [];
            this.book = {
                name: null,
                email: null,
                body: null
            };
        }
    }
}
</script>
