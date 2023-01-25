<template>
    <div>
         <!--<div style="border:1px solid #ddd; border-radius:10px; background-color:#efefef; padding:3px 10px 3px 10px;-->
                                    <!--margin-bottom:10px;position:relative; display:inline-block">-->
            <!--<i class="fa fa-file-image-o"></i><b>Photo</b>-->
             <!--&lt;!&ndash;<input type="file" name="images[]" multiple="multiple" onchange="uploadImageTemporary">&ndash;&gt;-->
           <!--<input type="file" name="image[]"  @change="onFileChange"  multiple="multiple" style="position: absolute;left: 0; top: 0; opacity: 0"/>-->
           <!--&lt;!&ndash;<input type="text"  name="image[]" @change="onFileChange" checked="checked">&ndash;&gt;&ndash;&gt;-->
       <!--</div>-->

        <div class="row form-group add-image">
            <label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
            <div class="col-sm-9">
                <h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload <span>You can add multiple images.</span></h5>
                <!--<div class="upload-section" v-if="image">-->
                        <!--<label class="item-image" v-for="img in image">-->
                            <!--{{img.name}}-->
                            <!--<img  class="img-pre" :src="img.name"  height="80px">-->
                            <!--&lt;!&ndash;<button @click= "uploadImg" class="btn btn-success">Upload</button>&ndash;&gt;-->
                            <!--<div class="info-block" style="height:23px; padding-top:5px;">-->
                                <!--<input type="radio"  name="first_image" id="imag" checked="checked">-->
                                <!--<label class="form-label" for="image0">Photo principale</label>-->
                            <!--</div>-->

                            <!--<span v-show="image" class="fa fa-trash remove-img" style="font-size: 20px;" @click="removeImg(key)"></span>-->
                        <!--</label>-->
                        <!--<label class="upload-image">-->
                            <!--<input type="file" name="image[]"  @change="onFileChange"  multiple="multiple"/>-->
                        <!--</label>-->
                    <!--</div>-->

                <div class="upload-section">
                    <label class="item-image" v-for="(img, key) in image">

                         <img  class="img-pre" :src="img"  height="80px">
                        <!--<button @click= "uploadImg" class="btn btn-success">Upload</button>-->
                        <div class="info-block" style="height:23px; padding-top:5px;">
                            <input type="radio"  name="first_image" id="image0" checked="checked">
                            <label class="form-label" for="image0">Photo principale</label>
                        </div>
                        <span v-show="image" class="fa fa-trash remove-img" style="font-size: 20px;" @click="removeImg(key)"></span>
                    </label>
                    <label class="upload-image">
                        <input type="file" name="image[]"  @change="onFileChange"  multiple="multiple"/>
                    </label>
                </div>
            </div>
        </div>
        <button v-if="edit" @click= "updateImg" class="btn btn-success">Edit</button>
         <button v-else @click= "uploadImg" class="btn btn-success">Save</button>

    </div>
</template>

<script>
    export default {
        props: ['item_id'],
        data : function(){
            return {
                image: [],
                item: '',
                images:[],
//                 item_id:0,
                edit:false,
                open:false

            }
        },
         mounted: function(){
            console.log('Component mounted.');
//            this.getFiles();
        },
        methods : {
            getFiles(){
                axios.get( '/getImages/'+ this.item_id )
                    .then(response => {
                        console.log(response.data);
                        this.image= response.data;
                    })
                    .catch(error=>{
                        console.log('errors:' ,error);
                    })
            },

            onFileChange(e){
                var files = e.target.files || e.dataTransfer.files;
                //this.images = [];
                Array.prototype.push.apply(this.images, files);
                if (!this.images.length)
                    return;
                this.createImg(this.images);

            },
            createImg(file){
                //see the image before the upload
                   for (var i = 0; i < file.length; i++) {

                        var reader = new FileReader();
                        var vm = this;
                        reader.onload = (e) => {
                            vm.image.push(e.target.result);
                        };
                        reader.readAsDataURL(file[i]);
                    }
            },

             uploadImg() {
                 var vm = this;
                 axios.post('/saveImage', {
                    image: vm.image,
                })

               .then((response) => {

                   if (response.data.etat ) {
                       vm.image.id = response.data.id;

                   }
               })
               .catch(function (error) {
                   console.log(error);
               });

             },
            editImg:function(image){
                "use strict";
                self.edit = true;
                // let self = this;
                self.open= true;
                // self.interest = interest;
            },
            updateImg() {
                var vm = this;
                axios.put('/updateImage', {
                    image: vm.image,
                })
                    .then((response) => {
                        if (response.data.etat ) {
                            vm.image={
                                id: 0,
                                name: '',
                            }
                        }
                        vm.edit = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },

            removeImg(key){
//                var position = this.image.indexOf(img);
//                this.image.splice(position,1);
//               console.log (key);
                this.image.splice(key, 1);
                this.images.splice(key, 1);
//
            },
        }
    }
</script>
