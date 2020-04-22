<template>
  <div>
    <span class="poker-table"></span>
    <span @click="openModal"><img src="/human.png" class="human"/></span>
    <v-app id="inspire">
      <v-row justify="center">
        <v-dialog v-model="dialog" max-width="1000" style="background-color: #808080">
          <v-card style="background-color: #808080">
            <v-card-text justify="center" class="headline">
              ハンドレンジ表
            </v-card-text>
            <div class="text-center">
              <v-chip class="ma-2" color="#FDE47F" text-color="blue">re_raise</v-chip>
              <v-chip class="ma-2" color="#B576AD" text-color="blue">raise</v-chip>
              <v-chip class="ma-2" color="#B7D968" text-color="blue">call</v-chip>
              <v-chip class="ma-2" color="#555E7B" text-color="blue">fold</v-chip>
            </div>
            <v-simple-table>
              <tbody>
              <tr v-for="handRange in handRanges">
                <td v-for="hand in handRange" v-bind:class="hand.action" @click="update(hand.id,hand.action, hand)">
                  {{ hand.firstHand }}{{ hand.secondHand }}<span
                  v-if="hand.suited">s</span><span v-else="hand.suited">o</span></td>
              </tr>
              </tbody>
            </v-simple-table>
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
      update(handRangeId, action, hand) {
        // fixme リクエストアクションはどっちで担保するか決めないといけない。
        let requestAction = '';
        if (action === 'fold') {
          requestAction = 'call'
        } else if (action === 'call') {
          requestAction = 'raise'
        } else if (action === 'raise') {
          requestAction = 're_raise'
        } else {
          requestAction = 'fold'
        }
        hand.action = requestAction
        const baseUrl = 'http://poker.com/api/handRanges';
        axios.put(baseUrl, {
          'id': handRangeId,
          'action': requestAction
        }).catch(error => {
          console.log(error);
          alert('ハンドレンジの変更に失敗しました。リロードして再度お試しください')
        });
      },
      /**
       * fixme モーダルの切替/多分ポジションごとにレンダリングするデータを切り替えないといけない
       * まだAPI側もポジションに対応してないけど
       */
      openModal(){
        if (this.dialog){
          this.dialog = false
        }else{
          this.dialog = true
        }
      }
    },
  };
</script>

<style scoped>
  .poker-table {
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

  table td {
    border: solid 1px white;
    text-align: center;
    color: black;
  }

  .fold {
    background-color: #555E7B;
  }

  .call {
    color: red;
    background-color: #B7D968;
  }

  .raise {
    color: blue;
    background-color: #B576AD;
  }

  .re_raise {
    color: blue;
    background-color: #FDE47F;
  }

  .hand-display li{
    display: inline;
  }

  .square {
    width: 100px;
    height: 100px;
    background: black;
  }
</style>
