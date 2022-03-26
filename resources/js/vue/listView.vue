<template>
    <div class="w-full m-auto">
        <ul class="my-4" v-for="(item, index) in items" :key="index">
            <list-item
                :item="item"
                v-on:itemchanged="$emit('reloadlist')"
            />
        </ul>
    </div>
</template>

<script>
import listItem from "./listItem";
export default {
    props: ["items"],
    components: {
        listItem,
    },
};
</script>
<style scoped>

</style>
