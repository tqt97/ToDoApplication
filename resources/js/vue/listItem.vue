<template>
    <div class="item">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
        />
        <span :class="[item.completed ? 'completed' : '', 'itemText']">
            {{ item.name }}
        </span>
        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
    props: ["item"],
    methods: {
        updateCheck() {
            axios
                .put("/api/item/" + this.item.id, {
                    item: this.item,
                })
                .then((response) => {
                    if (response.status == 200) {
                        this.$emit("itemchanged");
                        this.$notify({
                            type: "success",
                            title: `Success`,
                            text: "Job completed successfully !",
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
        removeItem() {
            if (confirm("Do you really want to delete this job ?")) {
                axios
                    .delete("/api/item/" + this.item.id)
                    .then((response) => {
                        if (response.status == 200) {
                            this.$emit("itemchanged");
                            this.$notify({
                                type: "error",
                                title: `Success`,
                                text: "Job remove successfully !",
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
            }
        },
    },
};
</script>
<style scoped>
.completed {
    text-decoration: line-through;
    color: #999999;
}
.itemText {
    width: 100%;
    margin-left: 10px;
}
.item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}
.trashcan {
    background-color: #e6e6e6;
    border: none;
    color: #ff0000;
    outline: none;
    cursor: pointer;
}
</style>
