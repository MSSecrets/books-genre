<template>
    <div>

        <div v-if="message.show" class="w-full bg-green-600 ease-in-out duration-300 text-white text-left p-5 rounded my-auto">
            {{ message.message }}
        </div>
        <div class="w-1/5 text-left mr-auto ml-auto -mt-0 mb-0">
            <form>
                <div>
                    <h2 class="text-center text-3xl pb-10">Edit Book</h2>
                 
                    <div class="pb-10">
                        <label class="w-20 inline-block">Title: </label>
                        <input 
                            v-model="book.title" 
                            type="text" 
                            placeholder="Title" 
                            class="rounded-md border-gray-400 border-solid border-[1px] p-2 w-96"
                        />
                    </div>
                    <div class="pb-10">
                        <label class="w-20 inline-block">Author: </label>
                        <input 
                            v-model="book.author"
                            type="text" 
                            placeholder="Author"
                            class="rounded-md border-gray-400 border-solid border-[1px] p-2 w-96"
                        />
                    </div>
                    <div class="pb-10">
                        <label class="w-20 inline-block">Rating: </label>
                        <input 
                            v-model="book.rating"
                            type="text" 
                            placeholder="5" 
                            class="rounded-md border-gray-400 border-solid border-[1px] p-2 w-96"
                        />
                    </div>
                </div>
                <div class="text-center">
                    <button  @click.prevent="updateBook()" class="text-white bg-orange py-2 px-4 rounded" type="reset">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'EditBook',
        props: {
            book: {
                required: true,
                type: Object,
            }
        },

        data() {
            return {
                errors: {},
                message: {
                    show: false,
                    type: 'success',
                    message: '',
                }
            }
        },

        methods: {
            updateBook() {
                axios.post('/api/books/' + this.book.id, {
                    _method: 'PATCH',
                    title: this.book.title,
                    author: this.book.author,
                    rating: this.book.rating,
                })
                .then(() => {
                    this.message.show = true;
                    this.message.type = 'success';
                    this.message.message = 'Book " ' + this.book.title + ' " updated.';
                    
                })
                .catch((error) => {
                    console.log(error);
                    this.message.show = true;
                    this.message.type = 'error';
                    this.message.message = 'Failed to update book';
                })
                .finally(() => {
                        // remove success message after 4 secs
                        setTimeout(() => {
                        this.message.show = false;
                        this.message.message = '';
                    }, 4000);

                }) 

            }
        }

    }
</script>
