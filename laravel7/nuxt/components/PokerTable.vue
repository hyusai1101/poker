<template>
  <div>
    <v-app id="inspire">
      <v-row justify="center">
        <span class="poker-table">
        <v-card class="mx-auto" max-width="150" height="75" @click="openModal('BTNDialog')"
                style="right: 250px; top: 35px">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">BTN</v-list-item-title>
              <v-list-item-subtitle>ボタン</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="150" height="75" @click="openModal('CODialog')"
                style="left: 250px; bottom: 40px;">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">CO</v-list-item-title>
              <v-list-item-subtitle>カットオフ</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="150" height="75" @click="openModal('MPDialog')" style="bottom: 200px;">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">MP</v-list-item-title>
              <v-list-item-subtitle>ミドルポジション</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="150" height="75" @click="openModal('UTGDialog')" style="left: 250px;">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">UTG</v-list-item-title>
              <v-list-item-subtitle>アンダーザガン</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="150" height="75" @click="openModal('SBDialog')"
                style="right: 250px; bottom:70px;">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">SB</v-list-item-title>
              <v-list-item-subtitle>スモールブラインド</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>

        <v-card class="mx-auto" max-width="150" height="75" @click="openModal('BBDialog')" style="bottom: 20px">
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1">BB</v-list-item-title>
              <v-list-item-subtitle>ビックブラインド</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>
        </span>
      </v-row>
    </v-app>
  </div>
</template>
<script>
  import axios from 'axios';

  const Cookie = process.client ? require('js-cookie') : undefined
  export default {
    name: "PokerTable",
    props: {
      BTNDialog: {
        type: Boolean,
      },
      CODialog: {
        type: Boolean,
      },
      MPDialog: {
        type: Boolean,
      },
      UTGDialog: {
        type: Boolean,
      },
      SBDialog: {
        type: Boolean,
      },
      BBDialog: {
        type: Boolean,
      },
    },
    data() {
      return {
        handRanges: [],
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

        // axios.put(baseUrl, {
        // }).catch(error => {
        //   console.log(error);
        //   alert('ハンドレンジの変更に失敗しました。リロードして再度お試しください')
        // });
      },
      /**
       * fixme modalのtrue,false問題を解決しないといけない
       * ダイアログをページコンポーネントに戻す
       */
      openModal(positionDialog) {
        this.$emit('clickDialog', positionDialog)
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
</style>
