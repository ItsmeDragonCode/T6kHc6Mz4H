<template>
<div class="toDoListContainer">
    <div v-for="(item, index) in items" :key="index">
        <show 
        :item="item" 
        class="item" 
        v-on:itemChanged="$emit('reloadList')"
        />
    </div>
</div>
</template>

<script>
import show from './show.vue'

export default {
    props: ['items'],
    components:{
        show
    }
}
</script>
<style scoped>
.item {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>