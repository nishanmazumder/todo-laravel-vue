<template>
    <div :class="[item.activated == 1? 'nmItemCompleted' : '', 'nmItem']">
        <input type="checkbox" v-model="item.activated" @change="updateTodo">
        <!-- <input type="checkbox" :value="item.completed2" v-model="item.completed2" @change="updateTodo($event)"> -->
        <!-- <input type="checkbox" v-model="check" @change="updateTodo"> -->
        <!-- <input type="checkbox" checked @change="updateTodo"> -->
        <span :class="[item.activated == 1 ? 'completed' : '', 'nmtask']">{{item.name}}</span>
        <button @click="removeTask" class="nmTrash">
            <font-awesome-icon :icon="['fas', 'trash']" />
        </button>
        <!-- <span>{{checkBox}}</span> -->
    </div>
</template>

<script>
    export default {

        props: ['item'],

        // props : {
        //     item : {
        //         name : String,
        //         completed2: Number
        //     }
        // },

        // data: function(){
        //     return{
        //         checkBox : function(){
        //             if(this.item.completed === 1){
        //                 return true
        //             }else{
        //                 return false
        //             }
        //         }
        //     }
        // },

        methods: {
            updateTodo() {
                // let check = ''
                // if(e.target.checked){
                //     check = 1
                //     //console.log(e.target.value)
                // }else{
                //     check = 0
                // }

                //console.log(check)



                //console.log(this.item.completed)
                // let checkToggle = ''
                // if (this.item.completed == true) {
                //     checkToggle = 1
                // } else {
                //     checkToggle = 0
                // }

                //console.log(checkToggle)

                axios.put('api/todo/' + this.item.id, {
                        //item: checkToggle
                        item: this.item
                    })
                    .then(response => {
                        if (response.status == 200) {
                            this.$emit('itemChanged')
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            removeTask() {
                axios.delete('api/todo/' + this.item.id)
                    .then(response => {
                        if (response.status == 200) {
                            this.$emit('itemChanged')
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }

</script>

<style scoped>
    .nmItem {
        display: flex;
        justify-content: center;
        background: #d2cece;
        margin-top: 10px;

    }

    .nmItemCompleted{
        background: yellow;
    }

    .nmtask {
        width: 100%;
        color: #000;
        margin-left: 5px;
    }

    .completed {
        text-decoration: line-through;
    }

    .nmTrash {
        color: red;
    }

</style>
