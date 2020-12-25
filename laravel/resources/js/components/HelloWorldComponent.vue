    <template>
        <!-- <div class="container"> -->
            <div id ="app">
            <span class="test">DLgate_url:{{ test }}</span>
                <button @click="writeToClipboard(test)">URLをコピーする</button>
        </div>
    </template>



    <style scoped>
    .test {
        color: rgb(28, 108, 182);
    }
    </style>

    <script>
    export default {
        props: {
            test: String,
        },
        methods: {
            writeToClipboard(text) {
                navigator.clipboard.writeText(text).catch((e) => {
                    console.error(e)
                })
            }
        },

            mounted() {
            console.log('ExampleComponent mounted.')
        },
    }
    </script>

