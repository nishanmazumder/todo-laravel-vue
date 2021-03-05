<template>
    <div class="listContaner">
        <div v-for="(item, i) in listItems" :key="i">
            <listitem :item="item"
            v-on:itemChanged = "$emit('reloadList')"
            />
        </div>
    </div>
</template>

<style scoped>
.listContaner{
    background: yellow;
    margin-top: 10px;
}
.item{
    background: wheat;
    padding: 5px;
    margin: 5px;
}

button{
    background: #000;
    color: #fff;
    padding: 10px 30px;
    font-size: 22px;
    margin-top: 20px;
}
</style>
<script>

import Listitem from './listitem'
    export default {
        props: ['listItems'],
        components: {
                Listitem
        }
    }

</script>
