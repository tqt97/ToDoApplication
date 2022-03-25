<template>
    <div class="todoListContainer">
        <notifications animation-type="velocity"  position="top right" :speed="500" reverse/>
        <div class="heading">
            <h2 id="title">TODO LIST</h2>
            <add-item-form v-on:reloadlist="getList()" />
        </div>
        <list-view :items="items" v-on:reloadlist="getList()" />
    </div>
</template>

<script>
import addItemForm from "./addItemForm";
import listView from "./listView";

export default {
    components: {
        addItemForm,
        listView,
    },
    data: function () {
        return {
            items: [],
        };
    },
    methods: {
        getList() {
            axios
                .get("/api/items")
                .then((response) => {
                    this.items = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getList();
    },
};
</script>
<style scoped>
.todoListContainer {
    width: 400px;
    margin: 0 auto;
}
.heading {
    background-color: #e6e6e6;
    padding: 5px;
}
#title {
    font-size: 60px;
    text-align: center;
    color: green;
    text-shadow: 2px 4px 2px rgb(92, 92, 92);
}
</style>
