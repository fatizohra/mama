<template>
    <div>
        <div class="text2">
            <div class="col-md-12">
                <label> Country</label>
                <select v-model="country" class="form-control country_list" name="country_id" required @change="getCities">
                    <option disabled value="" selected="selected">Select country</option>
                    <option v-for="country in countries" v-bind:value="country.id"> {{ country.name }}</option>
                </select>

            </div>

        </div>
        <div class ="clearfix"></div>
        <br>
        <div class="text2">
            <div class="col-md-12">
                <label> City</label>
                <select v-model="city" class="form-control" name="city_id" required>
                    <option disabled value="" selected="selected">Select city</option>
                    <option v-for="city in cities" v-bind:value="city.id"> {{ city.name }}</option>

                </select>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                countries:[],
                cities:[],
                country:'',
                city:''
            }
        },
        mounted() {
           this.getCountries()
        },
        methods: {
            getCountries(){
                let url = '/getCountries'
                this.dynamicDropdown(url, 'countries')

            },
            getCities(){
                let self = this;
              console.log(self.country)
                let url = '/getCities/'+ self.country
                this.dynamicDropdown(url, 'cities')
            },
            dynamicDropdown(url, data){
                axios.get(url)
                    .then(response => this[data] = response.data)
                    .catch(error => console.log(error))
            },
        }
    }
</script>
