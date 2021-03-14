<template>
    <div class="nmContainer">
        <h1>Todo List</h1>
        <add-item v-on:itemRefresh="getList" />
        <listview :listItems="getItems" v-on:reloadList="getList" />


        <!-- <button-test btn-text="From Parent"/> -->
        <!-- <button-test :btn-text="mytext"/> -->
        <!-- <button-test/> -->

        <!-- <button @click="mytext='Nishan'">Press</button> -->
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
    import ButtonTest from './button';

    export default {
        components: {
            AddItem,
            Listview,
            ButtonTest
        },
        data: function () {
            return {
                getItems: [],
                mytext: 'My Text'
            }
        },
        methods: {
            getList() {
                axios.get('api/todo')
                    .then(response => {
                        this.getItems = response.data
                        //console.log(response.data)
                        //return

                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },
        mounted(){
            this.getList()
        }
        // created: function () {
        //     this.getList()
        // }
    }

</script>
