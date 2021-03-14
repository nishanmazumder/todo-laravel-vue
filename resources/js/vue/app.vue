<template>
    <div class="nmContainer">
        <h1>Todo List</h1>
        <add-item v-on:itemRefresh="getList" />
        <listview :listItems="getItems" v-on:reloadList="getList" />
    </div>

</template>

<style scoped>
    .nmContainer {
        background: #ddd;
        margin: 50px auto;
        width: 400px;
        padding: 20px;
        border: 1px solid teal;
    }

    .nmContainer h1 {
        text-align: center;
        margin: 10px;
    }

</style>

<script>
    import AddItem from './additem'
    import Listview from './listview.vue'

    export default {
        components: {
            AddItem,
            Listview,
        },
        data: function () {
            return {
                getItems: [],
            }
        },
        methods: {
            getList() {
                axios.get('api/todo')
                    .then(response => {
                        this.getItems = response.data
                        return
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },
        mounted: function () {
            this.getList()
        }
    }

</script>
