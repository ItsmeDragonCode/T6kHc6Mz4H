<template>
<div>
    <div class="addItem">
        <input type="text" v-model="item.name">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"
        v-on:click="create()"
        :class="[ item.name ? 'active' : 'inactive' , 'plus' ]">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
        </svg>
    </div>
</div>
</template>

<script>

import axios from 'axios';

export default {
    data: function (){
        return {
            item:{
                name: ""
            }
        }
    },
    methods: {
        create(){
            axios.post('api/items', {
                name: this.item.name
            })
            .then( response => {
                if( response.status == 201){
                    this.item.name = "";
                    this.$emit('reloadList');
                }
            })
            .catch( error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
    .addItem{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    input {
        background: #f7f7f7;
        border: 0;
        outline: none;
        padding: 5px;
        margin-right: 10px;
        width: 100%;
    }
    .plus{
        cursor: pointer;
    }
    .active{
        color: #48b848;
    }
    .inactive{
        color: #999999;
    }
</style>