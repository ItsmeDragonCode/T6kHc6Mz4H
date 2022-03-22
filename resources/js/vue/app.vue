<template>
<div class="toDoListContainer">
    <div class="heading">
        <h2 id="title">To Do List</h2>
        <create 
        v-on:reloadList="getItems()"
        />
    </div>
    <index 
    :items="items" 
    v-on:reloadList="getItems()"
    />
</div>
</template>

<script>

import create from './create'
import index from './index'

export default {
    components:{
        create,
        index
    },
    data: function(){
        return {
            items: []
        }
    },
    methods: {
        getItems(){
            axios.get('api/items')
            .then( response => {
                this.items = response.data;
            })
            .catch( error => {
                console.log(error);
            })
        }
    },
    created(){
        this.getItems();
    }
}
</script>
<style scoped>
.toDoListContainer{
    width:350px;
    margin: auto;
}
.heading{
    background-color: #e6e6e6;
    padding: 10px;
}
#title{
    text-align: center;
}
</style>