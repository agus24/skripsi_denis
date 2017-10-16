<template>
  <li data-index="rs-129" data-transition="fade" data-slotamount="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-title="<span>gbr.id</span>" >
    <!-- MAIN IMAGE -->
    <img v-bind:src="gambar" alt="" data-bgparallax="12" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
    <!-- LAYERS -->
    <div class="slider-caption tp-caption tp-resizeme"
      data-x="['center','center','center','center']" data-hoffset="['0','0','0','15']"
      data-y="['340','240','140','140']" data-voffset="['0','0','0','0']"
      data-responsive_offset="on"
      data-visibility="['on','on','on','on']"
      data-start="1300"
      data-transform_idle="o:1;"
      data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;">
      <h4 class="text-capitalize">Best Selling Products Our all the World</h4>
    </div>
    <div class="slider-caption tp-caption tp-resizeme"
      data-x="['center','center','center','center']" data-hoffset="['0','0','0','15']"
      data-y="['375','275','175','185']" data-voffset="['0','0','0','0']"
      data-responsive_offset="on"
      data-visibility="['on','on','on','on']"
      data-start="1600"
      data-transform_idle="o:1;"
      data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;">
      <h1 class="text-uppercase">Take a Look at Our News</h1>
    </div>
    <div class="slider-caption tp-caption tp-resizeme"
      data-x="['center','center','center','center']" data-hoffset="['0','0','0','15']"
      data-y="['455','355','255','265']" data-voffset="['0','0','0','0']"
      data-responsive_offset="on"
      data-visibility="['on','on','on','on']"
      data-start="1800"
      data-transform_idle="o:1;"
      data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;">
      <a href="#." class="btn btn_default btn_rounded button_moema"> Shop Now</a>
    </div>
  </li>
</template>

<script>
export default {
  mounted() {
      console.log('Component mounted.')
  },
  props : ["gambar"]
}
</script>
