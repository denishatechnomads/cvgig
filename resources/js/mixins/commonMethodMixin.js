export const commonMethodMixin = {
    data() {
        return {
            isLogin: false,
            countries: '',
            currencies: '',
            sender: '',
            countrySearch: '',
        }
    },
    created() {
        let userInfo = localStorage.getItem('user');
        // console.log('userInfo',userInfo);
        if (userInfo != null) {
            const userData = JSON.parse(userInfo);
            this.$accessToken = JSON.parse(localStorage.getItem('access_token'));
            this.$userInfo = userData;
            this.isLogin = true;
            // console.log('userData',userData);
            window.axios.defaults.headers.common = {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Headers': '*',
                'Authorization': 'Bearer ' + this.$accessToken,
            };
        }

    },
    methods: {
        getCountry() {
            try {
                this.$Progress.start();
                axios.get('api/country')
                    .then((response) => {
                        this.countries = response.data.Data;
                        // console.log("countries: ",this.countries);
                        this.$Progress.finish();
                    }).catch((error) => {
                    this.$Progress.fail();
                });
            } catch (e) {
                this.$Progress.fail();
                console.log("Error:", e.message);
            }
        },
        getCurrency(countrySearch= "") {
            try {
                this.$Progress.start();
                let url = "api/currency";
                if(countrySearch){
                    url = url+"?search="+countrySearch;
                }
                axios.get(url)
                    .then((response) => {
                        this.currencies = response.data.Data;
                        this.$Progress.finish();
                    }).catch((error) => {
                    this.$Progress.fail();
                });
            } catch (e) {
                this.$Progress.fail();
                console.log("Error:", e.message);
            }
        },
        getCity(country) {
            try {
                this.$Progress.start();
                axios.get('api/country')
                    .then((response) => {
                        this.countries = response.data.Data;
                        // console.log("countries: ",this.countries);
                        this.$Progress.finish();
                    }).catch((error) => {
                    this.$Progress.fail();
                });
            } catch (e) {
                this.$Progress.fail();
                console.log("Error:", e.message);
            }
        },
        logout() {
            try {

                // this.$accessToken = localStorage.getItem('access_token');
                console.log('accessToken', this.$accessToken);
                this.$Progress.start();
                axios.post('api/user/logout')
                    .then((response) => {
                        if (response.data.Success) {
                            localStorage.clear();
                            this.$accessToken = '';
                            this.$userInfo = '';
                            this.$router.push('/home');
                            window.location.reload();
                        } else {
                            localStorage.clear();
                            this.$accessToken = '';
                            this.$userInfo = '';
                            this.errorMsg = response.data.Message;
                            window.location.reload();
                        }

                        // End progress bar
                        this.$Progress.finish()
                    }).catch((error) => {
                    // Progress bar failed
                    this.$Progress.fail()
                });
            } catch (e) {
                console.error("Error: ", e.message);
                this.$Progress.fail()
            }
        },
        searchClear(){
            this.countrySearch = "";
        }
    },
    watch: {
        "countrySearch": function () {
            console.log("countrySearch:",this.countrySearch);
            this.getCurrency(this.countrySearch);
        }
    }
}
