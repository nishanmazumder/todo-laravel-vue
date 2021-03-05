<template>
    <div>
        <div class="nmAddItem">
            <input type="text" v-model="item.name">
            <font-awesome-icon @click="addItem" :class="[item.name? 'active':'inactive', 'icon']"
                :icon="['fas', 'plus-square']" />
        </div>
    </div>
</template>

<style scoped>
    .nmAddItem {
        display: flex;

        justify-content: center;
        align-items: center;
    }

    .nmAddItem input {
        width: 100%;
        outline: none;
        border: 1px solid teal;
        margin-right: 5px;
    }

    .icon {
        font-size: 22px;
    }

    .active {
        color: green;
    }

    .inactive {
        color: grey;
    }

</style>

<script>
    export default {
        data: function () {
            return {
                item: {
                    name: ''
                }
            }
        },

        methods: {
            addItem() {
                if (this.item.name == '') {
                    return
                }

                axios.post('/api/todo', {
                        item: this.item
                    })

                    .then(response => {
                        if (response.status == 201) {
                            this.item.name = this.$emit('itemRefresh')
                            this.item.name = ''
                        }
                    })

                    .catch(error => {
                        console.log(error)
                    })

            }
        }
    }

</script>
