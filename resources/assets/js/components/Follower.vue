<template>
    <div>

        <p v-if="profile_user_id === user_id">
        </p>
        <p v-else>
            <button class="btn icon-btn btn-default" v-if="isFollowing" @click="unFollow" style="color:#000000">Following</button>
            <button class="btn icon-btn btn-info" v-if="!isFollowing" @click="followUser" style="color:#000000">Follow</button>
        </p>
 </div>
</template>

<script>
    export default {
        props: ['profile_user_id','user_id'],
        data() {
            return {
                isFollowing: false,
            }
        },
        mounted() {
            const self = this;
            axios.get('/check_following/' + self.profile_user_id )
                .then( (resp) => {
                    if (resp.data) {
                        self.isFollowing = true;
                    } else {
                        self.isFollowing = false;
                    }
                })
        },
        methods: {
            followUser() {
                let self = this;
                axios.get('/followUser/' + self.profile_user_id )

                    .then(function(response){
//                        if(response.data.etat){
                            self.isFollowing = true;
//                        }
                    })
                    .catch(function(error){
                        this.errors = response.data;
                    });

            },
            unFollow(){
                let self = this;
                axios.get('/unFollow/' + self.profile_user_id)
                    .then(response=>{
                        console.log(response);
                        if(response.data.etat) {
                            self.isFollowing = false;
                        }
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },

        }
    }
</script>