<template>
    <div class="nmItem">
        <input type="checkbox" v-model="item.completed" @change="updateTodo">
        <span :class="[item.completed ? 'completed' : '', 'nmtask']">{{item.name}}</span>
        <button @click="removeTask" class="nmTrash">
            <font-awesome-icon :icon="['fas', 'trash']" />
        </button>
    </div>
</template>

<script>
export default {
    props: ['item'],

    methods: {
        updateTodo(){
            axios.put('api/todo/'+ this.item.id, {
                item: this.item
            })
            .then(response=>{
                if(response.status == 200){
                    this.$emit('itemChanged')
                }
            })
            .catch(error=>{
                console.log(error)
            })
        },
        removeTask(){
            axios.delete('api/todo/'+ this.item.id)
            .then(response=>{
                if(response.status == 200){
                    this.$emit('itemChanged')
                }
            })
            .catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>
.nmItem{
    display: flex;
    justify-content: center;

}
.nmtask{
    width: 100%;
    color: #000;
    margin-left: 5px;
}
.completed{
    text-decoration: line-through;
}
.nmTrash{
    color: red;
}
</style>
