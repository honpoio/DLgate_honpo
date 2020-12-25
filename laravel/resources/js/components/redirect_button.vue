    <template>
        <!-- <div class="container"> -->
            <div id ="app">
                <button class="button_font_variable_length" v-on:click="writeToClipboard(redirect_button)">URLをコピーする</button>
        </div>
    </template>




    <script>
    export default {
        props: {
            redirect_button: String,
        },
        methods: {
            writeToClipboard: function(text) {
                navigator.clipboard.writeText(text).then(
                    ()=>alert("urlをコピーしました:" + text))
            }
        },

            mounted() {
        },
    }
    </script>

