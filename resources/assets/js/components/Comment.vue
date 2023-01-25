<template>
    <div>
        <h5 @click="commentSeen= !commentSeen">Comments ({{comments.length}})</h5>
        <hr>
        <div v-if="commentSeen">
            <ul style="list-style-type: none;">
                <li class="" v-for="comment in comments" v:bind-key="comment.id">

                    <div class="row">
                        <div class="col-md-1 pull-left" v-if="comment.user.image">
                            <a :href="'/profile/'+comment.user.profile.username">
                                <img :src="'/website/images/'+ comment.user.image" width="40px" height="40px"
                                     style="margin-bottom:5px;" class="img-circle img-user"/>
                            </a>
                        </div>
                        <div class="col-md-1" v-else>
                            <a href="#">
                                <img src="https://www.radiotnn.com/wp-content/uploads/2016/02/no-intern.jpg"
                                     width="30px" height="30px" style="margin-bottom:5px;" class="img-circle img-user"/>
                            </a>
                        </div>
                        <div class="col-md-10 pull-left">
                            <a :href="'/profile/'+comment.user.profile.username">
                                {{(comment.user.firstname)}} {{(comment.user.lastname)}}
                             </a>
                            <small style=" font-family: Conv_helveticaneuecyr-bold; margin-left:10px ">
                                {{ comment.created_at | myOwnTime}}
                            </small>
                            <p>{{comment.comment}}</p>

                        </div>
                        <span class="fa fa-times" style="font-size: 15px" @click="deleteComment(comment)"></span>
                    </div>
                </li>
            </ul>
            <div class="comment_form">

                <!-- send comment-->
                <div class="row">
                    <div v-if="!commentData">

                        <div class="col-md-12">
                            <textarea class="form-control" name="comment" v-model="commentData"
                                      placeholder="Add a comment"></textarea>
                        </div>
                    </div>
                    <div v-else>
                        <!--<div class="col-md-2">-->
                        <!--&lt;!&ndash;<img :src="'/website/images/'+ user.pic" width="48px" height="48px" style="margin-bottom:5px;" class="img-circle img-user"/>&ndash;&gt;-->
                        <!--</div>-->
                        <div class="col-md-11">
                            <textarea class="form-control" name="comment" v-model="commentData"></textarea>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-warning pull-right" style="marging-left:10px;" @click="addComment">
                                Post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['item_id', 'user'],
        data: function () {
            return {
                commentData: '',
                commentSeen: false,
                comments: [],
//                user:[],
            }
        },
        mounted: function () {
            this.getComments();
        },
        filters: {
            moment: function (date) {
                return moment(date).format('MMMM Do YYYY, h:mm:ss a');
            }
        },

        methods: {
            getComments: function () {
                axios.get('/getComments/' + this.item_id)
                    .then(response => {
                        this.comments = response.data;
//                        this.user = response.data;
                        Vue.filter('myOwnTime', function (value) {
                            return moment(value).fromNow();
                        });
                    })
                    .catch(error => {
                        console.log('errors:', error);
                    })
            },
            addComment(){
                var vm = this;
                axios.post('/addComment', {
                    comment: vm.commentData,
                    id: vm.item_id,
                })
                    .then(function (response) {

                        if (response.status === 200) {
                            vm.commentData = '';
                            vm.comments.push(response.data.comment)
//                            app.user = response.data;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);

                    });
            },
            deleteComment(comment){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#FF8A80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {

                        let self = this;
                        axios.get('/deleteComment/' + comment.id)
                            .then(response => {
                                if (response.data.etat) {
                                    var position = self.comments.indexOf(comment);
                                    self.comments.splice(position, 1);
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                                self.errors = response.data;

                            });
                    }
                })
            },
        }
    }
</script>
