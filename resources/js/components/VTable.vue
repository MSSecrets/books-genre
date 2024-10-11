<template>
    <div>
        <table>
            <thead>
                <tr>
                    <th v-for="headerName in headerList">
                        {{ headerName }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in tableData">
                    <td v-for="item in row">
                        {{ item }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'VTable',
        props: {
            headerList: {
                type: Array,
                required: true,
            },

            tableData: {
                type: Array,
                required: true,
            }
        }
    }
</script>

<style>
</style>
