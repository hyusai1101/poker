<template>
  <div>
    <v-app id="inspire">
      <v-row justify="center">
        <span class="poker-table"></span>


        <!-- fixme この辺のカードコンポーネントは整備しないと事になる-->
        <v-card class="mx-auto" max-width="200" height="100" @click="openModal(this.$consts.BBID)">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">BB</v-list-item-title>
              <v-list-item-subtitle>ビックブラインド</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="200" height="100" @click="openModal(this.$consts.SBID)">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">SB</v-list-item-title>
              <v-list-item-subtitle>スモールブラインド</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="200" height="100" @click="openModal(this.$consts.UTGID)">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">UTG</v-list-item-title>
              <v-list-item-subtitle>アンダーザガン</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="200" height="100" @click="openModal(this.$consts.MP1)">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">MP</v-list-item-title>
              <v-list-item-subtitle>ミドルポジション</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>


        <v-card class="mx-auto" max-width="200" height="100" @click="openModal(this.$consts.CO)">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">CO</v-list-item-title>
              <v-list-item-subtitle>カットオフ</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="200" height="100" @click="openModal(this.$consts.CO)">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">BTN</v-list-item-title>
              <v-list-item-subtitle>BTNカットオフ</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

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
       * モーダルの外側をクリックされた時にhandrangeの中をクリアにする処理をいれる
       */
      openModal(positionId){
        console.log(this.$consts.BBID)
        if (this.dialog){
          this.dialog = false
        }else{
          const baseUrl = 'http://poker.com/api/handRanges/' + positionId;
          axios.get(baseUrl).then(res => (
            this.handRanges = res.data.data
          ))
          this.dialog = true
        }
      }
    },
  };
</script>

<style scoped>
  .poker-table {
    display: inline-block;
    text-align: center;
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
