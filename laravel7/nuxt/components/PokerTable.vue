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
                <td v-for="hand in handRange" @click="update(hand.id,hand.action)">{{ hand.firstHand }}{{ hand.secondHand }}<span
                  v-if="hand.suited">s</span><span v-else="hand.suited">o</span></td>
              </tr>
              </tbody>
            </table>
            <v-card-text>
              ポジションでも書くかな
            </v-card-text>

            <v-card-actions>
              <v-spacer/>

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

  export default {
    name: "PokerTable",
    data() {
      return {
        handRanges: [],
        dialog: false,
      };
    },
    mounted() {
      const baseUrl = 'http://poker.com/api/handRanges';
      axios.get(baseUrl).then(res => (
        this.handRanges = res.data.data
      ))
    },
    methods: {
      update(handRangeId,action) {
        // fixme リクエストアクションはどっちで担保するか決めないといけない。
        let requestAction = '';
        if(action === 'fold'){
          requestAction = 'call'
        } else if(action === 'call'){
          requestAction = 'raise'
        } else if(action === 'raise'){
          requestAction = 're_raise'
        } else {
          requestAction = ' fold'
        }
        const baseUrl = 'http://poker.com/api/handRanges';
        axios.put(baseUrl, {
          'id': handRangeId,
          'action': requestAction
        }).then(response =>
            console.log(response))
          .catch(error => {
            console.log(error)
          })
      }
    },
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

  table th, table td {
    color: blue;
    border: solid 1px black;
    background-color: yellowgreen;
    text-align: center;
  }
</style>
