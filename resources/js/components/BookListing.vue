<template>
    <div>
        <div class="text-right p-5 border-gray-200 mb-5">
            <input 
                v-model="searchString" 
                type="text" 
                placeholder="Serch by book title"
                class="p-3 border border-gray-200"
            />
        </div>


        <div v-if="loading" class="ease-in-out duration-300 text-center p-14 text-2xl">
            Loading...
        </div>

        <div v-else>
            <div v-if="! tableData || tableData.length == 0" class="ease-in-out duration-300 text-center p-14 text-2xl">
                No Result
            </div>
            
            <table v-else class="table-separate ease-in-out duration-300">
                <thead>
                    <tr>
                       <th>Title</th>
                       <th class="border-l">Author</th>
                       <th class="border-l">Rating</th>
                       <th class="border-l"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="row in tableData">
                        <td>
                            {{ row.title }}
                        </td>
                        <td class="border-l">
                            {{ row.author }}
                        </td>
                        <td class="border-l">
                            {{ row.rating }}
                        </td>
                        <td class="border-l font-bold underline underline-offset-2">
                            <div>
                                <a :href="'/books/' + row.id + '/edit'">Edit</a>
                            </div>
                            <div>
                                <a  @click.prevent="deleteBook(row)" :href="'/books/' + row.id + '/delete'">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'BookListing',

        data() {
            return {
                tableData: null,
                loading: false,
                searchString: null,
            }
        },

        mounted() {
            this.loadTableData();
        },

        methods: {
            loadTableData(searchString) {
                this.loading = true;

                let params = {
                    search: searchString,
                }

                axios.get('/api/books', {params: params})
                    .then((response) => {
                        this.tableData = response.data.data.data;
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            },

            deleteBook(book) {
                if (confirm('Delete Book "' + book.title + '" ?'))
                axios.post('/api/books/' + book.id, {
                    _method: 'delete'
                })
                .then(() =>{
                    alert('Book "' + book.title + '" Deleted');
                    this.loadTableData();
                })
            },
        },

        watch: {
            searchString(searchString) {
                if (searchString && searchString.length > 2) {
                    this.loadTableData(searchString);
                }
            }
        }
    }
</script>

<style>
</style>
