<template>
  <div class="example">
    <PokerTable
      :BTNDialog="BTNDialog"
      :CODialog="CODialog"
      :MPDialog="MPDialog"
      :UTGDialog="UTGDialog"
      :SBDialog="SBDialog"
      :BBDialog="BBDialog"
      @clickDialog="getModal"
    />
    <div v-if="getterHandRangeData">
      <HandRangeDialog
        :hand-ranges="getterHandRangeData[0]"
        :dialog="BTNDialog"
        @update="handRangeUpdate"
      />
      <HandRangeDialog
        :hand-ranges="getterHandRangeData[1]"
        :dialog="CODialog"
      />
      <HandRangeDialog
        :hand-ranges="getterHandRangeData[2]"
        :dialog="MPDialog"
      />
      <HandRangeDialog
        :hand-ranges="getterHandRangeData[3]"
        :dialog="UTGDialog"
      />
      <HandRangeDialog
        :hand-ranges="getterHandRangeData[4]"
        :dialog="CODialog"
      />
      <HandRangeDialog
        :hand-ranges="getterHandRangeData[5]"
        :dialog="BBDialog"
      />

    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import PokerTable from "../../components/PokerTable";
import HandRangeDialog from "../../components/parts/HandRangeDialog";
export default {
  components: {
    PokerTable,
    HandRangeDialog,
  },
  data() {
    return {
      BTNDialog: false,
      CODialog: false,
      MPDialog: false,
      UTGDialog: false,
      SBDialog: false,
      BBDialog: false,
    };
  },
  computed: {
    ...mapGetters('api-hand-range', [
      'getterHandRangeData'
    ]),
  },
  created () {
      this.getHandRange()
  },
  methods:{
    ...mapActions('api-hand-range', [
      'getHandRange',
      'putHandRange'
    ]),
    getModal(dialogName){
      switch (dialogName) {
        case 'BTNDialog':
          this.BTNDialog = true;
          break;
        case 'CODialog':
          this.CODialog = true;
          break;
        case 'MPDialog':
          this.MPDialog = true;
          break;
        case 'UTGDialog':
          this.UTGDialog = true;
          break;
        case 'SBDialog':
          this.SBDialog = true;
          break;
        case 'BBDialog':
          this.BBDialog = true;
          break;
      }
    },
    handRangeUpdate(){
      this.putHandRange(this.getterHandRangeData[0]).then((res)=>{
        console.log(res)
      })
    }
  }
}
</script>
