<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Categoria</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre" class="form-label"
                                    >Nombre</label
                                >
                                <input
                                    type="text"
                                    name="nombre_categoria"
                                    class="form-control"
                                    v-model="categoria.nombre_categoria"
                                />
                            </div>
                            <div class="col-md-8">
                                <label for="descripcion" class="form-label"
                                    >descripcion</label
                                >
                                <input
                                    type="text"
                                    name="descripcion_categoria"
                                    class="form-control"
                                    v-model="categoria.descripcion_categoria"
                                />
                            </div>
                        </div>
                        <br />
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "crear-categoria",
    data() {
        return {
            categoria: {
                nombre: "",
                descripcion: "",
            },
        };
    },
    methods: {
        async crear() {
            await this.axios
                .post("/api/categoria", this.categoria)
                .then((response) => {
                    this.$router.push({ name: "mostrarCategorias" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
