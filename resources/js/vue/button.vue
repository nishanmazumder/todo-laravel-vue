<template>
    <div>
        <button>{{fullBtn}}</button>
    </div>
     <!-- Parent->Prop->Data Show -->
</template>





<script>
export default {
    // props: ['btnText']

    props: {
        btnText : {
            type: String,
            require: true,
            default: function(){
                return "Default";
            }
        }
    },

    computed: {
        fullBtn(){
            return this.btnText + " full text"
        }
    }
}
</script>

<style scoped>
button{
    background: #000;
    color: #fff;
    padding: 10px 30px;
    font-size: 22px;
    margin-top: 20px;
}
</style>
