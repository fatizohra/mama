<template>
    <div>

        <div style="position:relative;display:inline-block; width:100%; margin-top:30px;">
            <div style="border:1px solid #ddd; border-radius:10px;
                          background-color:#efefef; padding:3px; margin-bottom:10px; padding-left: 50px">
                <i class="fa fa-file-image-o"></i> <b>photo</b>

                    <input v-if="item_image" type="file" name="image" @change="onFileChange" style="position:absolute;
                        left:0;top:0; opacity:0"/>
                    <input v-else type="file" name="image" @change="onFileChange" style="position:absolute;
                        left:0;top:0; opacity:0" required/>


          </div>
        </div>


        <div class="row form-group" v-if="image">
            <div class="col-md-12">
                <div class="upload-section">
                    <label class="upload-image">
                        <img  class="img-pre" :src="image" height="150px;" width="170px">
                    </label>
                </div>
            </div>
        </div>



        <div class="row form-group" v-if="!image && item_image">
            <div class="col-md-12">
                <div class="upload-section">
                    <label class="upload-image" v-if="image">
                        <img  class="img-pre" :src="image" height="150px" width="170px">
                    </label>

                    <label class="upload-image" >
                        <img class="img-pre" :src="'/website/images/'+item_image" height="150px" width="170px">

                    </label>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['item_image'],
        data : function(){
            return {
                image:'',
            }
        },
        mounted: function(){
        },
        methods : {
            onFileChange(e){
                var files = e.target.files || e.dataTransfer.files;
                this.createImg(files[0]);
            },
            createImg(file){
                var image = new Image;
                var reader = new FileReader;
                reader.onload = (e) =>{
                    this.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
        }
    }
</script>
