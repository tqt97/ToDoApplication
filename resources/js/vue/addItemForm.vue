<template>
    <div class="addItem">
        <input type="text" v-model="item.name" v-on:reloadlist="getList()" />
        <font-awesome-icon
            icon="plus-square"
            :class="[item.name ? 'active' : 'inactive', 'plus']"
            @click="addItem()"
        />
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            item: {
                name: "",
            },
        };
    },
    methods: {
        addItem() {
            if (this.item.name == "") {
                return;
            }
            axios
                .post("/api/item/store", {
                    item: this.item,
                })
                .then((response) => {
                    if (response.status == 201) {
                        this.item.name = "";
                        this.$emit("reloadlist");
                        this.$notify({
                            type: "success",
                            title: `Success`,
                            text: "Add todo item successfully !",
                        });
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.$notify({
                        type: "error",
                        title: `Error`,
                        text: "Ops, Something went wrong !",
                    });
                });
        },
    },
};
</script>
<style scoped>
.addItem {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
input {
    background-color: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px 10px;
    margin-right: 10px;
    width: 100%;
    height: 28px;
    line-height: 28px;
    font-size: 20px;
    border-radius: 5px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    transition: all 0.5s;
    position: relative;
}
input:focus {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transform: scale(0.95);
}
.plus {
    font-size: 40px;
    color: #ccc;
    cursor: pointer;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    transition: all 0.5s;
}
.plus:hover {
    box-shadow: 0 0 10px rgba(47, 88, 76, 0.3);
    transform: scale(0.95);
}
.active {
    color: #00ce25;
}
.inactive {
    color: #999999;
}
</style>
