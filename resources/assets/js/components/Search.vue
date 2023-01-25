<template>
    <div>

        <div class="col-md-4" style="padding:1px;">
            <select id="language" class="form-control" v-model="country_id">
                <option disabled value="" selected="selected">Countries</option>
                <option v-for="country in countries" v-bind:value="country.id"> {{ country.name }}</option>
            </select>
        </div>
        <div class="col-md-4" style="padding:1px;">
            <div class="input-group">
                <input type="text" class="form-control" name="search"
                       placeholder=" looking for?"
                       v-model="query" autocomplete="off"/>

                <span class="input-group-btn">
                       <button class="btn btn-default" type="submit" style="background-color:#FF8A80;"  @click="searchitem">
                           <span class="glyphicon glyphicon-search" style="color:#ffffff"></span>
                       </button>
                </span>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['profile_user_id','user_id'],
        data() {
            return {
                countries:[],
                country_id : 0,
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
            this.getCountries();
        },
        methods: {
            getCountries: function(){
                let self = this;
                axios.get( '/getCountries')
                    .then(response => {
                        console.log(response.data);
                        self.countries= response.data;

                    })
                    .catch(error=>{
                        console.log('errors:' ,error);
                    })
            },
            searchitem(){
                let self = this;
                self.results= [];

                axios.post('/items/search', {
                    query: self.query,
//                    selected: self.selected,
                })
                    .then((response) => {
                        self.results = response.data;
                        console(response.data);

                    })
                    .catch(function (error) {
                        console.log(error);

                    });
            },

//            search(){
//             let self = this;
//              self.results= [];
//                axios.post('/search', {
//                    query: self.query,
//                    selected: self.selected,
//                })
//                    .then((response) => {
//                        self.results = response.data;
//                        console.log(self.results);
//
//                    })
//                    .catch(function (error) {
//                        console.log(error);
//
//                    });
//            },


        }
    }
</script>