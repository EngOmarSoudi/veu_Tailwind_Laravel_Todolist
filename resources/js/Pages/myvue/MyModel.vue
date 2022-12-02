<template>
  <div
      class="absolute w-full h-full bg-gray-900 bg-opacity-25 top-0 right-0"
      :class="isShow ? 'z-0':'-z-10'"
  >
    <div class="relative w-full h-full">
      <div @click="toggleIsShow" class="absolute w-full z-10 h-full cursor-pointer top-0 right-0"></div>
      <div
          :class="isShow ? '-translate-x-1/2':'-translate-x-full'"
          class="absolute w-96 h-52 bg-white rounded-lg z-50 top-1/2 left-1/2 transform -translate-y-1/2 transition-transform duration-300 ease-in-out "
      ></div>
    </div>

  </div>
</template>
<script>
export default {
  name: 'MyModel',
  props: {
    isShow: {},
    toggleIsShow: {}
  }
}
</script>
