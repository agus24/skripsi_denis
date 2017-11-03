<template>
    <section id="emp_gallery" class="padding">
        <div class="container-fluid">
          <div class="row">
             <div class="col-sm-12 heading_space clearfix">
                <div class="clearfix"></div>
             </div>
          </div>
        </div>
        <div class="container">
            <div id="shop_one" class="cbp">
                <Item />
            </div>
        </div>
    </section>
</template>

<script>
    export default{
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
