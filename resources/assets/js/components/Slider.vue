<template>
    <section id="rev_slider_wrapper" class="rev_slider"  data-version="5.0">
      <div id="rev_digit" class="rev_slider fullwidthabanner" style="display:block;" data-version="5.0.7">
        <ul>
          <!-- SLIDE  -->
            <div v-for="gbr in gambar">
                <Banner gambar="gbr.gambar" />
            </div>
          <!-- SLIDE  -->
        </ul>
      </div>
    </section>
</template>
<script>
    export default {
        created() {
            // this.getGambar()
            console.log('Component mounted.')
        },
        data :() => {
            return {
                gambar : [{"id":1,"gambar":"http:\/\/denis.dev\/storage\/images\/banner\/e592a3f0545805efb8459469541e6ca1.jpg","status":true,"created_at":"2017-10-16 11:53:05","updated_at":"2017-10-16 11:59:52"},{"id":2,"gambar":"http:\/\/denis.dev\/storage\/images\/banner\/c85910a628f1acd4bd462114d2b86a29.jpg","status":true,"created_at":"2017-10-16 11:53:06","updated_at":"2017-10-16 12:01:08"}]
            };
        },
        methods : {
            getGambar : function() {
                console.log(this.gambar)
                let gbr = {};
                axios.get('/api/banner/all/')
                .then((response) => {
                    // console.log(this.gambar);
                    console.log(response);
                    gbr = response.data;
                    this.gambar = gbr;
                    console.log(this.gambar)
                })
                .catch(response => {
                    console.log(response)
                });
            }
        }
    }
</script>
