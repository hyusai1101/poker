<template>
  <div>
    <div class="ellipse">
      <a @click="dialog = true"> <img src="/human.png" class="human"/></a>
    </div>

    <v-app id="inspire">
      <v-row justify="center">
        <v-btn color="primary" dark @click.stop="dialog = true">
          Open Dialog
        </v-btn>

        <v-dialog v-model="dialog" max-width="1000">
          <v-card>
            <v-card-title class="headline">
              ハンドレンジ表
            </v-card-title>

            <table class="table table-bordered">
              <tbody>
              <tr v-for="handRange in handRanges">
                <td v-for="hand in handRange">{{ hand.firstHand }}{{ hand.secondHand }}<span v-if="hand.suited">S</span><span v-else="hand.suited">O</span></td>
              </tr>
              </tbody>
            </table>
            <v-card-text>
              ポジションでも書くかな
            </v-card-text>

            <v-card-actions>
              <v-spacer />

              <v-btn
color="green darken-1" text
@click="dialog = false"
>
                Disagree
              </v-btn>

              <v-btn
color="green darken-1" text
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
import axios from 'axios';
import { mapGetters } from 'vuex'
export default {
  name: "PokerTable",
  data() {
    return {
      handRanges: [],
      dialog: false,
    };
  },
  computed: {
    ...mapGetters(['items'])
  },
  mounted () {
    const baseUrl = 'http://poker.com/api/handRanges';
    axios.get(baseUrl).then(res =>(
      this.handRanges = res.data.data
    ))
  }
};
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

.human {
  width: 200px;
  height: 200px;
  position: relative;
}

table th,table td{
  color:blue;
  border:solid 1px black;
  background-color:yellowgreen;
  text-align: center;
}
</style>
