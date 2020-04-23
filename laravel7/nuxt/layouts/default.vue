<template>
  <v-app class="Wrapper">
    <div class="l-Header">
      <div class="l-Header_Container">
        <TheHeader />
      </div>
    </div>
    <div class="l-Main">
      <div class="l-Main_Container">
        <v-content>
          <v-container>
            <nuxt />
          </v-container>
        </v-content>
      </div>
    </div>
    <div class="l-Footer">
      <div class="l-Footer_Container">
        <TheFooter/>
      </div>
    </div>
  </v-app>
</template>

<script>
import TheHeader from '@/components/common/TheHeader'
import TheFooter from '@/components/common/TheFooter'
export default {
  components: {
    TheHeader,
    TheFooter
  }
};
</script>
