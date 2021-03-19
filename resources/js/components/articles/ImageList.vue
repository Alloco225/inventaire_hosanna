<template>
    <div>
        <div class="row pt-6">
            <div class="col-md-2" v-for="image in images" :key="image.id">
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" @click="deleteImage(image)">
                    <i class="fa fa-trash icon-sm text-muted"></i>
                </span>
                <img :src="image.link" alt="" width="100" height="100">
            </div>
        </div>

    </div>


</template>

<script>
    export default {
        props: {
            images: {
                type: Array,
                required: true,
                default: []
            }
        },
        methods: {
            deleteImage(image) {
                this.$emit("delete-image", image);
            }
        }
    }
</script>