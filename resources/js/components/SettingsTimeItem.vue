<template>
    <div class="settings-item">
        <input type="time" name="setTime" id="setTime" class="input" v-model="this.timeInput" required>
        <label for="setTime">Set time for {{ this.quantity }}</label>
    </div>
</template>

<script>
export default {
    data: function() {
        return  {
            timeInput: this.time,
        }
    },
    props: [
        'quantity',
        'time'
    ],
    mounted() {
    }
}
</script>

<style lang="scss" scoped>
    @import "./../../sass/_variables.scss";

    .settings-item {
        width: 100%;
        background-color: $white-color;
        text-align: left;
        color: $black-color;
        display: flex;
        flex-direction: column-reverse;
        margin: 1em 0 1em 0;

        label {
            font-size: 0.75em;
            color: #222222;
            transition: 0.5s;
        }

        .input {
            border: none;
            border-bottom: 1px solid #9e9e9e;
            width: 100%;
            height: 2.5em;
            font-size: 1.5em;
            transition: 0.5s;
        }

        .input:focus {
            border-bottom: 1px solid $color-from;
            box-shadow: 0 1px 0 0 $color-from;
        }

        .input:focus + label {
            color: $color-from;
        }
    }
</style>