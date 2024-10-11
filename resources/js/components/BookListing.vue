<template>
    <div>
        <div v-if="loading" class="ease-in-out duration-300 text-center">
            Loading...
        </div>

        <div v-else>
            <div v-if="! tableData" class="ease-in-out duration-300">
                No Data
            </div>
            
            <table v-else class="table-separate ease-in-out duration-300">
                <thead>
                    <tr>
                       <th>Title</th>
                       <th>Author</th>
                       <th>Rating</th>
                       <th></th>
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
                        <td class="border-l">
                            <div>
                                <a :href="`/books/{row.id}/edit`">Edit</a>
                            </div>
                            <div>
                                <a :href="`/books/{row.id}/delete`">Delete</a>
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
                loading: false
            }
        },

        mounted() {
            this.loadTableData();
        },

        methods: {
            loadTableData() {
                this.loading = true;

                axios('/api/books')
                    .then((response) => {
                        this.tableData = response.data.data.data;
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }
        }
    }
</script>

<style>
</style>
