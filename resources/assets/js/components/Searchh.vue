<template>
    <div>
        <div class="col-md-12 top-left links" style="float:right">
            <div class="row">
            <div class="col-md-8" style="padding:1px;">
                <div class="input-group">

                    <input type="text" class="form-control" name="search"
                           placeholder=" looking for?"
                           v-model="query" v-on:keyup="autoComplete" autocomplete="off"/>

                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                              <span class=" glyphicon glyphicon-search"></span>
                         </button>
                    </span>

                    </div>
                </div>
                </div>
                 <div class="profile-usermenu panel-foote"  v-if="results.length"
                        style=" box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
                             width: 240px;top: 0px; padding: 50px 10px 0px 10px; background: #ffffff;  z-index:3000;" >
                        <ul class="nav" v-for="result in results" style="position:absolute;width:100%; background-color:grey">
                            <li >
                                <a :href="'/jobs/view/'+result.id">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <b>{{result.title}} </b>
                                        </div>
                                        <div class="col-md-2">
                                            <img  :src="'/website/thumb/'+ result.image"  width="30px" height="30px" class="img-circle img-user pull-right"
                                                  style="cursor:pointer; width: 37px; height:37px;"/>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                  </div>
        </div>
    </div>
<!--<div>-->
 <!--<div class="col-md-12 top-left links" style="float:right">-->
    <!--<div class="col-md-8" style="padding:1px;">-->
        <!--<div class="input-group">-->


           <!--<input type="text" class="form-control" name="search"-->
               <!--placeholder=" looking for?"-->
               <!--v-model="query" v-on:keyup="autoComplete"/>-->
            <!--<div class="profile-usermenu panel-foote"  v-if="results.length"-->
                 <!--style="position:relative; z-index:1000; border:1px solid #ccc;-->
                    <!--background:#fff; margin-top:35px">-->
                <!--<ul class="nav" v-for="result in results">-->
                    <!--<li >-->
                        <!--<a :href="'/jobs/view/'+result.id">-->
                            <!--<div class="row">-->
                                <!--<div class="col-md-10">-->
                                    <!--<b>{{result.title}} </b>-->
                                <!--</div>-->
                                <!--<div class="col-md-2">-->
                                    <!--<img  :src="'/website/thumb/'+ result.image"  width="30px" height="30px" class="img-circle img-user pull-right"-->
                                          <!--style="cursor:pointer; width: 37px; height:37px;"/>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</a>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</div>-->
            <!--<span class="input-group-btn">-->
            <!--<button class="btn btn-default" type="submit">-->
                  <!--<span class=" glyphicon glyphicon-search"></span>-->
             <!--</button>-->
           <!--</span>-->



        <!--</div>-->
       <!--</div>-->
    <!--</div>-->
 <!--</div>-->
</template>
        <!--<select style="float:left;" v-model="selected">-->
            <!--&lt;!&ndash;<option disabled value="" selected="selected"><b style="padding:200px;">All</b></option>&ndash;&gt;-->
            <!--<option v-for="searchoption in selectsearch" v-bind:value="searchoption.value">-->
                <!--{{ searchoption.text }}-->
           <!--</option>-->
        <!--</select>-->
<script>
    export default {
        props: ['profile_user_id','user_id'],
        data() {
            return {
                query:'',
                results:[],
                selectsearch: [
                    { text: 'Items', value: '0' },
                    { text: 'People', value: '1' },
                ],
                selected: ''
            }
        },
        mounted() {
        },
        methods: {
         autoComplete(){
             let self = this;
              self.results= [];
                axios.post('/search', {
                    query: self.query,
                    selected: self.selected,
                })
                    .then((response) => {
                        self.results = response.data;

                    })
                    .catch(function (error) {
                        console.log(error);

                    });
            },


        }
    }
</script>