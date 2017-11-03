<template>
    <div>
        <Header />
        <main>
            <ItemContainer />
        </main>
        <Footer />
    </div>
</template>

<script>
    export default{
        mounted() {
            console.log('Page mounted.')
        }
    }
</script>
