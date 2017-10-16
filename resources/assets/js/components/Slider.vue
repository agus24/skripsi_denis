<template>
    <section id="rev_slider_wrapper" class="rev_slider"  data-version="5.0">
      <div id="rev_digit" class="rev_slider fullwidthabanner" style="display:block;" data-version="5.0.7">
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
                    this.revo();
                })
                .catch(response => {
                    console.log(response)
                });
            },
            revo : () => {
                $("#rev_digit").show().revolution({
                  sliderType: "standard",
                  sliderLayout: "fullwidth",
                  delay: 4000,
                  navigation: {
                     keyboardNavigation: "on",
                     keyboard_direction: "horizontal",
                     mouseScrollNavigation: "off",
                     onHoverStop: "on",
                     touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                     },
                     arrows: {
                        enable: false,

                     },
                     tabs: {
                        style: "",
                        enable: true,
                        width: 26,
                        height: 26,
                        min_width: 20,
                        wrapper_padding: 0,
                        wrapper_color: "transparent",
                        wrapper_opacity: "0",
                        tmp: '<div class="tp-tab-title">{{title}}</div>',
                        visibleAmount: 3,
                        hide_onmobile: true,
                        hide_under: 993,
                        hide_onleave: false,
                        hide_delay: 200,
                        direction: "horizontal",
                        span: false,
                        position: "inner",
                        space: 10,
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 50
                     }
                  },
                  viewPort: {
                     enable: true,
                     outof: "pause",
                     visible_area: "80%"
                  },
                  responsiveLevels: [1240, 1024, 778, 480],
                  gridwidth: [1280, 992, 767, 480],
                  gridheight: [860, 760, 400, 380],
                  disableProgressBar: "off",
                  spinner: "off",
                  parallax: {
                     type: "mouse",
                     origo: "slidercenter",
                     speed: 9000,
                     levels: [2, 3, 4, 5, 6, 8, 7, 12, 16, 10, 50],
                  },
               });
            }
        }
    }
</script>
