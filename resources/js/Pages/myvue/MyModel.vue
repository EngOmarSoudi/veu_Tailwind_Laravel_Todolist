<template>
  <div
      class="absolute w-full h-full bg-gray-900 bg-opacity-25 top-0 right-0 "
      :class="isShow ? 'z-5':'-z-10' "
  >
    <div class="relative w-full h-full">
      <div @click="toggleIsShow" class="absolute w-full z-10 h-full cursor-pointer top-0 right-0"></div>
      <div
          :class="isShow ? '-translate-x-1/2':'-translate-x-full'"
          class="absolute min-w-[20vw]  min-h-[18vh] bg-white rounded-lg z-50 top-1/2 left-1/2 transform -translate-y-1/2 transition-transform duration-300 ease-in-out "
      >
          <div class="w-full h-auto flex items-center justify-between py-2 px-4">
              <div class="w-full h-full">
                  <slot name="header"/>
              </div>
              <div @click="toggleIsShow" class="my-auto h-6 w-6 cursor-pointer bg-red-300 hover:bg-red-500 text-white rounded-full text-center flex items-center justify-center text-xl font-semibold">×</div>
          </div>
          <slot/>
      </div>
    </div>

  </div>
</template>
<script>
export default {
  name: 'MyModel',
  props: {
    isShow: {
        type:Boolean,
        default:false,
    },
    toggleIsShow: {
        type:Function,
        default:v=>v
    }
  }
}
</script>
