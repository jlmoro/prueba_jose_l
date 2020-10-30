<template>
  <section>
    <modal-b ref="modalCiudad">
      <div slot="header" class="row">
        <div class="col-12">
          <h5>Crear Proveedor</h5>
        </div>
      </div>

      <div  slot="body" class="">
        <div class="row w-100 mb-5 mt-2">
          <div class="col-12 text-center">

        </div>
      </div>
      <div class="row w-100 mb-1">
        <div class="col-12">
          <label for="nombre-prov">Nombre Proveedor</label>

        </div>
      </div>

    </div>

    <div slot="footer" class="">
      <button type="button" class="btn-crear" @click="crear_ciudad">Guardar</button>
      <button type="button" class="btn-cancelar" @click="toggle">Cancelar</button>
    </div>
  </modal-b>
</section>
</template>
<script>
export default {
  name: "",
  data(){
    return{

    }
  },
  methods: {
    async crear_ciudad(){
      try {
        

      } catch (e) {
        console.warn(e);
      }
    },
    toggle(){
      this.$refs.modalCiudad.toggle()
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
