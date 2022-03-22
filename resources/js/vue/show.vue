<template>
<div class="item">
    <div class="task">
        <input 
        type="checkbox"
        @click="updateCheck()" 
        v-model="item.completed">
        <span :class="[ item.completed ? 'completed' : 'uncompleted']">{{ item.name }}</span>
    </div>
    <button @click="removeItem()" class="trashcan">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
        </svg>
    </button>
</div>
</template>
<script>
export default {
    props: ['item'],
    methods: {
        updateCheck(){
            axios.put('api/items/' + this.item.id , {
                item: this.item
            })
            .then( response => {
                if( response.status == 200){
                    this.$emit('itemChanged');
                }
            })
            .catch( error => {
                console.log(error);
            })
        },
        removeItem(){
            axios.delete('api/items/' + this.item.id)
            .then( response => {
                if( response.status == 200){
                    this.$emit('itemChanged');
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
.completed{
    text-decoration: line-through;
    margin-left: 10px;
    color: #999999;
}
.uncompleted{
    widows: 100%;
    margin-left: 10px;
}
.item{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.trashcan{
    border: none;
    background: #e6e6e6;
    color: #ff0000;
    outline: none;
}
</style>