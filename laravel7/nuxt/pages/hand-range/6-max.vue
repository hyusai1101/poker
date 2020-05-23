<template>
  <div class="example">
    <PokerTable
      :BTNDialog="BTNDialog"
      :CODialog="CODialog"
      :MPDialog="MPDialog"
      :UTGDialog="UTGDialog"
      :SBDialog="SBDialog"
      :BBDialog="BBDialog"
    />
    <HandRangeDialog />
    {{getterHandRangeData}}
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
      handRanges: [],
      BTNDialog: false,
      CODialog: false,
      MPDialog: false,
      UTGDialog: false,
      SBDialog: false,
      BBDialog: false,
      test :'tttttaaa'
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
      'getHandRange'
    ])
  }
}
</script>
