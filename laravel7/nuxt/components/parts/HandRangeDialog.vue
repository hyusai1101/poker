<template>
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
        <tr v-for="handRange in getHandInfo">
          <td v-for="hand in handRange" v-bind:class="hand.action" @click="test()">
            {{ hand.firstHand }}{{ hand.secondHand }}<span
            v-if="hand.suited">s</span><span v-else="hand.suited">o</span></td>
        </tr>
        </tbody>
      </v-simple-table>
    </v-card>
  </v-dialog>
</template>

<script>
  export default {
    name: 'HandRangeDialog',
    props: {
      dialog: {
        type: Boolean,
        default: false,
      },
      handRanges: {
        type: Object,
      },
    },
    data() {
      return {
        dialog: false,
        handRange: []
      };
    },
    computed: {
      getHandInfo() {
        return this.handRanges['handInfo']
      },
    },
    methods:{
      test() {
        console.log('ページコンポーネントの実装')
      }
    }
  };
</script>
<style scoped>
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

  .hand-display li {
    display: inline;
  }

  .square {
    width: 100px;
    height: 100px;
    background: black;
  }
</style>
