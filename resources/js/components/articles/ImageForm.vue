<template>
    <div class="d-flex justify-content-center">
      <div class="helper"></div>
      <div class="drop display-inline align-center" @dragover.prevent @drop="onDrop">
        <div class="helper"></div>
        <div>
          <label v-if="!image" class="btn btn-white" for="image">
              SELECTIONNER OU GLISSER UNE IMAGE.
              <input type="file" name="image" @change="onChange" id="image"/>
          </label>
          <div class="hidden display-inline align-center" v-else :class="{ 'image': true }">
              <img :src="image" alt="" class="img" />
              <div v-if="!uploading">
                <button class="btn btn-primary" @click="uploadFile">
                  <i class="fa fa-cloud-upload"></i> Sauvegarder
                </button>
                <button class="btn btn-danger" @click="removeFile">
                    <i class="fas fa-trash-o"></i> Enlever
                </button>
              </div>
              <div v-else>
                <button class="btn btn-white" disabled>
                  <i class="fa fa-cloud-upload"></i> Chargement...
                </button>
              </div>
          </div>
        </div>
      </div>
    </div>
</template>


<script>
    export default {
        props: {
          articleId: {
            type: Number,
            required: true
          }
        },
        data() {
            return {
                image: "",
                file: null,
                uploading: false,
            }
        },
        methods: {
            onDrop(e) {
                e.stopPropagation();
                e.preventDefault();
                const files = e.dataTransfer.files;
                this.createFile(files[0]);
            },
            onChange(e) {
                const files = e.target.files;
                this.createFile(files[0]);
            },
            createFile(file) {
                if (!file.type.match('image.*')) {
                    alert('Select an image');
                    return;
                }
                
                this.file = file;
                const reader = new FileReader();
                reader.onload = (e) => {
                  this.image = e.target.result;
                }
               
                reader.readAsDataURL(file);
            },
            removeFile() {
                this.image = null;
            },
            async uploadFile() {
              const url = `/articles/${this.articleId}/images`
              this.uploading = true;
              try {
                
                const response = await axios.post(url, this.formAttributes());
                this.$emit("image-uploaded", response.data);
                this.image = "";
              } catch(error) {
                console.error(error)
              } finally {
                this.uploading = false;
              }
            },
            formAttributes() {
              const formData = new FormData();
              formData.append("image", this.file);
              return formData;
            }
        }
    }
</script>

<style>
#image {
  position: absolute;
  opacity: 0;
  z-index: -1;
}
.align-center {
  text-align: center;
}
.helper {
  height: 100%;
  display: inline-block;
  vertical-align: middle;
  width: 0;
}
.hidden {
  display: none !important;
}
.hidden.image {
  display: inline-block !important;
}
.img {
  border: 1px solid #f6f6f6;
  display: inline-block;
  height: auto;
  max-height: 80%;
  max-width: 80%;
  width: auto;
}
.drop {
  background-color: #f2f2f2;
  border: 4px dashed #ccc;
  background-color: #f6f6f6;
  border-radius: 2px;
  height: 100%;
  max-height: 400px;
  max-width: 600px;
  width: 100%;
  min-height: 200px;
  padding: 30px 0;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>