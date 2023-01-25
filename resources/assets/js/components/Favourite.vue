<template>
    <div>

        <!--<span v-if="isFavorite" @click="unFavorite"  style=" color:red;"><i class="fa fa-heart-o fa-3x pull-right"  aria-hidden="true" ></i></span>-->
        <!--<span  v-if="!isFavorite" @click="favoriteItem" > <i class="fa fa-heart-o fa-3x pull-right icon-success"  aria-hidden="true"></i></span>-->
        <span class="glyphicon glyphicon-heart pull-right"  v-if="isFavorite" @click="unFavorite" style="color: #FF8A80; font-size: 60px;"></span>

        <span class="glyphicon glyphicon-heart heart pull-right"  v-if="!isFavorite" @click="favoriteItem"></span>
 </div>
</template>

<script>
    export default {
        props: ['profile_user_id','item_id'],
        data() {
            return {
                isFavorite: false,
            }
        },
        mounted() {
            const self = this;
            axios.get('/check_favorite/' + self.item_id )
                .then( (resp) => {
                    if (resp.data) {
                        self.isFavorite = true;
                    } else {
                        self.isFavorite = false;
                    }
                })
        },
        methods: {
            favoriteItem() {
                let self = this;
                axios.get('/favoriteItem/' + self.item_id )

                    .then(function(response){
//                        if(response.data.etat){
                            self.isFavorite = true;
//                        }
                    })
                    .catch(function(error){
                        this.errors = response.data;
                    });

            },
            unFavorite(){
                let self = this;
                axios.get('/unFavorite/' + self.item_id)
                    .then(response=>{
                        if(response.data.etat) {
                            self.isFavorite = false;
                        }
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },

        }
    }
</script>