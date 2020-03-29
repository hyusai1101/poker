<template>
  <div>
    <div class="ellipse">
      <img src="/human.png" class="human">
    </div>

    <v-app id="inspire">
      <v-row justify="center">
        <v-btn
          color="primary"
          dark
          @click.stop="dialog = true"
        >
          Open Dialog
        </v-btn>

        <v-dialog
          v-model="dialog"
          max-width="290"
        >
          <v-card>
            <v-card-title class="headline">Use Google's location service?</v-card-title>

            <v-card-text>
              Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>

              <v-btn
                color="green darken-1"
                text
                @click="dialog = false"
              >
                Disagree
              </v-btn>

              <v-btn
                color="green darken-1"
                text
                @click="dialog = false"
              >
                Agree
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </v-app>
  </div>
</template>
<script>
  export default {
    name: "PokerTable",
    data () {
      return {
        dialog: false,
      }
    },
  }
</script>

<style scoped>
  .ellipse {
    margin: 0 auto;
    width: 700px;
    height: 400px;
    position: absolute;
    background: rgb(58, 95, 60);
    border-radius: 50%;
    border-style: solid;
    border-width: 10px;
    border-color: #000000 #000000 #000000 #000000;
  }
  .human{
    width:200px;
    height:200px;
    position: relative;
  }
</style>

