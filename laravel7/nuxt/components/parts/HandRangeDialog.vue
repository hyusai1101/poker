<template>
  <v-dialog v-model="dialog" max-width="1000" style="background-color: #808080">
    <v-card style="background-color: #808080">
      <v-card-text justify="center" class="headline">
        ハンドレンジ表
      </v-card-text>
<!--      <div class="text-center">-->
<!--        <v-chip class="ma-2" color="#FDE47F" text-color="blue">re_raise</v-chip>-->
<!--        <v-chip class="ma-2" color="#B576AD" text-color="blue">raise</v-chip>-->
<!--        <v-chip class="ma-2" color="#B7D968" text-color="blue">call</v-chip>-->
<!--        <v-chip class="ma-2" color="#555E7B" text-color="blue">fold</v-chip>-->
<!--      </div>-->
<!--      <v-simple-table>-->
<!--        <tbody>-->
<!--        <tr v-for="handRange in handRanges">-->
<!--          <td v-for="hand in handRange" v-bind:class="hand.action" @click="update(hand.id,hand.action, hand)">-->
<!--            {{ hand.firstHand }}{{ hand.secondHand }}<span-->
<!--            v-if="hand.suited">s</span><span v-else="hand.suited">o</span></td>-->
<!--        </tr>-->
<!--        </tbody>-->
<!--      </v-simple-table>-->
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: 'HandRangeDialog',
  data() {
    return {
      dialog: false,
    };
  },
  computed: {
    count () { return this.$store.state.counter.count }
  },
};
</script>
