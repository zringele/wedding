<template>
    <flip-clock ref="clock" :options="{
        digit: (Date.UTC(2020, 6, 18, 14) - Date.now()) / 1000,
        countdown: true,
        clockFace: 'DailyCounter',
    }" />
</template>

<script>
    import { FlipClock } from '@mvpleung/flipclock';

    export default {
        name: "Flipas",
        components: {
            FlipClock
        },
        mounted() {
        }
    }
</script>

<style>
    .inn {
        background-color: #666666 !important;
        color: #602c4e !important;
    }
</style>