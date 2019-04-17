<template>
    <div class="chart-container">
        <chartjs-line 
            :bind="true"
            :datalabel="datalabel" 
            v-bind:labels="labels" 
            v-bind:data="data"
            :pointborderwidth="6"
            :pointbordercolor="'rgb(209, 39, 39)'"
            :pointhoverborderwidth="3"
            :pointhoverbackgroundcolor="'#636b6f'"
            :pointhoverbordercolor="'rgb(255, 0, 0)'"
            :bordercolor="'rgb(248, 91, 0)'"
            :linetension="0"
            :fill="true"
            :backgroundcolor="'rgb(211, 118, 64,0.1)'">
        </chartjs-line>
    </div> 
</template>

<script>
    export default {
        props: [
            'data',
            'labels',
            'datalabel',
        ],
        methods: {
            
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .chart-container {
        width: 90%;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgb(160, 160, 160);
    }
</style>
