<template>
    <section id="rev_slider_wrapper" class="rev_slider"  data-version="5.0">
      <div id="rev_digit" class="rev_slider fullwidthabanner" style="display:hidden;" data-version="5.0.7">
        <ul>
          <!-- SLIDE  -->
            <div v-for="(gbr,index) in gambar">
                <Banner v-bind:gambar="gbr.gambar"  />
            </div>
          <!-- SLIDE  -->
        </ul>
      </div>
    </section>
</template>
<script>
    export default {
        created() {
            this.getGambar()
            console.log('Component mounted.')
        },
        data :() => {
            return {
                gambar : []
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
                    this.revo();
                })
                .catch(response => {
                    console.log(response)
                });
            },
            revo : () => {
                $("#rev_digit").show();
            }
        }
    }
</script>
