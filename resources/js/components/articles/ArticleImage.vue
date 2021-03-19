<template>
    <div class="py-8">
        <image-form :articleId="articleId" @image-uploaded="addUploadedImage"/>
        <image-list :images="images" @delete-image="removeImage"/>
    </div>
</template>


<script>
    import ImageForm from "./ImageForm";
    import ImageList from "./ImageList"
    export default {
        props: {
            articleId: {
                type: Number,
                required: true
            }
        },
        components: {
            ImageList,  ImageForm,
        },
        data() {
            return {
                images: []
            }
        },
        mounted() {
            this.fetchImages();
        },
        methods: {
            addUploadedImage(image) {
                this.images.push(image)
            },
            async fetchImages() {
                const url = `/articles/${this.articleId}/images`;
                try {
                    const response = await axios.get(url);
                    this.images = response.data.images;                  
                } catch(error) {
                    console.error(error);
                }
            },
            removeImage(removedImage) {
                this.images = this.images.filter(image => {
                    return image.id != removedImage.id;
                });
                this.deleteImage(removedImage);
            },
            async deleteImage(image) {
                const url = `/articles/${this.articleId}/images/${image.id}`;
                try {
                    const response = await axios.delete(url);
                    console.log(response.data);
                } catch(error) {
                    console.error(error);
                }
            }
        }
    }
</script> 